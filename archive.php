<?php

/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header();
// $term = get_queried_object();
// $term_id = $term->term_id;
?>
<div class="wrap__page">
  <div class="container">
    <div class="page__content sc__wrap">
      <header class="page__header text-center mb-4">
        <?php dntheme_archive_description('<div class="taxonomy-description ">', '</div>'); ?>
      </header><!-- .page-header -->

      <div class="row">
        <div class="col-md-8 col-lg-9">

          <div class="archive__content">
            <?php
            if (have_posts()) :
              while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/content', 'archive'); ?>

            <?php
              endwhile;
              dntheme_paging_nav();
            else :
              get_template_part('template-parts/content', 'none');
            endif;
            ?>
          </div>
        </div><!-- end col-md-9 -->
        <div class="col-md-4 col-lg-3">
          <?php get_sidebar('blog'); ?>
        </div>
      </div>
    </div>
  </div><!-- .wrap -->
</div>
<?php get_footer();
