<?php
/**
 * Template Part: Testimonials
 *
 * Displays the client testimonials carousel using Swiper.
 * ACF Fields: custom_title (text), custom_subtitle (text), custom_items (repeater)
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */

$custom_items = get_field('custom_items');
$custom_title = get_field('custom_title') ?: 'HÀI LÒNG - TẬN TÂM - UY TÍN';
$custom_subtitle = get_field('custom_subtitle') ?: 'KHÁCH HÀNG NÓI VỀ CHÚNG TÔI';
?>

<?php if (have_rows('custom_items')):
  $i = 0; ?>
  <section class="home-testimonials pt-5 pb-5">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center z-1">
          <div class="services__intro-header wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <span class="services__subtitle text-uppercase mb-2">
              <span class="services__bullet"></span>Đánh giá từ khách hàng
            </span>
            <h2 class="services__title text-dark mb-5">HÀI LÒNG - TẬN TÂM - UY TÍN</h2>
          </div>
        </div>
      </div>
      <div class="swiper swiper-testimonials px-4 wow fadeInUp" data-wow-delay="0.3s">
        <div class="swiper-wrapper">
          <?php while (have_rows('custom_items')):
            the_row();
            $i++;
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            ?>
            <div class="swiper-slide h-auto">
              <div class="testimonial-card h-100">
                <div class="testimonial-card__avatar">
                  <?php
                  if ($image) {
                    echo wp_get_attachment_image($image, 'thumbnail', false, ['class' => 'img-fluid']);
                  } else {
                    echo '<img src="https://via.placeholder.com/80" alt="Avatar" class="img-fluid">';
                  }
                  ?>
                </div>
                <div class="testimonial-card__body">
                  <div class="testimonial-card__author"><?= esc_html($title) ?></div>
                  <div class="testimonial-card__content"><?= wp_kses_post($content) ?></div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <!-- Add Pagination/Navigation if needed -->
        <div class="swiper-pagination mt-4"></div>
      </div>
    </div>
  </section>
<?php endif; ?>