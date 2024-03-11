<footer class="footer">
     <div class="container">
          <div class="row footer__top">
               <div class="col-lg-4">
                    <div class="footer__logo-wr">
                         <div class="footer__logo">
                              <a class="footer__logo-link" href="">
                                   <img class="footer__logo-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="">
                              </a>
                         </div>
                         <div class="footer__address-wr">
                              <address class="footer__address-item">
                                   <div class="footer__address-item-title">
                                        Адрес:
                                   </div>
                                   <div class="footer__address-item-address">
                                        г. Альметьевск, <br>
                                        ул. Маяковского д. 127
                                   </div>
                              </address>
                              <div class="footer__address-item">
                                   <div class="footer__address-item-title">
                                        Время работы:
                                   </div>
                                   <div class="footer__address-item-address">
                                        пн-пт 7:45 - 17:00 (МСК)
                                   </div v>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-5">
                    <div class="footer__menu-wr">
                         <div class="footer__menu">
                              <div class="footer__menu-title">
                                   Меню
                              </div>
                              <div class="footer__menu-list">
                                   <?php
                                   wp_nav_menu([
                                        'theme_location' => '',
                                        'menu' => 'menu_footer',
                                        'container' => 'nav',
                                        'container_class' => '',
                                        'container_id' => '',
                                        'menu_class' => '',
                                        'menu_id' => '',
                                        'echo' => true,
                                        'fallback_cb' => 'wp_page_menu',
                                        'before' => '',
                                        'after' => '',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth' => 0,
                                        'walker' => '',
                                   ]);
                                   ?>
                              </div>
                         </div>
                         <div class="footer__menu">
                              <div class="footer__menu-title">
                                   Компания
                              </div>
                              <div class="footer__menu-list">
                                   <nav>
                                        <ul>


                                             <?php
                                             query_posts(array(
                                                  'post_type' => 'companies',
                                                  'meta_key' => 'sort',
                                                  'orderby' => 'meta_value_num',
                                                  'order' => 'ASC',
                                                  'meta_query' => array(
                                                      array(
                                                          'key' => 'sort',
                                                          'compare' => 'EXISTS'
                                                      )
                                                  )
                                             ));

                                             if (have_posts()) {
                                                  while (have_posts()) {
                                                       the_post(); ?>
                                                       <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                             <?php
                                                  }
                                                  wp_reset_query();
                                             }
                                             ?>
                                        </ul>
                                   </nav>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-3">
                    <div class="footer__wr-2">
                         <div class="footer__social">
                              <div class="footer__social-title">
                                   МЫ В СОЦСЕТЯХ:
                              </div>
                              <div class="footer__social-wr">
                                   <div class="footer__social-item">
                                        <a class="footer__social-link" href="https://vk.com/tatspectransport" target="_blank">
                                             <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/vk.svg" alt="" class="footer__social-icon">
                                        </a>
                                   </div>
                                   <div class="footer__social-item">
                                        <a class="footer__social-link" href="https://youtube.com/@tatspectransport" target="_blank">
                                             <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/youtube.svg" alt="" class="footer__social-icon">
                                        </a>
                                   </div>
                                   <div class="footer__social-item">
                                        <a class="footer__social-link" href="https://t.me/tatspectransport" target="_blank">
                                             <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/telegram.svg" alt="" class="footer__social-icon">
                                        </a>
                                   </div>
                              </div>
                              <div class="footer__rec">
                                   <a href="/company/rekvizity/" class="footer__rec-link">
                                        <i class="fa fa-file-alt"></i>
                                        Реквизиты
                                   </a>
                              </div>
                              <div class="footer__btn">
                                   <div class="btn footer__btn" data-bs-toggle="modal" data-bs-target="#orderModal">Заказать звонок</div>
                              </div>
                         </div>
                         <a href="tel:8 800 250-79-66" class="footer__phone">
                              8 800 250-79-66
                         </a>
                    </div>
               </div>
          </div>
          <div class="row footer__bottom">
               <div class="col-12">
                    <div class="footer__bottom-wr">
                         <div class="footer__inf">
                              © <?php echo date("Y"); ?> ООО "УК Татспецтранспорт"
                         </div>
                         <div class="footer__politic">
                              <a href="/politika-konfidencialnosti" class="footer__politic-link">
                                   политика конфиденциальности
                              </a>
                         </div>
                         <div class="footer__company">
                              © 2023 ООО «БАРС» - <a target="_blank" href="http://skillshub.ru/">BARS MARKETING GROUP</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</footer>

<div class="progress-container">
     <div class="progress-bar"></div>
</div>

<a class="btn-up d-none d-lg-block" href="#up">
     <svg width="8" height="22" viewBox="0 0 8 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.4202 1.11318C4.22494 0.917917 3.90836 0.917917 3.7131 1.11318L0.531117 4.29516C0.335855 4.49042 0.335855 4.807 0.531117 5.00227C0.726379 5.19753 1.04296 5.19753 1.23822 5.00227L4.06665 2.17384L6.89508 5.00227C7.09034 5.19753 7.40692 5.19753 7.60219 5.00227C7.79745 4.807 7.79745 4.49042 7.60219 4.29516L4.4202 1.11318ZM4.56665 21.7334L4.56665 1.46673L3.56665 1.46673L3.56665 21.7334L4.56665 21.7334Z" fill="#5F5F5F"></path>
     </svg>
</a>

<div class="main-mobile scrollbar">

     <div class="main-mobile__close">
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M1 1L11 11M1 11L11 1" stroke="white" stroke-width="2" stroke-linecap="round"></path>
          </svg>
     </div>

     <div class="mian-mobile__logo">
          <img class="mian-mobile__img-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="">
     </div>

     <div class="main-mobile-search">
          <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search" class="main-mobile-search__form">
               <input class="main-mobile-search__input" type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" id="s" placeholder="<?php esc_attr_e('Поиск &hellip;', 'smp'); ?>">
               <button class="main-mobile-search__btn" type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'formation'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                         <path d="M7.82604 0C3.51085 0 0 3.51085 0 7.82604C0 12.1412 3.51085 15.6521 7.82604 15.6521C9.62134 15.6521 11.2722 15.0379 12.5942 14.0174L18.282 19.7052C18.675 20.0983 19.3122 20.0983 19.7052 19.7052C20.0983 19.3122 20.0983 18.675 19.7052 18.282L14.0174 12.5942C15.0379 11.2722 15.6521 9.62134 15.6521 7.82604C15.6521 3.51085 12.1412 0 7.82604 0ZM7.82604 1.73912C11.1821 1.73912 13.913 4.46997 13.913 7.82604C13.913 11.1821 11.1821 13.913 7.82604 13.913C4.46997 13.913 1.73912 11.1821 1.73912 7.82604C1.73912 4.46997 4.46997 1.73912 7.82604 1.73912Z" fill="#0AA373" />
                    </svg>
               </button>
          </form>
     </div>

     <div class="main-mobile__nav d-lg-none">
          <?php
          wp_nav_menu([
               'theme_location' => '',
               'menu' => 'menu__header',
               'container' => 'nav',
               'container_class' => '',
               'container_id' => '',
               'menu_class' => '',
               'menu_id' => '',
               'echo' => true,
               'fallback_cb' => 'wp_page_menu',
               'before' => '',
               'after' => '',
               'link_before' => '',
               'link_after' => '',
               'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
               'depth' => 0,
               'walker' => '',
          ]);
          ?>
     </div>

     <div class="main-mobile__nav d-none d-lg-block">
          <nav>
               <ul>
                    <?php
                    query_posts(array(
                         'post_type' => 'companies',
                         'meta_key' => 'sort',
                         'orderby' => 'meta_value_num',
                         'order' => 'ASC',
                         'meta_query' => array(
                             array(
                                 'key' => 'sort',
                                 'compare' => 'EXISTS'
                             )
                         )
                    ));

                    if (have_posts()) {
                         while (have_posts()) {
                              the_post(); ?>
                              <li class="menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php
                         }
                         wp_reset_query();
                    }
                    ?>
               </ul>
          </nav>
     </div>

     <div class="main-mobile__socials">

          <div class="footer__social-item">
               <a class="footer__social-link" href="https://vk.com/tatspectransport" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/vk.svg" alt="" class="footer__social-icon">
               </a>
          </div>

          <div class="footer__social-item">
               <a class="footer__social-link" href="https://youtube.com/@tatspectransport" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/youtube.svg" alt="" class="footer__social-icon">
               </a>
          </div>

          <div class="footer__social-item">
               <a class="footer__social-link" href="https://t.me/tatspectransport" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/telegram.svg" alt="" class="footer__social-icon">
               </a>
          </div>
     </div>
</div>

<div class="bgc-main-mobile-fix"></div>

<div class="search-modal">
     <form class="search-modal__form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
          <div class="container">
               <div class="row">
                    <div class="col">
                         <div class="search-modal__body">
                              <div class="search-modal__close">
                                   <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L11 11M1 11L11 1" stroke="white" stroke-width="2" stroke-linecap="round"></path>
                                   </svg>
                              </div>
                              <div class="search-modal__field">
                                   <input class="search-modal__input" type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" id="s" placeholder="<?php esc_attr_e('Поиск &hellip;', 'smp'); ?>">
                                   <button class="search-modal__btn" type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'formation'); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                             <path d="M7.82604 0C3.51085 0 0 3.51085 0 7.82604C0 12.1412 3.51085 15.6521 7.82604 15.6521C9.62134 15.6521 11.2722 15.0379 12.5942 14.0174L18.282 19.7052C18.675 20.0983 19.3122 20.0983 19.7052 19.7052C20.0983 19.3122 20.0983 18.675 19.7052 18.282L14.0174 12.5942C15.0379 11.2722 15.6521 9.62134 15.6521 7.82604C15.6521 3.51085 12.1412 0 7.82604 0ZM7.82604 1.73912C11.1821 1.73912 13.913 4.46997 13.913 7.82604C13.913 11.1821 11.1821 13.913 7.82604 13.913C4.46997 13.913 1.73912 11.1821 1.73912 7.82604C1.73912 4.46997 4.46997 1.73912 7.82604 1.73912Z" fill="#0AA373" />
                                        </svg>
                                   </button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>

<?php get_template_part('components/order-modal'); ?>
<?php get_template_part('components/vacancy-modal'); ?>

</div>
</body>

</html>
<?php wp_footer(); ?>