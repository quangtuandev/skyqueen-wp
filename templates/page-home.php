<?php
/**
 * Template Name: Page Home
 *
 * Home page template using modular template parts.
 * Each section is organized in template-parts/home/ for easy maintenance.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 2.0
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('template-parts/home/section', 'hero-banner'); ?>

  <div class="home-content-wrap">
    <?php get_template_part('template-parts/home/section', 'about'); ?>

    <?php get_template_part('template-parts/home/section', 'solution'); ?>
    <?php get_template_part('template-parts/home/section', 'services'); ?>


    <!-- <?php get_template_part('template-parts/home/section', 'global-network'); ?> -->

    <?php get_template_part('template-parts/home/section', 'cta-contact'); ?>

    <?php get_template_part('template-parts/home/section', 'partners'); ?>

    <?php get_template_part('template-parts/home/section', 'testimonials'); ?>

    <?php get_template_part('template-parts/home/section', 'news'); ?>

    <?php get_template_part('template-parts/home/section', 'footer-cta'); ?>
  </div>

<?php endwhile; // End of the loop.
?>
<?php get_footer();
