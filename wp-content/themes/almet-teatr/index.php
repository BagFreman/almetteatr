<?php get_template_part('header'); ?>
<?php get_template_part('components/breadcrumb'); ?>
<?php get_template_part('components/btn-back'); ?>

<div class="container">
   <div class="row">
      <div class="col">
         <h1 class="page-title"><?php the_title(); ?></h1>
      </div>
   </div>
</div>

<main class="main page-content">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <?php the_content(); ?>
         </div>
      </div>
   </div>
</main>

<?php get_template_part('footer'); ?>