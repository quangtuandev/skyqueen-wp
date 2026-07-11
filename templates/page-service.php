<?php

/**
 * Template Name: Page Service
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

    <div class="wrap__page page-service">
        <main class="site-main" role="main">
            <div class="container">
                <?php
                $banner = get_field('banner');
                if ($banner) { ?>
                    <div class="text-center">
                        <?= wp_get_attachment_image($banner, 'full'); ?>
                    </div>
                <?php } ?>
                <?php
                $title = get_field('title');
                if ($title): ?>
                    <p class="page-service__title text-center"><?= $title ?></p>
                <?php endif; ?>
                <?php
                $subtitle = get_field('subtitle');
                if ($subtitle): ?>
                    <p class="page-service__subtitle text-center"><?= $subtitle ?></p>
                <?php endif; ?>


                <?php
                if (have_rows('items')): $i = 0; ?>
                    <div class="mt-4">
                        <div class="row g-2 g-xl-4">
                            <?php while (have_rows('items')) : the_row();
                                $i++;
                                $image = get_sub_field('image');
                                $title = get_sub_field('title');
                                $link = get_sub_field('link');
                            ?>
                                <div class="col-6 col-md-3">
                                    <div class="c-item position-relative">
                                        <div class="c-item__thumb">
                                            <?php
                                            if ($image) {
                                                echo wp_get_attachment_image($image, 'large');
                                            }
                                            ?>
                                        </div>
                                        <div class="c-item__meta">
                                            <div class="c-item__title"><?= $title ?></div>
                                        </div>
                                        <a href="<?= $link ?>" class="btn c-item__buton">Tìm hiểu ngay</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row mt-5 justify-content-center">
                    <div class="col-md-6">
                        <div class="box-contact">
                        <?php echo do_shortcode('[contact-form-7 id="053e9b2" title="Form gửi câu hỏi"]') ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php endwhile; ?>
<?php get_footer();
