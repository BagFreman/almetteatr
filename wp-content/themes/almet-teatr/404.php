<?php get_template_part('header'); ?>

<?php get_template_part('components/breadcrumb'); ?>

<main class="main">

    <section class="page-404">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-404__wr">
                        <div class="page-404__title">
                            404
                        </div>
                        <div class="page-404__text">
                            Страница не найдена, попробуйте обновить <br> страницу или перейти на главную
                        </div>
                        <div class="page-404__btn">
                            <a class="btn" href="<?php echo get_site_url(); ?>">
                                <span>Вернуться на главную</span>
                                <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7658 0.117158L19.8829 3.59999C20.0391 3.7562 20.0391 4.00947 19.8829 4.16568L15.6001 7.88284C15.4439 8.03905 15.1906 8.03905 15.0344 7.88284C14.8782 7.72663 14.8782 7.47336 15.0344 7.31715L18.6344 4.28284H0.400002C0.179087 4.28284 0 4.10375 0 3.88284C0 3.66192 0.179087 3.48284 0.400002 3.48284H18.6344L15.2001 0.682845C15.0439 0.526635 15.0439 0.273368 15.2001 0.117158C15.3563 -0.0390526 15.6096 -0.0390526 15.7658 0.117158Z" fill="#fff" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-404__img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/404.png" alt="">
        </div>
    </section>

</main>

<?php get_template_part('footer'); ?>
</body>

</html>