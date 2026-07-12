<?php
/**
 * Template Part: Hero Banner
 *
 * Displays the full-width hero banner section on the home page.
 * ACF Fields: banner (image ID)
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */

$banner_id = get_field('banner');
$banner_url = $banner_id ? wp_get_attachment_image_url($banner_id, 'full') : '';
?>

<!--start slider-->
<section class="banner d-flex align-items-center" style="background-image: url('<?= esc_url($banner_url) ?>');">
  <video autoplay loop muted playsinline class="position-absolute top-0 start-0 w-100 h-100 banner__video">
    <source src="<?= esc_url(get_template_directory_uri() . '/assets/home/optimized_headervideo.mp4') ?>" type="video/mp4">
  </video>
  <div class="banner__overlay position-absolute top-0 start-0 w-100 h-100"></div>
  <div class="container position-relative z-1">

    <div class="row">
      <div class="col-md-12 mx-auto text-center text-white">
        <h3 class="banner__subtitle mb-2 wow fadeInUp" data-wow-delay="0.2s">SKY QUEEN LOGISTICS</h3>
        <h1 class="banner__title mb-3 wow fadeInUp" data-wow-delay="0.4s">VẬN CHUYỂN HÀNG HÓA ĐÚNG CÁCH</h1>
        <p class="banner__desc mb-4 wow fadeInUp" data-wow-delay="0.6s">DỊCH VỤ VẬN TẢI HÀNG HÓA KẾT NỐI TOÀN CẦU, <br class="d-none d-md-block">ĐẢM BẢO AN TOÀN, CHUYÊN NGHIỆP</p>
        <a href="#services" class="btn btn-primary rounded-0 px-4 py-2 fw-light text-uppercase wow fadeInUp banner__btn" data-wow-delay="0.8s">Liên hệ ngay <i class="icon-arrow-up-right ms-2"></i></a>
      </div>
    </div>
  </div>
</section><!--end slider-->
