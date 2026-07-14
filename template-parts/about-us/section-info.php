<?php
/**
 * Template Part: About Us General Info
 *
 * Displays the 3 info cards under "THÔNG TIN CHUNG".
 *
 * @package    skyqueen
 * @subpackage template-parts/about-us
 * @version 1.0
 */
?>

<section class="about-info pt-5 pb-5">
  <div class="container-xxl">
    <div class="section-header mb-5">
      <h2 class="section-title">THÔNG TIN CHUNG</h2>
    </div>
    
    <div class="row g-4">
      <!-- Card 1: Thông tin định danh -->
      <div class="col-lg-4 col-md-6">
        <div class="about-info-card bg-white p-3 h-100 rounded-0 border-0 d-flex flex-column">
          <div class="about-info-card__icon-wrap mb-4 d-flex align-items-center justify-content-center rounded-0">
            <span class="icon-certificate text-white fs-3"></span>
          </div>
          <h4 class="about-info-card__title fw-bold text-dark mb-3">Thông tin định danh</h4>
          <ul class="about-info-card__list  p-0 m-0 flex-grow-1 list-unstyled">
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Tên gọi công ty: </span> Công Ty TNHH Giao Nhận Sky Queen
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Tên giao Tiếng Anh: </span> Sky Queen Logistics company limited
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Tên viết tắt: </span> SYQ Co., Ltd
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Card 2: Thông tin thuế -->
      <div class="col-lg-4 col-md-6">
        <div class="about-info-card bg-white p-3 h-100 rounded-0 border-0 d-flex flex-column">
          <div class="about-info-card__icon-wrap mb-4 d-flex align-items-center justify-content-center rounded-0">
            <span class="icon-data text-white fs-3"></span>
          </div>
          <h4 class="about-info-card__title fw-bold text-dark mb-3">Thông tin thuế</h4>
          <ul class="about-info-card__list  p-0 m-0 flex-grow-1 list-unstyled">
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Mã số thuế: </span> 0314836268. Ngày cấp: 12/01/2018.
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Cơ quan thuế quản lý: </span> Chi cục Thuế thành phố Thủ Đức.
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Loại hình: </span> Doanh nghiệp tư nhân (100% vốn trong nước).
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Người đại diện pháp luật: </span> Phan Thị Nguyệt
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Card 3: Thông tin liên hệ -->
      <div class="col-lg-4 col-md-6 mx-auto">
        <div class="about-info-card bg-white p-3 h-100 rounded-0 border-0 d-flex flex-column">
          <div class="about-info-card__icon-wrap mb-4 d-flex align-items-center justify-content-center rounded-0">
            <span class="icon-pin text-white fs-3"></span>
          </div>
          <h4 class="about-info-card__title fw-bold text-dark mb-3">Thông tin liên hệ</h4>
          <ul class="about-info-card__list  p-0 m-0 flex-grow-1 list-unstyled">
            <?php
            $address = get_field('address', 'option') ?: '22 đường N7, Khu phố 3, Phường Cát Lái, Thành phố Thủ Đức, Thành phố Hồ Chí Minh, Việt Nam.';
            $phone   = get_field('phone', 'option') ?: (get_field('hotline', 'option') ?: '028-66829886');
            $phone2  = get_field('phone2', 'option');
            $email   = get_field('email', 'option') ?: 'cskhskyqueen@gmail.com';
            $website = get_field('website', 'option') ?: 'www.skyqueen.vn';
            ?>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Trụ sở đặt tại: </span> <?= esc_html($address) ?>
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Điện thoại: </span> <?= esc_html($phone) ?><?= $phone2 ? ' - ' . esc_html($phone2) : '' ?>
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Email: </span> <?= esc_html($email) ?>
            </li>
            <li>
              <span class="bullet-dot mt-2"></span>
              <span>Website: </span> <?= esc_html($website) ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
