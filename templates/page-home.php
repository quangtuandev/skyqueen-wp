<?php

/**
 * Template Name: Page Home
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


  <!--start slider-->
  <section class="banner">
    <div class="container">
      <?php
      $banner = get_field('banner');
      echo wp_get_attachment_image($banner, 'full');
      ?>
    </div>
  </section><!--end slider-->


  <?php
  $gt_image = get_field('gt_image');
  $gt_banner = get_field('gt_banner');
  ?>
  <section class="introduce">
    <div class="container">
      <div class="sc__image">
        <?php
        if ($gt_image) {
          echo wp_get_attachment_image($gt_image, 'full');
        }
        ?>
      </div>
      <?php
      if (have_rows('gt_items')): $i = 0; ?>
        <div class="introduce__list">
          <div class="c-list__item c-list__item--banner d-none d-xl-block">
            <div class="c-item c-item--banner">
              <?php
              if ($gt_banner) {
                echo wp_get_attachment_image($gt_banner, 'full');
              }
              ?>
            </div>
          </div>
          <?php while (have_rows('gt_items')) : the_row();
            $i++;
            $icon = get_sub_field('image');
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            $link = get_sub_field('link');
          ?>
            <div class="c-list__item">
              <div class="c-item position-relative">
                <div class="c-item__thumb">
                  <?php
                  if ($icon) {
                    echo wp_get_attachment_image($icon, 'small');
                  }
                  ?>
                </div>
                <div class="c-item__meta">
                  <div class="c-item__title"><a href="<?= $link ?>" class="stretched-link"><?= $title ?></a></div>
                  <div class="c-item__content"><?= $content ?></div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif;
      ?>
    </div>
  </section><!-- m_slide -->

  <?php
  $gt2_image = get_field('gt2_image');
  $gt2_content = get_field('gt2_content');
  ?>
  <section class="introduce2">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="sc__image">
            <?php
            if ($gt2_image) {
              echo wp_get_attachment_image($gt2_image, 'full');
            }
            ?>
          </div>
        </div>
        <div class="col-md-7">
          <div class="entry-content">
            <?php the_field('gt2_content') ?>
          </div>

          <?php
          if (have_rows('gt3_items')): $i = 0; ?>
            <div class="row g-2">
              <?php while (have_rows('gt3_items')) : the_row();
                $i++;
                $title = get_sub_field('title');
                $content = get_sub_field('content');
              ?>
                <div class="col-sm-6 col-md-4">
                  <div class="c-item position-relative">
                    <div class="c-item__title"><?= $title ?></div>
                    <div class="c-item__content"><?= $content ?></div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif;
          ?>
        </div>
      </div>
    </div>
  </section><!-- m_slide -->


  <section class="home-contact">
    <div class="container">

      <div class="sc-content">
        <div class="row">
          <div class="col-md-5">
            <div class="box-contact mb-4 mb-md-0">
              <?php echo do_shortcode('[contact-form-7 id="053e9b2" title="Form gửi câu hỏi"]') ?>
            </div>
          </div>
        </div>
      </div>
  </section>

  <?php
  $custom_items = get_field('custom_items');
  $custom_title = get_field('custom_title');
  $custom_subtitle = get_field('custom_subtitle'); ?>
  <?php
  if (have_rows('custom_items')): $i = 0; ?>
    <section class="testimonials">
      <div class="container">
        <div class="section__header">
          <div class="section__title" data-title="<?= $custom_subtitle ?>"><?= $custom_title ?></div>
        </div>
        <div class="swiper swiper-testimonials">
          <div class="swiper-wrapper">
            <?php while (have_rows('custom_items')) : the_row();
              $i++;
              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $content = get_sub_field('content');
            ?>
              <div class="swiper-slide">
                <div class="c-item position-relative">
                  <div class="c-item__thumb">
                    <?php
                    if ($image) {
                      echo wp_get_attachment_image($image, 'small');
                    }
                    ?>
                  </div>
                  <div class="c-item__meta">
                    <div class="c-item__content"><?= $content ?></div>
                    <div class="c-item__title"><?= $title ?></div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <section class="news">
    <div class="container">
        <div class="section__header">
          <div class="section__title" data-title="Tin tức">mới nhất</div>
        </div>
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 4,
        );
        $the_query = new WP_Query($args); ?>
        <div class="sc__content">
          <?php if ($the_query->have_posts()) : ?>
            <div class="swiper-news swiper">
              <div class="swiper-wrapper">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <div class="swiper-slide">
                  <?php get_template_part( 'template-parts/content','archive-full'); ?>
                  </div>
                <?php endwhile; ?>
              </div>
              <div class="swiper-button swiper-button-next"></div>
              <div class="swiper-button swiper-button-prev"></div>
            </div>
          <?php
            wp_reset_postdata();
          else :
            get_template_part('template-parts/content', 'none');
          endif; ?>
        </div>
    </div>
  </section>
<?php endwhile; // End of the loop.
?>
<?php get_footer();
