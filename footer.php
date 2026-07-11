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
?>

<footer class="footer">
  <div class="container position-relative">
    <div class="sc__wrap">
      <aside class="widget-area widget__left widget__fix">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <?php dynamic_sidebar('footer'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <?php dynamic_sidebar('footer2'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <?php dynamic_sidebar('footer3'); ?>
            </div>
          </div>
        </div>
      </aside><!-- #secondary -->
    </div>
  </div>
</footer>

<div class="copyright text-center">
  <div class="container"><?php the_field('copyright', 'option'); ?></div>
</div>

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
      'theme_location'  => 'primary',
      'container_class' => 'nav__mobile__menu',
      'menu_class'      => 'nav__mobile--ul',
    )
  );
  ?>
</nav>

<div class="giuseart-nav">
  <ul>
    <li><a href="<?= $link_map ?>" rel="nofollow" target="_blank"><i class="ticon-heart"></i>Tìm đường</a></li>
    <li><a href="https://zalo.me/<?= dntheme_remove_space($zalo) ?>" rel="nofollow" target="_blank"><i class="ticon-zalo-circle2"></i>Chat Zalo</a></li>
    <li class="phone-mobile">
      <a href="tel:<?php echo dntheme_remove_space($phone) ?>" rel="nofollow" class="button">
        <span class="phone_animation animation-shadow">
          <i class="icon-phone-w" aria-hidden="true"></i>
        </span>
        <span class="btn_phone_txt">Gọi điện</span>
      </a>
    </li>
    <li><a href="<?= $facebook ?>" rel="nofollow" target="_blank"><i class="ticon-messenger"></i>Messenger</a></li>
    <li><a href="sms:<?= dntheme_remove_space(dntheme_remove_space($phone)) ?>" class="chat_animation">
        <i class="ticon-chat-sms" aria-hidden="true" title="Nhắn tin sms"></i>
        Nhắn tin SMS</a>
    </li>
    <li>
      <a href="<?= $telegram ?>" target="_blank" data-label="Telegram" rel="noopener noreferrer nofollow" class="" aria-label="Follow on Telegram"><i class="ticon-telegram ticon-messenger"></i></a>
    </li>

  </ul>
</div>

</div><!-- End wrapper -->


<?php wp_footer(); ?>
</body>

</html>