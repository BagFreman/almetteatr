<?php
/*
Template Name: Шаблон - Главная
Template Post Type: page
*/
?>

<?php get_template_part('header-main'); ?>

<main class="main">

   <section class="main-section">
      <div class="container">

         <div class="row">
            <div class="col">
               <div class="section-title">
                  <h3 class="section-title__h1">Наша техника</h3>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col">
               <div class="catalog-item-all-wr">

                  <?php
                  $org_terms_args = array(
                     'taxonomy' => 'service-auto',
                     'meta_key' => 'sort',
                     'orderby' => 'meta_value_num',
                     'order' => 'ASC',
                     'meta_query' => array(
                        array(
                           'key' => 'sort',
                           'compare' => 'EXISTS'
                        )
                     )
                  );
                  $org_terms = get_terms($org_terms_args);

                  if ($org_terms && !is_wp_error($org_terms)) {
                     foreach ($org_terms as $term) {
                        $image = get_field('image', 'service-auto_' . $term->term_id); // Получение значения кастомного поля с картинкой через ACF
                  ?>
                        <a href="<?php echo esc_url(get_term_link($term)) ?>" class="catalog-item">
                           <div class="catalog-item__img-wr">
                              <img class="catalog-item__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                           </div>
                           <h4 class="catalog-item__title"><?php echo esc_html($term->name) ?></h4>
                        </a>
                  <?php
                     }
                  }
                  ?>
               </div>
            </div>
         </div>

      </div>
   </section>

   <section class="main-section">
      <div class="container">

         <div class="row">
            <div class="col">
               <div class="section-title">
                  <h3 class="section-title__h1">Услуги</h3>
                  <a class="section-title__link-all" href="/services">Смотреть все</a>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-4">

               <?php
               $args = array(
                  'post_type' => 'services',
                  'posts_per_page' => 1,
               );

               $books = new WP_Query($args);

               if ($books->have_posts()) :
                  while ($books->have_posts()) : $books->the_post();
               ?>

                     <a class="service-item service-item-top" href="<?php the_permalink(); ?>">
                        <picture class="service-item__pic">
                           <img class="service-item__img" src="<?php echo get_the_post_thumbnail_url(get_the_id(), 'full') ?>" alt="">
                        </picture>
                        <h3 class="service-item__title">
                           <?php the_title(); ?>
                        </h3>
                     </a>
               <?php
                  endwhile;
               endif;
               ?>


            </div>
            <div class="col-lg-4 col-6">
               <?php
               $args = array(
                  'post_type' => 'services',
                  'posts_per_page' => 2,
                  'offset' => 1,
               );

               $books = new WP_Query($args);

               if ($books->have_posts()) :
                  while ($books->have_posts()) : $books->the_post();
               ?>

                     <a class="service-item" href="<?php the_permalink(); ?>">
                        <picture class="service-item__pic">
                           <img class="service-item__img" src="<?php echo get_the_post_thumbnail_url(get_the_id(), 'full') ?>" alt="">
                        </picture>
                        <h3 class="service-item__title">
                           <?php the_title(); ?>
                        </h3>
                     </a>
               <?php
                  endwhile;
               endif;
               wp_reset_query();
               ?>
            </div>
            <div class="col-lg-4 col-6">
               <?php
               $args = array(
                  'post_type' => 'services',
                  'posts_per_page' => 2,
                  'offset' => 3,
               );

               $books = new WP_Query($args);

               if ($books->have_posts()) :
                  while ($books->have_posts()) : $books->the_post();
               ?>

                     <a class="service-item" href="<?php the_permalink(); ?>">
                        <picture class="service-item__pic">
                           <img class="service-item__img" src="<?php echo get_the_post_thumbnail_url(get_the_id(), 'full') ?>" alt="">
                        </picture>
                        <h3 class="service-item__title">
                           <?php the_title(); ?>
                        </h3>
                     </a>
               <?php
                  endwhile;
               endif;
               wp_reset_query();
               ?>
            </div>
         </div>

      </div>
   </section>

   <section class="main-section section-vacancies">
      <div class="container">

         <div class="row section-vacancies__main">
            <div class="col-lg-5 col-xl-4 d-none d-lg-block">
               <picture class="section-vacancies__pic">
                  <img class="section-vacancies__img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/vacancies-main.png" alt="">
               </picture>
            </div>
            <div class="col-lg-7 col-xl-5">
               <div class="section-vacancies__wr">
                  <div class="section-title">
                     <h3 class="section-title__h1">Вакансии</h3>
                     <a class="section-title__link-all" href="/vacancies">Смотреть все</a>
                  </div>
                  <div class="section-vacancies__p">
                     «Карьера в Татспецтранспорте — это не только хороший заработок, но и личностный рост. Присоединяйтесь к нашей дружной команде!»
                  </div>
                  <div class="section-vacancies__buttons">
                     <button class="btn section-vacancies__btn" data-bs-toggle="modal" data-bs-target="#vacancyModal"><i class="fas fa-file-signature"></i>Заполнить онлайн</button>
                     <a href="/wp-content/themes/tst/file/anketa-tst.docx" download="" class="btn section-vacancies__btn"><i class="fas fa-file-download"></i>Скачать анкету</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="row g-5">
            <div class="col">

               <div class="swiper swiper-vacancies">
                  <div class="swiper-wrapper">

                     <?php
                     $args = array(
                        'post_type' => 'vacancies',
                        'posts_per_page' => 4,
                     );

                     $books = new WP_Query($args);

                     if ($books->have_posts()) :
                        while ($books->have_posts()) : $books->the_post();
                     ?>

                           <div class="swiper-slide">
                              <div class="vacancies-main-item">
                                 <div class="vacancies-main-item__title">
                                    <?php the_title(); ?>
                                 </div>
                                 <div class="vacancies-main-item__wr">
                                    <!-- <div class="vacancies-main-item__price">от <?php the_field('price'); ?> <span class="vacancies-main-item__price-icon">₽</span></div> -->
                                    <div class="vacancies-main-item__price">от 70 000 <span class="vacancies-main-item__price-icon">₽</span></div>
                                    <a href="<?php the_permalink(); ?>" class="btn">Подробнее</a>
                                 </div>
                              </div>
                           </div>

                     <?php
                        endwhile;
                     endif;
                     wp_reset_query();
                     ?>

                  </div>
               </div>

            </div>
         </div>

      </div>
   </section>

   <section class="main-section section-our-partners">
      <div class="container">

         <div class="row">
            <div class="col">
               <div class="section-title">
                  <h3 class="section-title__h1">Наши партнеры</h3>
               </div>
            </div>
         </div>

         <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3 g-md-5">

            <?php
            $stati_children = new WP_Query(
               array(
                  'post_type' => 'page',
                  'p' => 8,
                  'posts_per_page' => 1
               )
            );
            if ($stati_children->have_posts()) :
               while ($stati_children->have_posts()) : $stati_children->the_post(); ?>

                  <?php if (have_rows('partner')) : ?>
                     <?php while (have_rows('partner')) : the_row(); ?>
                        <div class="col">
                           <a target="_blank" href="<?php the_sub_field('partner_link'); ?>" class="our-partners-item">
                              <img class="our-partners-item__img" loading="lazy" src="<?php the_sub_field('partner_img'); ?>" alt="<?php the_sub_field('partner_name'); ?>" />
                           </a>
                        </div>
                     <?php endwhile; ?>
                  <?php endif; ?>

               <?php endwhile; ?>
            <?php endif; ?>

         </div>
      </div>
   </section>

</main>

<div class="preload">
   <div class="preload-img-1">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-1.svg" alt="" class="image first">
      <div class="preload-img-1__bgc"></div>
   </div>
   <div class="preload-img-2">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-2.svg" alt="" class="image second">
   </div>
</div>


<script>
   document.addEventListener('DOMContentLoaded', () => {
      document.body.classList.add('body-fix');
      setTimeout(function() {
         const preload = document.querySelector('.preload');
         preload.classList.add('preload-stop');
         document.body.classList.remove('body-fix');
      }, 2000)
   })
</script>

<?php get_template_part('footer'); ?>