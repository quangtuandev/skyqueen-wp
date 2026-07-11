<?php

/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category();

?>
<article class="archive__item archive__item--full ef__shine">
  <div class="item__thumb el-item__thumb">
    <a href="<?php the_permalink(); ?>" class="dnfix__thumb">
      <?php the_post_thumbnail('medium', array('class' => 'img-fluid', 'alt'   => get_the_title())); ?>
    </a>
  </div><!-- .post-thumbnail -->
  <div class="item__meta">
    <h3 class="entry-title item__title">
      <a href="<?php echo esc_url(get_permalink()); ?>" class="text__truncate" title="<?php the_title(); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    </h3>
    <div class="entry-summary d-none d-md-block">
      <div class="text__truncate -n2">
        <?php dn_excerpt(250); ?>
      </div>
    </div><!-- .entry-summary -->
  </div>
</article><!-- #post-## -->