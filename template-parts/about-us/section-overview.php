<?php
/**
 * Template Part: About Us Overview
 *
 * Displays the main company summary, breadcrumb-tag and a highlighted blue quote/text block.
 *
 * @package    skyqueen
 * @subpackage template-parts/about-us
 * @version 1.0
 */

$subtitle = get_field('overview_subtitle') ?: 'VỀ CHÚNG TÔI';
$title = get_field('overview_title') ?: 'SKY QUEEN LOGISTICS';
$description = get_field('overview_description') ?: 'Công ty TNHH Giao nhận Sky Queen là nhà cung cấp dịch vụ trong lĩnh vực Logistics với năng lực đáp ứng mọi yêu cầu của khách hàng. Chúng tôi cung cấp dịch vụ các giải pháp trọn gói từ kho người bán cho đến khi hàng hóa tới tay người mua bằng việc thiết lập một chuỗi cung cấp dịch vụ vận chuyển trọn gói door to door tích hợp nhằm tiết kiệm thời gian, chi phí của khách hàng.';
$description2 = get_field('overview_description_2');
$highlight = get_field('overview_highlight') ?: 'Sky Queen định hướng trở thành nhà cung cấp dịch vụ Logistics chuyên nghiệp và là đối tác tin cậy củakhách hàng trong nước và quốc tế.';
?>

<section class="about-overview pt-5 pb-5 about-us-bg z-3 position-relative">
  <div class="container-xxl">
    <div class="row justify-content-between">
      <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
        <span class="about-overview__subtitle services__subtitle d-flex gap-2 mb-2">
          <span class="services__bullet"></span> <?= esc_html($subtitle) ?>
        </span>
        <h2 class="about-overview__title services__title text-dark mb-4"><?= esc_html($title) ?></h2>
      </div>
      <!-- Left Column: Primary Text Content -->
      <div class="col-md-8 col-lg-7 pe-lg-5 wow fadeInUp" data-wow-delay="0.3s">
        <div class="about-overview__content">
          <div class="about-overview__description">
            <p class="mb-4">
              <?= wp_kses_post($description) ?>
            </p>
            <p class="">
              <?= wp_kses_post($description2) ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Right Column: Blue Highlight Block -->
      <div class="col-md-4 col-lg-3 d-flex align-items-stretch wow fadeInUp" data-wow-delay="0.5s">
        <div class="about-overview__highlight d-flex">
          <p class="about-overview__highlight-text fw-medium lh-base m-0">
            <?= esc_html($highlight) ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>