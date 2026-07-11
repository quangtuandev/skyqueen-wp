<?php

/**
 * Template Name: Page Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

  <div class="wrap__page page__contact">
    <main class="site-main" role="main">
      <div class="google__map">
        <div class="container">
          <?php the_content() ?>
        </div>
      </div>

      <div class="container">
        <div class="page__content sc__wrap entry-content -custom">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 mb-5 mb-xl-0">
                <div class="box-contact">
                  <?php echo do_shortcode(get_field('shortcode')) ?>
                </div>
            </div>
            <div class="col-md-6">
              <div class="google__map">
                <?php echo do_shortcode(get_field('map')) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
<?php endwhile; ?>
<?php get_footer();
