<?php
/**
 * Template Part: News
 *
 * Displays the 10 latest blog posts in a Swiper carousel.
 * Layout: thumbnail, category + date, title, excerpt
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */
?>

<?php
$args = array(
  'post_type'      => 'post',
  'posts_per_page' => 10,
  'post_status'    => 'publish',
);
$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>
<section class="home-news" id="homeNews">
  <div class="container-xxl">

    <!-- Header: Subtitle + Title bên trái, Arrows bên phải -->
    <div class="news-header">
      <div class="news-header__text">
        <span class="services__subtitle text-uppercase mb-2">
          <span class="services__bullet"></span>Quy trình nhập khẩu
        </span>
        <h2 class="services__title text-dark">THÔNG TIN MỚI NHẤT</h2>
      </div>
      <div class="news-header__nav">
        <button class="news-nav-btn news-btn-prev" aria-label="Trước">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        </button>
        <button class="news-nav-btn news-btn-next" aria-label="Sau">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </div>
    </div>

    <!-- Swiper Carousel -->
    <div class="swiper swiper-news-v2">
      <div class="swiper-wrapper">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>" class="news-card">
              <div class="news-card__thumb">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('medium_large', ['class' => 'news-card__img', 'loading' => 'lazy']); ?>
                <?php else : ?>
                  <img src="<?= esc_url(get_theme_file_uri('assets/img/placeholder.jpg')) ?>" alt="<?php the_title_attribute(); ?>" class="news-card__img" loading="lazy">
                <?php endif; ?>
              </div>
              <div class="news-card__body">
                <div class="news-card__meta">
                  <?php
                  $categories = get_the_category();
                  if (!empty($categories)) {
                    echo '<span class="news-card__cat">' . esc_html($categories[0]->name) . '</span>';
                  }
                  ?>
                  <span class="news-card__date"><?php echo get_the_date('d / m / Y'); ?></span>
                </div>
                <h3 class="news-card__title"><?php the_title(); ?></h3>
                <p class="news-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

  </div>
</section>
<?php
  wp_reset_postdata();
endif;
?>

<script>
(function() {
  window.addEventListener('load', function() {
    if (typeof Swiper === 'undefined') return;
    new Swiper('.swiper-news-v2', {
      slidesPerView: 1,
      spaceBetween: 24,
      speed: 500,
      navigation: {
        nextEl: '.news-btn-next',
        prevEl: '.news-btn-prev',
      },
      breakpoints: {
        576:  { slidesPerView: 2 },
        992:  { slidesPerView: 3 },
        // 1400: { slidesPerView: 4 }
      }
    });
  });
})();
</script>
