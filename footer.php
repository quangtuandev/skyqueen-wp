<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo', 'option');
// $zalo = get_field('zalo','option');
$phone = get_field('hotline', 'option');
$zalo = get_field('zalo', 'option');
$link_map = get_field('link_map', 'option');
$facebook = get_field('facebook', 'option');
$telegram = get_field('telegram', 'option');
$instagram = get_field('instagram', 'option');
$youtube = get_field('youtube', 'option');
$tiktok = get_field('tiktok', 'option');
$twitter = get_field('twitter', 'option');
$email = get_field('email', 'option');
$email2 = get_field('email_2', 'option') ?: (get_field('email2', 'option') ?: 'customs@skyqueen.vn');
$phone2 = get_field('phone2', 'option') ?: (get_field('phone_2', 'option') ?: '0375 150 586');
?>

<footer class="footer-new">
  <div class="container footer-grid-container position-relative">
    <div class="footer-grid">
      
      <!-- Ô 1: CTA (Top-Left) -->
      <div class="footer-grid__cell footer-grid__cta">
        <h3 class="footer-cta__title">Hãy Liên Hệ Với Chúng Tôi Để Được Tư Vấn Miễn Phí</h3>
        <p class="footer-cta__desc">Là một công ty Logistics toàn diện, Sky Queen thiết kế một chuỗi các dịch vụ để tiết kiệm thời gian của khách hàng khi lựa chọn nhà vận chuyển trọn gói có thể đáp ứng các nhu cầu vận chuyển door-to-door tích hợp.</p>
        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="footer-cta__btn">LIÊN HỆ TƯ VẤN NGAY <span class="arrow-up-right">&#8599;</span></a>
      </div>
      
      <!-- Ô 2: Brand Logo (Top-Right) -->
      <div class="footer-grid__cell footer-grid__brand">
        <div class="brand-text">
          <span class="brand-text__main">SKY QUEEN</span>
          <span class="brand-text__sub">LOGISTICS</span>
        </div>
      </div>
      
      <!-- Ô 3: Navigation Links & Copyright (Bottom-Left) -->
      <div class="footer-grid__cell footer-grid__nav">
        <div class="footer-nav-cols">
          <div class="footer-nav-col">
            <h4>Khám phá Sky Queen</h4>
            <ul>
              <li><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a></li>
              <li><a href="<?php echo esc_url(home_url('/gioi-thieu')); ?>">Giới thiệu</a></li>
              <li><a href="<?php echo esc_url(home_url('/dich-vu')); ?>">Dịch vụ</a></li>
              <li><a href="<?php echo esc_url(home_url('/quy-trinh-xuat-nhap-khau')); ?>">Quy trình xuất nhập khẩu</a></li>
              <li><a href="<?php echo esc_url(home_url('/lich-tau')); ?>">Lịch tàu</a></li>
              <li><a href="<?php echo esc_url(home_url('/lien-he')); ?>">Liên hệ</a></li>
              <li><a href="<?php echo esc_url(home_url('/chinh-sach-bao-mat')); ?>">Chính sách bảo mật</a></li>
              <li><a href="<?php echo esc_url(home_url('/dieu-khoan-dich-vu')); ?>">Điều khoản dịch vụ</a></li>
            </ul>
          </div>
          <div class="footer-nav-col">
            <h4>Kênh</h4>
            <ul>
              <?php if ($facebook) : ?>
                <li><a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="nofollow noopener">Facebook</a></li>
              <?php endif; ?>
              <?php if ($instagram) : ?>
                <li><a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="nofollow noopener">Instagram</a></li>
              <?php endif; ?>
              <?php if ($tiktok) : ?>
                <li><a href="<?php echo esc_url($tiktok); ?>" target="_blank" rel="nofollow noopener">Tik Tok</a></li>
              <?php endif; ?>
              <?php if ($twitter) : ?>
                <li><a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="nofollow noopener">X (Twitter)</a></li>
              <?php endif; ?>
              <?php if ($youtube) : ?>
                <li><a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="nofollow noopener">Youtube</a></li>
              <?php endif; ?>
              <?php if ($telegram) : ?>
                <li><a href="<?php echo esc_url($telegram); ?>" target="_blank" rel="nofollow noopener">Telegram</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="footer-copyright">
          © 2026 Sky Queen Logistics
        </div>
      </div>
      
      <!-- Ô 4: Contact Info & QR Code (Bottom-Right) -->
      <div class="footer-grid__cell footer-grid__contact">
        <div class="footer-contact-wrapper">
          <div class="footer-contact-info">
            <h4>Liên hệ</h4>
            <p><strong>Địa chỉ:</strong> <?php the_field('address', 'option'); ?></p>
            <p><strong>HCM Office:</strong> I-18 Pho Dong Village, 1145 Nguyen Thi Dinh Street, Cat Lai Ward, Thu duc City ( District 2 ), HCMC, Vietnam.</p>
            <p><strong>Email:</strong> <?php echo esc_html($email); ?><br><?php echo esc_html($email2); ?></p>
            <p><strong>Hotline:</strong> <?php echo esc_html($phone); ?> – <?php echo esc_html($phone2); ?></p>
            <p><strong>Zalo:</strong> <?php echo esc_html($zalo ?: '0983842919'); ?></p>
            
            <a href="<?php echo esc_url($link_map); ?>" target="_blank" rel="nofollow noopener" class="footer-map-link">GOOGLE MAP <span class="arrow-up-right">&#8599;</span></a>
          </div>
          
          <div class="footer-qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://zalo.me/<?php echo dntheme_remove_space($zalo ?: '0983842919'); ?>" alt="Zalo QR Code" />
          </div>
        </div>
      </div>
      
    </div>
    
    <!-- Giao điểm Grid (Intersection Dot) -->
    <div class="footer-grid__intersection"></div>
  </div>
</footer>

<nav id="menu__mobile" class="nav__mobile">
  <div class="nav__mobile__header">
    <div class="nav__mobile__logo">

      <?php
      $logo_img = get_field('logo', 'option'); ?>
      <a href="<?php echo site_url(); ?>">
        <?php echo wp_get_attachment_image($logo_img, 'full'); ?>
      </a>
    </div>
    <div class="ms-auto">
      <a href="#menu__mobile" class="mburger">
        <span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></span>
      </a>
    </div>
  </div>
  <?php
  wp_nav_menu(
    array(
      'theme_location' => 'primary',
      'container_class' => 'nav__mobile__menu',
      'menu_class' => 'nav__mobile--ul',
    )
  );
  ?>
</nav>

<div class="giuseart-nav">
  <ul>
    <li><a href="<?= $link_map ?>" rel="nofollow" target="_blank"><i class="ticon-heart"></i></a></li>
    <li><a href="https://zalo.me/<?= dntheme_remove_space($zalo) ?>" rel="nofollow" target="_blank"><i
          class="ticon-zalo-circle2"></i></a></li>
    <li class="phone-mobile">
      <a href="tel:<?php echo dntheme_remove_space($phone) ?>" rel="nofollow" class="button">
        <span class="phone_animation animation-shadow">
          <i class="icon-phone-w" aria-hidden="true"></i>
        </span>
        <span class="btn_phone_txt">Gọi điện</span>
      </a>
    </li>
    <li><a href="<?= $facebook ?>" rel="nofollow" target="_blank"><i class="ticon-messenger"></i></a></li>
    <li>
      <a href="<?= $telegram ?>" target="_blank" data-label="Telegram" rel="noopener noreferrer nofollow" class=""
        aria-label="Follow on Telegram"><i class="ticon-telegram"></i></a>
    </li>

  </ul>
</div>

</div><!-- End wrapper -->


<?php wp_footer(); ?>
</body>

</html>