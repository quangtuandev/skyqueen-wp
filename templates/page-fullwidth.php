<?php

/**
 * Template Name: Page Fullwidth
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

<div class="wrap__page">
    <main class="site-main" role="main">

        <?php
        while (have_posts()) : the_post(); ?>
            <div class="container">
                <article class="page__content">
                    <div class="entry-content -custom">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        <?php endwhile; // End of the loop.
        ?>

    </main>
</div>
<?php get_footer();
