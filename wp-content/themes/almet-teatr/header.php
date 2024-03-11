<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/app.min.css?ver=1.0">
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.min.js?ver=1.0"></script>

    <?php wp_head(); ?>

</head>

<body>

    <header class="header header-fixed" id="up">

        <div class="header__top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-2">
                        <h1 class="logo header__logo">
                            <a class="logo__link" href="<?php echo get_site_url(); ?>">
                                <img class="logo__img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="">
                            </a>
                        </h1>

                    </div>

                    <div class="col d-flex justify-content-end align-items-center align-items-lg-start">

                        <address class="header__address d-none d-lg-block">
                            <b>г. Альметьевск,</b> <br>
                            Маяковского улица, д. 127
                        </address>

                        <div class="header__phone">
                            <a class="header__phone-link" href="tel: 8 800 250 79 66">8 800 250 79 66</a>
                            <div class="header__phone-btn" data-bs-toggle="modal" data-bs-target="#orderModal">Заказать звонок</div>
                        </div>

                        <div class="header__search d-none d-lg-block">
                            <img class="header__search-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/search.svg" alt="">
                        </div>

                        <div class="header__btn-mobile-menu d-lg-none">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/btm-mobile-menu.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="menu__nav-wr">

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

                            <div class="menu__btn">
                                <div class="mobile-btn">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/burger.svg" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="menu menu-fixed d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu__nav-wr">

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

                        <div class="menu__btn">
                            <div class="mobile-btn">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/burger.svg" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>