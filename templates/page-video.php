<?php

/**
 * Template Name: Page Video
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

    <div class="wrap__page page-video">
        <main class="site-main" role="main">

            <?php
            $title = get_field('title');
            if ($title): ?>
                <p class="page-video__title text-center"><?= $title ?></p>
            <?php endif; ?>
   
            <?php
            if (have_rows('items')): $i = 0; ?>
                <div class="container mt-4 mb-5">
                    <div class="row g-4">
                        <?php while (have_rows('items')) : the_row();
                            $i++;
                            $image = get_sub_field('image');
                            $title = get_sub_field('title');
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
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>


            <div class="container">
                <div class="entry-content">
                    <?php the_content() ?>
                </div>
            </div>
        </main>
    </div>
<?php endwhile; ?>
<?php get_footer();
