<?php
/**
 * Template Part: About / Introduce
 *
 * Displays the company introduction section with image and stats.
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 * @version 3.0
 */
?>

<section class="home-about pt-5 pb-5 mt-5 mb-5">
  <div class="container-xxl">
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0 position-sticky about-sticky-slider">
        <!-- Swiper image slider for about section -->
        <div class="swiper swiper-about overflow-hidden position-relative">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="<?= esc_url(get_template_directory_uri() . '/assets/v2/about-1.jpg') ?>" class="w-100 object-fit-cover" alt="Sky Queen Logistics Cargo 1">
            </div>
            <div class="swiper-slide">
              <img src="<?= esc_url(get_template_directory_uri() . '/assets/v2/about-2.jpg') ?>" class="w-100 object-fit-cover" alt="Sky Queen Logistics Cargo 2">
            </div>
            <div class="swiper-slide">
              <img src="<?= esc_url(get_template_directory_uri() . '/assets/v2/about-3.jpg') ?>" class="w-100 object-fit-cover" alt="Sky Queen Logistics Cargo 3">
            </div>
            <div class="swiper-slide">
              <img src="<?= esc_url(get_template_directory_uri() . '/assets/v2/about-4.jpg') ?>" class="w-100 object-fit-cover" alt="Sky Queen Logistics Cargo 4">
            </div>
          </div>
          <!-- Navigation buttons at bottom-right corner -->
          <div class="about-nav-buttons position-absolute bottom-0 end-0 m-3 d-flex gap-2">
            <button class="about-button-prev d-flex align-items-center justify-content-center border-0 rounded-circle">
              <i class="icon-arrow-narrow-left"></i>
            </button>
            <button class="about-button-next d-flex align-items-center justify-content-center border-0 rounded-circle">
              <i class="icon-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ps-lg-5">
        <div class="about__content d-flex flex-column">
          <div class="about__header">
            <span class="section-subtitle d-flex align-items-center gap-2 mb-2 wow fadeInUp" data-wow-delay="0.1s">
              <span class="section-subtitle-bullet"></span> GIỚI THIỆU
            </span>
            <h2 class="section-title mb-3 wow fadeInUp" data-wow-delay="0.2s">SKY QUEEN LOGISTICS</h2>
            <h5 class="mb-3 wow fadeInUp" data-wow-delay="0.3s">Đối tác logistics “Tận Tâm Cho Mọi Điểm Chạm Hàng Hóa”</h5>
            <p class="about__desc mb-4 wow fadeInUp" data-wow-delay="0.4s">Sky Queen Logistics tự hào là nhà cung cấp dịch vụ Logistics toàn diện, chuyên xử lý các nghiệp vụ từ khai thuê hải quan đến ủy thác xuất nhập khẩu trọn gói. Chúng tôi cam kết mang lại sự an tâm tuyệt đối thông qua quy trình vận hành minh bạch và đội ngũ chuyên môn cao, giúp sản phẩm của bạn vươn tầm quốc tế với mức chi phí tối ưu.</p>
            <a href="#" class="btn btn-primary rounded-0 px-4 py-3 text-uppercase fw-bold wow fadeInUp d-inline-flex align-items-center gap-2 about__btn" data-wow-delay="0.5s">
              TÌM HIỂU THÊM <i class="fa fa-arrow-right" style="transform: rotate(-45deg); font-size: 14px;"></i>
            </a>
          </div>
          
          <div class="about__stats d-flex flex-column gap-3 mt-4">
            <div class="stat-item d-flex align-items-center lh-base wow fadeInUp" data-wow-delay="0.6s">
              <div class="stat-number" data-count="200">0<sup>+</sup></div>
              <div class="stat-line flex-grow-1 mx-4"></div>
              <div class="stat-label text-dark fw-normal">Quốc gia & Vùng lãnh thổ kết nối</div>
            </div>
            <div class="stat-item d-flex align-items-center lh-base wow fadeInUp" data-wow-delay="0.7s">
              <div class="stat-number" data-count="50">0<sup>+</sup></div>
              <div class="stat-line flex-grow-1 mx-4"></div>
              <div class="stat-label text-dark fw-normal">Đại lý hãng tàu & Hãng hàng không chiến lược</div>
            </div>
            <div class="stat-item d-flex align-items-center lh-base wow fadeInUp" data-wow-delay="0.8s">
              <div class="stat-number" data-count="3000">0<sup>+</sup></div>
              <div class="stat-line flex-grow-1 mx-4"></div>
              <div class="stat-label text-dark fw-normal">Khách hàng tin tưởng đồng hành</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
