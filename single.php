<?php

/**
 * The template for displaying all single posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<div class="wrap__page">
    <div class="container">
        <div class="wrap__content sc__wrap">
            <div class="dn__breadcrumb <?php echo is_page_template('page-contact.php') ? 'd-none' : '' ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'single');
                    endwhile;
                    ?>
                </div>
                <div class="col-md-4 col-lg-3">
                    <?php get_sidebar('blog'); ?>
                </div>
            </div>
        </div>
    </div><!-- .wrap -->
</div>
<?php get_footer();
