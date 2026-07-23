<?php
/**
 * Template Part: About Us Hero
 *
 * Displays the top title, breadcrumb and tagline, plus a large placeholder for the logistics illustration.
 *
 * @package    skyqueen
 * @subpackage template-parts/about-us
 * @version 1.0
 */

// Pull tagline and illustration dynamically from page custom fields or use fallback
$tagline = get_field('hero_tagline') ?: 'Công ty TNHH Giao Nhận Sky Queen ra đời với định hướng trở thành nhà cung cấp dịch vụ Logistics chuyên nghiệp và là đối tác tin cậy của khách hàng trong nước và quốc tế.';
$illustration_id = get_field('hero_illustration');
$illustration_url = $illustration_id ? wp_get_attachment_image_url($illustration_id, 'full') : get_template_directory_uri() . '/assets/v2/about-us/banner.png';
?>

<section class="about-hero pt-4 pb-4">
  <div class="container-xxl position-absolute start-50 translate-middle-x">
    <div class="row mb-4">
      <div class="col-md-6 mb-3 mb-md-0 wow fadeInLeft" data-wow-delay="0.1s">
        <!-- Breadcrumb / Section tag -->
        <nav class="about-breadcrumb d-flex align-items-center gap-2 m-0">
          <span class="services__bullet"></span>
          <span class="text-theme text-uppercase">Giới thiệu</span>
        </nav>
      </div>
      <div class="col-md-6 wow fadeInRight" data-wow-delay="0.1s">
        <!-- Tagline giới thiệu -->
        <h4 class="about-hero__tagline text-dark lh-base m-0 fw-normal">
          <?= esc_html($tagline) ?>
        </h4>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- Hero Illustration Banner -->
    <div class="row about-hero__illustration overflow-hidden text-center wow fadeInUp" data-wow-delay="0.3s">
      <img src="<?= esc_url($illustration_url) ?>" class="d-block h-auto object-fit-cover px-0 w-100"
        alt="Sky Queen Logistics illustration banner">
    </div>
  </div>
</section>