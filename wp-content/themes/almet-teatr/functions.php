<?php

/**
 * tst functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tst
 */

if (!function_exists('tst_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function tst_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on tst, use a find and replace
         * to change 'tst' to the name of your theme in all the template files.
         */
        load_theme_textdomain('tst', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'tst'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('tst_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;

add_action('after_setup_theme', 'tst_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

add_filter('post_gallery', 'my_custom_gallery', 10, 2);

function my_custom_gallery($output, $attr)
{
    global $post;
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }
    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'columns' => 1,
        'size' => 'full',
        'include' => '',
        'exclude' => ''
    ), $attr));
    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';
    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }


    if (empty($attachments)) return '';
    // ВЫВОД ГАЛЕРЕИ
    $output = '<div class="container"><div class="row"><div class="gallery owl-carousel">';

    // Цикл, в котором происходит обработка и вывод отдельных изображений галереи
    foreach ($attachments as $id => $attachment) {
        // Создаем необходимые переменные

        $img_preview = wp_get_attachment_image($id, 'full', true, array('class' => 'radius')); // Подробнее о функции - http://wp-kama.ru/function/wp_get_attachment_image
        $img_full = wp_get_attachment_image_url($id, 'full'); // Подробнее о функции - http://wp-kama.ru/function/wp_get_attachment_image_src
        // Формируем и добавляем в вывод сформированные блоки с изображениями галереи

        $output .= '<div data-fancybox="gallery" href="' . $img_full . '" class="gallery-img"><img src="' . $img_full . '" alt=""></div>';
    }

    $output .= '</div></div></div>'; // Конец цикла. Закрываем созданный в начале <div>
    return $output;
}

function true_custom_fields()
{
    add_post_type_support('book', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}

add_action('init', 'true_custom_fields');

function tst_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('tst_content_width', 640);
}

add_action('after_setup_theme', 'tst_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tst_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'tst'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'tst'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'tst_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function tst_scripts()
{
    wp_enqueue_style('tst-style', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'tst_scripts');

function tst_posts_pagination()
{
    $args = array(
        'show_all' => false, // показаны все страницы участвующие в пагинации
        'end_size' => 1,     // количество страниц на концах
        'mid_size' => 1,     // количество страниц вокруг текущей
        'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
        'prev_text' => __('« Previous'),
        'next_text' => __('Next »'),
        'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
        'screen_reader_text' => __('Posts navigation'),
    );
}

function do_excerpt($string, $word_limit)
{
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit)
        array_pop($words);
    echo implode(' ', $words) . '';
}

function custom_post_type_template($single_template)
{
    global $post;

    if ($post->post_type == 'news') {
        $single_template = get_stylesheet_directory() . '/template/page-news.php';
    }

    if ($post->post_type == 'article') {
        $single_template = get_stylesheet_directory() . '/template/page-article.php';
    }

    if ($post->post_type == 'poleznaya-informaciy') {
        $single_template = get_stylesheet_directory() . '/template/page-help-inf.php';
    }

    if ($post->post_type == 'profsojuznaya-zhizn') {
        $single_template = get_stylesheet_directory() . '/template/page-prof.php';
    }

    if ($post->post_type == '75-let-velikoj-pobed') {
        $single_template = get_stylesheet_directory() . '/template/page-pobeda.php';
    }

    if ($post->post_type == 'vacancies') {
        $single_template = get_stylesheet_directory() . '/template/page-vacancy.php';
    }

    if ($post->post_type == 'services') {
        $single_template = get_stylesheet_directory() . '/template/page-service.php';
    }

    if ($post->post_type == 'companies') {
        $single_template = get_stylesheet_directory() . '/template/page-company.php';
    }

    if ($post->post_type == 'technique') {
        $single_template = get_stylesheet_directory() . '/template/page-transport.php';
    }

    return $single_template;
}

add_filter('single_template', 'custom_post_type_template');

/**
 * Breadcrumbs
 *
 * This functions displays page breadcrumbs
 */
function tst_breadcrumbs()
{

    /* === OPTIONS === */
    $text['home'] = __('Главная', 'tst'); // text for the 'Home' link
    $text['category'] = __('%s', 'tst'); // text for a category page
    $text['search'] = __('Результаты поиска для "%s"  ', 'tst'); // text for a search results page
    $text['tag'] = __('Posts Tagged "%s"', 'tst'); // text for a tag page
    $text['author'] = __('Articles Posted by %s', 'tst'); // text for an author page
    $text['404'] = __('Ошибка 404', 'tst'); // text for the 404 page

    $show_current = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter = '<li class="point"> / </li>'; // delimiter between crumbs
    $before = '<li><a class="current">'; // tag before the current crumb
    $after = '</a></li>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $home_link = home_url('/');
    $link_before = '<li typeof="v:Breadcrumb">';
    $link_after = '</li>';
    $link_attr = ' rel="v:url" property="v:title"';
    $link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');

    if (is_home() || is_front_page()) {

        if ($show_on_home == 1) echo '<a href="' . $home_link . '">' . $text['home'] . '</a>';
    } else {

        echo '<li xmlns:v="http://rdf.data-vocabulary.org/#">';
        if ($show_home_link == 1) {
            echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }

        if (is_category()) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
        } elseif (is_search()) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
        } elseif (is_day()) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
        } elseif (is_page() && !$parent_id) {
            if ($show_current == 1) echo $before . get_the_title() . $after;
        } elseif (is_page() && $parent_id) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
        } elseif (is_404()) {
            echo $before . $text['404'] . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }

        echo '';
    }
} // end formation_breadcrumbs()

remove_filter('the_content', 'wpautop');

add_action('parse_query', function ($query) {
    if (is_date() || is_category() || is_tag() || is_author()) {
        wp_redirect(home_url());
        exit;
    }
});

function create_custom_taxonomy()
{
    register_taxonomy('organizations', 'vacancies', array(
        'labels' => array(
            'name' => 'Организации',
            'singular_name' => 'Организация',
        ),
        'public' => true,
        'hierarchical' => true,
    ));

    register_taxonomy('service-auto', 'technique', array(
        'labels' => array(
            'name' => 'Услуги',
            'singular_name' => 'Услуга',
        ),
        'public' => true,
        'hierarchical' => true,
    ));
}

add_action('init', 'create_custom_taxonomy');

// function add_tags_to_pages() {
//     register_taxonomy_for_object_type('organizations', 'page');
// }
// add_action('init', 'add_tags_to_pages');
