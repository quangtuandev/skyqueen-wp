<?php
/**
 * Template Part: Partners
 *
 * Displays the partner/shipping line logos carousel with:
 * - Sticky container graphic that slides left-to-right on scroll
 * - CSS3 swinging animation for the container
 * - SVG grid overlay behind logo carousel
 * - Static logo array from assets/v2/provider/
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */

$partners = [
  ['file' => 'cma.png', 'name' => 'CMA CGM'],
  ['file' => 'cosco.png', 'name' => 'Cosco Shipping'],
  ['file' => 'evergreen.png', 'name' => 'Evergreen'],
  ['file' => 'hapag.png', 'name' => 'Hapag-Lloyd'],
  ['file' => 'hmm.png', 'name' => 'HMM'],
  ['file' => 'maersk.png', 'name' => 'Maersk'],
  ['file' => 'msc.png', 'name' => 'MSC'],
  ['file' => 'one.png', 'name' => 'ONE'],
  ['file' => 'sitc.png', 'name' => 'SITC'],
  ['file' => 'ts-lines.png', 'name' => 'TS Lines'],
  ['file' => 'wan-hai.png', 'name' => 'Wan Hai'],
];

$provider_base = get_theme_file_uri('assets/v2/provider/');
?>

<section class="home-partners" id="homePartnersSection">

  <!-- 1. Container Graphic — Sticky + Slide + Swing Animation -->
  <div class="partners-container-wrap" id="partnersContainerWrap">
    <div class="partners-container-inner" id="partnersContainerInner">
      <img src="<?= esc_url($provider_base . 'container.png') ?>" alt="Sky Queen Logistics Container"
        class="partners-container-img" loading="lazy" width="600" height="600">
    </div>
  </div>

  <!-- 2. Logo Carousel với Grid Overlay -->
  <div class="partners-logos-area position-relative" id="partnersLogosArea">

    <div class="container-fluid">
      <div class="swiper swiper-partners">
        <div class="swiper-wrapper align-items-center">
          <?php foreach ($partners as $partner): ?>
            <div class="swiper-slide">
              <div class="partner-item">
                <div class="partner-item-before"></div>
                <img src="<?= esc_url($provider_base . $partner['file']) ?>" alt="<?= esc_attr($partner['name']) ?>"
                  class="img-fluid" loading="lazy">
                <div class="partner-item-after"></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

</section>

<script>
  (function () {
    /* === 1. Container Slide: Trượt trái → phải theo scroll === */
    function initContainerSlide() {
      var wrap = document.getElementById('partnersContainerWrap');
      var inner = document.getElementById('partnersContainerInner');
      var section = document.getElementById('homePartnersSection');
      if (!wrap || !inner || !section) return;

      function onScroll() {
        var rect = section.getBoundingClientRect();
        var winH = window.innerHeight;

        // Tính tiến trình scroll trong section (0 → 1)
        var total = rect.height + winH;
        var scrolled = winH - rect.top;
        var progress = Math.max(0, Math.min(1, scrolled / total));

        // Slide wrap từ trái (-30%) → giữa (0%) rồi dừng
        var translateX = -30 + (progress * 30);
        translateX = Math.min(translateX, 0); // Không vượt quá giữa
        wrap.style.transform = 'translateX(' + translateX + '%)';
      }

      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll(); // init
    }


    /* === 3. Swiper Init cho Partners === */
    function initPartnersSwiper() {
      if (typeof Swiper === 'undefined') return;
      new Swiper('.swiper-partners', {
        slidesPerView: 2,
        spaceBetween: 0,
        loop: true,
        speed: 3000,
        autoplay: {
          delay: 0,
          disableOnInteraction: false,
        },
        allowTouchMove: true,
        breakpoints: {
          576: { slidesPerView: 3 },
          768: { slidesPerView: 4 },
          1200: { slidesPerView: 6 }
        }
      });
    }

    /* === Init === */
    window.addEventListener('load', function () {
      initContainerSlide();
      initPartnersSwiper();
    });
  })();
</script>