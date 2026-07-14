<?php
/**
 * Template Name: Page About US
 *
 * About Us page template using modular template parts.
 * Each section is organized in template-parts/about-us/ for easy maintenance.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 2.0
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <div class="about-us-page-wrap">
    <main class="site-main" role="main">
      <?php get_template_part('template-parts/about-us/section', 'hero'); ?>
      <?php get_template_part('template-parts/about-us/section', 'overview'); ?>
      <?php get_template_part('template-parts/about-us/section', 'info'); ?>
      <?php get_template_part('template-parts/about-us/section', 'business-fields'); ?>
      <?php get_template_part('template-parts/about-us/section', 'vision-mission'); ?>
    </main>
  </div>

<?php endwhile; // End of the loop. ?>
<?php get_footer();
