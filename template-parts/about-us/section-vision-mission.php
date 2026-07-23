<?php
/**
 * Template Part: About Us Vision & Mission
 *
 * Displays the Vision, Mission, and Core Values inside a dark blue background.
 *
 * @package    skyqueen
 * @subpackage template-parts/about-us
 * @version 1.0
 */

$vm_subtitle = get_field('vm_subtitle') ?: 'Tầm nhìn - Sứ mệnh - Giá trị cốt lõi';
$vm_title = get_field('vm_title') ?: 'VỮNG NỀN TẢNG, VƯƠN TẦM XA';

$vision_img_id = get_field('vision_img');
$vision_img = $vision_img_id ? wp_get_attachment_image_url($vision_img_id, 'full') : get_template_directory_uri() . '/assets/v2/about-us/tamnhin.jpg';
$vision_text = get_field('vision_text') ?: 'Trở thành một trong những nhà cung cấp dịch vụ logistics chuyên nghiệp, đáng tin cậy và hiệu quả hàng đầu tại Việt Nam và khu vực. Chúng tôi không ngừng đổi mới và mở rộng mạng lưới để kết nối giao thương toàn cầu dễ dàng hơn.';

$mission_img_id = get_field('mission_img');
$mission_img = $mission_img_id ? wp_get_attachment_image_url($mission_img_id, 'full') : get_template_directory_uri() . '/assets/v2/about-us/sumenh.jpg';
$mission_text = get_field('mission_text') ?: 'Cung cấp các giải pháp logistics tối ưu nhất, giúp khách hàng tiết kiệm tối đa chi phí và thời gian, nâng cao năng lực cạnh tranh trên thị trường toàn cầu. Đồng thời, kiến tạo môi trường làm việc hạnh phúc, phát triển bền vững cho toàn thể cán bộ nhân viên.';

$values_img_id = get_field('values_img');
$values_img = $values_img_id ? wp_get_attachment_image_url($values_img_id, 'full') : get_template_directory_uri() . '/assets/v2/about-us/giatricotloi.jpg';

// We can support a custom list from the backend
$custom_values = get_field('values_list');
?>

<section class="about-vm pt-5 text-white position-relative bg-white z-3">
  <video autoplay loop muted playsinline class="w-100 about-vm_background">
    <source src="<?= esc_url(get_template_directory_uri() . '/assets/v2/about-us/optimized_bg.mp4') ?>" type="video/mp4">
  </video>
  <div class="container-xxl pt-4">
    <div class="row justify-content-center about-vm_header">
      <div class="col-lg-8 text-center">
        <div class="services__intro-header">
          <span class="services__subtitle text-uppercase mb-2 text-white wow fadeInUp" data-wow-delay="0.1s">
            <span class="services__bullet"></span>
            <?= esc_html($vm_subtitle) ?>
          </span>
          <h2 class="services__title text-white mb-5 wow fadeInUp" data-wow-delay="0.3s">
            <?= esc_html($vm_title) ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="about-vm__blocks mt-5">
      <!-- Block 1: TẦM NHÌN -->
      <div class="row mb-5 vision-mission-card position-relative">
        <!-- SVG Grid Overlay (dynamic smart guides for this card) -->
        <svg class="vm-card-grid-svg d-none d-md-block"
          style="position: absolute; inset:0; padding:0; pointer-events: none; z-index: 1;"></svg>

        <div class="col-md-6 mb-4 mb-md-0 px-md-0 position-relative z-3">
          <div class="about-vm__img rounded-0 overflow-hidden ratio" data-grid>
            <img src="<?= esc_url($vision_img) ?>" class="w-100 object-fit-cover d-block"
              alt="Sky Queen Logistics Vision">
          </div>
        </div>
        <div class="col-md-6 position-relative z-3 px-md-0">
          <div class="about-vm__card bg-white p-4 rounded-0 h-100 position-relative" data-grid>
            <div
              class="about-vm__card-icon d-flex align-items-center justify-content-center bg-primary text-white mb-3"
              style="width: 44px; height: 44px;">
              <span class="icon-globe-03 fs-4"></span>
            </div>
            <h3 class="about-vm__card-title fw-bold text-dark mb-3">TẦM NHÌN</h3>
            <p class="about-vm__card-text text-secondary lh-lg m-0">
              <?= esc_html($vision_text) ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Block 2: SỨ MỆNH -->
      <div class="row mb-5 vision-mission-card position-relative">
        <!-- SVG Grid Overlay (dynamic smart guides for this card) -->
        <svg class="vm-card-grid-svg d-none d-md-block"
          style="position: absolute; inset:0; padding:0; pointer-events: none; z-index: 1;"></svg>

        <div class="col-md-6 mb-4 mb-md-0 px-md-0 position-relative z-3">
          <div class="about-vm__img rounded-0 overflow-hidden ratio" data-grid>
            <img src="<?= esc_url($mission_img) ?>" class="w-100 object-fit-cover d-block"
              alt="Sky Queen Logistics Mission">
          </div>
        </div>
        <div class="col-md-6 position-relative z-3 px-md-0">
          <div class="about-vm__card bg-white p-4 rounded-0 h-100 position-relative" data-grid>
            <div
              class="about-vm__card-icon d-flex align-items-center justify-content-center bg-primary text-white mb-3"
              style="width: 44px; height: 44px;">
              <span class="icon-target fs-4"></span>
            </div>
            <h3 class="about-vm__card-title fw-bold text-dark mb-3">SỨ MỆNH</h3>
            <p class="about-vm__card-text text-secondary lh-lg m-0">
              <?= esc_html($mission_text) ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Block 3: GIÁ TRỊ CỐT LÕI -->
      <div class="row vision-mission-card position-relative">
        <!-- SVG Grid Overlay (dynamic smart guides for this card) -->
        <svg class="vm-card-grid-svg d-none d-md-block"
          style="position: absolute; inset:0; padding:0; pointer-events: none; z-index: 1;"></svg>

        <div class="col-md-6 mb-4 mb-md-0 px-md-0 position-relative z-3">
          <div class="about-vm__img rounded-0 overflow-hidden ratio" data-grid>
            <img src="<?= esc_url($values_img) ?>" class="w-100 object-fit-cover d-block"
              alt="Sky Queen Logistics Core Values">
          </div>
        </div>
        <div class="col-md-6 position-relative z-3 px-md-0">
          <div class="about-vm__card bg-white p-4 rounded-0 h-100 position-relative" data-grid>
            <div
              class="about-vm__card-icon d-flex align-items-center justify-content-center bg-primary text-white mb-3"
              style="width: 44px; height: 44px;">
              <span class="icon-diamon fs-4"></span>
            </div>
            <h3 class="about-vm__card-title fw-bold text-dark mb-3">GIÁ TRỊ CỐT LÕI</h3>
            <ul class="about-vm__card-text text-secondary lh-lg m-0 p-0 list-unstyled">
              <?php if ($custom_values && is_array($custom_values)): ?>
                <?php foreach ($custom_values as $val): ?>
                  <li class="mb-2 d-flex align-items-start gap-2">
                    <span class="bullet-dot mt-2"></span>
                    <span><strong><?= esc_html($val['title']) ?>:</strong> <?= esc_html($val['desc']) ?></span>
                  </li>
                <?php endforeach; ?>
              <?php else: ?>
                <li class="mb-2 d-flex align-items-start gap-2">
                  <span class="bullet-dot mt-2"></span>
                  <span><strong>Tôn trọng:</strong> Tôn trọng khách hàng, đối tác và đồng nghiệp.</span>
                </li>
                <li class="mb-2 d-flex align-items-start gap-2">
                  <span class="bullet-dot mt-2"></span>
                  <span><strong>Trách nhiệm:</strong> Tận tâm trong từng khâu xử lý hàng hóa.</span>
                </li>
                <li class="mb-2 d-flex align-items-start gap-2">
                  <span class="bullet-dot mt-2"></span>
                  <span><strong>Chuyên nghiệp:</strong> Vận hành chuẩn mực, minh bạch thông tin.</span>
                </li>
                <li class="d-flex align-items-start gap-2">
                  <span class="bullet-dot mt-2"></span>
                  <span><strong>Hiệu quả:</strong> Tối ưu giải pháp đem lại giá trị vượt trội.</span>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  /**
   * Static Grid Layout drawing for each individual Vision & Mission Card
   * - Draws 4 border lines inset by 16px (left, right, top, bottom)
   * - Draws a vertical center dividing line
   * - Draws marker dots at the 4 outer corner intersections
   */
  (function () {
    function drawVmCardsGrid() {
      var cards = document.querySelectorAll('.vision-mission-card');
      cards.forEach(function (card) {
        var svg = card.querySelector('.vm-card-grid-svg');
        if (!svg) return;

        var cardRect = card.getBoundingClientRect();
        var W = cardRect.width;
        var H = cardRect.height;

        svg.setAttribute('viewBox', '0 0 ' + W + ' ' + H);
        svg.innerHTML = '';

        // Draw vertical lines
        svg.appendChild(makeLine(16, 0, 16, H));
        svg.appendChild(makeLine(W - 16, 0, W - 16, H));
        svg.appendChild(makeLine(W / 2, 0, W / 2, H));

        // Draw horizontal lines
        svg.appendChild(makeLine(0, 16, W, 16));
        svg.appendChild(makeLine(0, H - 16, W, H - 16));

        // Draw marker squares centered at the outer intersections
        svg.appendChild(makeDot(16, 16));
        svg.appendChild(makeDot(W - 16, 16));
        svg.appendChild(makeDot(16, H - 16));
        svg.appendChild(makeDot(W - 16, H - 16));
      });
    }

    function makeLine(x1, y1, x2, y2) {
      var line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
      line.setAttribute('x1', x1);
      line.setAttribute('y1', y1);
      line.setAttribute('x2', x2);
      line.setAttribute('y2', y2);
      line.setAttribute('stroke', 'rgba(203, 213, 225, 1)');
      line.setAttribute('stroke-width', '1');
      return line;
    }

    function makeDot(x, y) {
      var size = 8;
      var rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
      rect.setAttribute('x', x - size / 2);
      rect.setAttribute('y', y - size / 2);
      rect.setAttribute('width', size);
      rect.setAttribute('height', size);
      rect.setAttribute('fill', '#CBD5E1');
      return rect;
    }

    var bgTimer;
    function handleVmBackgroundSticky() {
      var section = document.querySelector('.about-vm');
      var header = document.querySelector('.about-vm_header');
      var bg = document.querySelector('.about-vm_background');
      if (!section || !header || !bg) return;

      var headerRect = header.getBoundingClientRect();
      var sectionRect = section.getBoundingClientRect();

      var isPinned = (Math.floor(headerRect.top) <= 100);
      
      clearTimeout(bgTimer);
      if (isPinned) {
        bgTimer = setTimeout(function() {
          bg.classList.add('is-vm-bg-pinned');
        }, 10);
      } else {
        bg.classList.remove('is-vm-bg-pinned');
      }
    }

    window.addEventListener('load', drawVmCardsGrid);
    window.addEventListener('resize', drawVmCardsGrid);
    document.addEventListener('DOMContentLoaded', drawVmCardsGrid);
    setTimeout(drawVmCardsGrid, 1000);

    window.addEventListener('scroll', handleVmBackgroundSticky);
    window.addEventListener('resize', handleVmBackgroundSticky);
    window.addEventListener('load', handleVmBackgroundSticky);
    document.addEventListener('DOMContentLoaded', handleVmBackgroundSticky);
  })();
</script>