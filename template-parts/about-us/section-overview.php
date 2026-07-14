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
$description = get_field('overview_description') ?: 'Đồng hành cùng khách hàng trong hành trình phát triển và vươn tầm, <strong>Sky Queen Logistics</strong> cung cấp giải pháp logistics toàn diện, tối ưu hóa chi phí và thời gian. Với đội ngũ nhân viên giàu kinh nghiệm và hệ thống đại lý toàn cầu, chúng tôi tự tin mang đến các dịch vụ vận tải quốc tế, thông quan hải quan và hậu cần nội địa đạt chuẩn mực chất lượng cao nhất.';
$description2 = get_field('overview_description_2') ?: 'Chúng tôi luôn nỗ lực không ngừng nâng cao nghiệp vụ chuyên môn, cải tiến quy trình công nghệ nhằm mang đến những trải nghiệm tối ưu nhất cho từng chuyến hàng. Sự hài lòng và thành công của quý đối tác chính là động lực lớn nhất để tập thể Sky Queen Logistics vững tin vững bước kiến tạo tương lai phát triển bền vững.';
$highlight = get_field('overview_highlight') ?: 'Sky Queen Logistics không chỉ đơn thuần cung cấp dịch vụ logistics chất lượng cao, chúng tôi mong muốn trở thành người bạn đồng hành tin cậy, thấu hiểu khó khăn và cùng khách hàng thiết kế những phương án tối ưu nhất.';
?>

<section class="about-overview pt-5 pb-5">
  <div class="container">
    <div class="row">
      <!-- Left Column: Primary Text Content -->
      <div class="col-lg-8 pe-lg-5">
        <div class="about-overview__content">
          <span class="about-overview__subtitle d-flex align-items-center gap-2 mb-2">
            <span class="services__bullet"></span> <?= esc_html($subtitle) ?>
          </span>
          <h2 class="about-overview__title text-dark fw-bold mb-4"><?= esc_html($title) ?></h2>
          
          <div class="about-overview__description text-secondary lh-lg">
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
      <div class="col-lg-4 mt-4 mt-lg-0 d-flex align-items-stretch">
        <div class="about-overview__highlight w-100 p-4 rounded-4 d-flex align-items-center">
          <p class="about-overview__highlight-text fw-medium lh-base m-0 text-primary">
            <?= esc_html($highlight) ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
