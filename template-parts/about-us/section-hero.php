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
$tagline = get_field('hero_tagline') ?: 'Công ty TNHH Giao nhận Sky Queen tự hào là một trong những nhà cung cấp dịch vụ logistics chuyên nghiệp và đáng tin cậy nhất tại Việt Nam.';
$illustration_id = get_field('hero_illustration');
$illustration_url = $illustration_id ? wp_get_attachment_image_url($illustration_id, 'full') : get_template_directory_uri() . '/assets/v2/about-us/banner.png';
?>

<section class="about-hero pt-4 pb-4">
  <div class="container">
    <div class="row align-items-center mb-4">
      <div class="col-lg-5 col-md-6 mb-3 mb-md-0">
        <!-- Breadcrumb / Section tag -->
        <nav class="about-breadcrumb d-flex align-items-center gap-2 m-0">
          <span class="services__bullet"></span>
          <a href="<?= esc_url(home_url('/')) ?>" class="text-secondary text-decoration-none">Trang chủ</a>
          <span class="text-muted">/</span>
          <span class="text-dark fw-medium">Về chúng tôi</span>
        </nav>
      </div>
      <div class="col-lg-7 col-md-6">
        <!-- Tagline giới thiệu -->
        <h4 class="about-hero__tagline text-dark lh-base m-0 fw-normal">
          <?= esc_html($tagline) ?>
        </h4>
      </div>
    </div>
    
    <!-- Hero Illustration Banner -->
    <div class="about-hero__illustration overflow-hidden rounded-4 bg-white text-center mt-3">
      <img src="<?= esc_url($illustration_url) ?>" class="w-100 h-auto object-fit-cover d-block" alt="Sky Queen Logistics illustration banner" style="max-height: 480px; min-height: 250px; background-color: #f1f5f9;">
    </div>
  </div>
</section>
