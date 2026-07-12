<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$facebook = get_field('facebook', 'option');
$instagram = get_field('instagram', 'option');
$email = get_field('email', 'option');
$youtube = get_field('youtube', 'option');
$logo = get_field('logo', 'option');
$phone = get_field('phone', 'option');
$phone2 = get_field('phone2', 'option');
$whatsapp = get_field('whatsapp', 'option');
$slogan = get_field('slogan', 'option');
$address_short = get_field('address_short', 'option');
$logo_white = get_field('logo_white', 'option');
$logo_black = get_field('logo_black', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">

</head>

<body <?php body_class('background-main'); ?>>
  <div id="fb-root"></div>
  <?php wp_body_open(); ?>
  <div class="wrapper">
    <div class="site-header-group">
      <div class="header__top mb-3">
        <div class="mx-4 d-flex">
          <div class="d-flex align-items-center gap-1 gap-xxl-3">
            <div class="header__slogan fw-bold"><?= $slogan ?></div>
            <div class="header__address d-none d-xl-block"><i class="fa fa-map-marker" aria-hidden="true"></i>
              <?= $address_short ?></div>
            <div class="header__phone d-none d-xl-block">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <a href="tel:<?= dntheme_just_number($phone) ?>"><?= $phone ?></a>
              <?php if ($phone2): ?>
                -
                <a href="tel:<?= dntheme_just_number($phone2) ?>"><?= $phone2 ?></a>
              <?php endif; ?>
            </div>
            <?php if ($whatsapp): ?>
              <a href="https://wa.me/<?= $whatsapp ?>" class="header__whatsapp d-none d-xl-block"><span><i
                    class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp: </span><?= $whatsapp ?></a>
            <?php endif; ?>
          </div>
          <div class="ms-auto d-none d-md-block">
            <div class="social__box -s1 ml-auto">
              <a href="<?= $facebook ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
              <a href="<?= $instagram ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="<?= $email ?>" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
              <a href="<?= dntheme_remove_space($phone) ?>" target="_blank"><i class="fa fa-phone"
                  aria-hidden="true"></i></a>
              <a href="<?= $youtube ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>

      <header class="header container mx-auto px-0" data-toggle="sticky-onscroll">
        <div class="sc__wrap d-flex justify-content-between align-items-stretch">
          <!--start main nav-->
          <nav class="main__nav d-flex align-items-center">
            <div class="header__brand h-100">
              <?php
              $logo_white_html = '';
              if ($logo_white) {
                $logo_white_html = wp_get_attachment_image($logo_white, 'full', false, array('class' => 'logo-white'));
              } else {
                $logo_white_html = '<img src="' . esc_url(get_template_directory_uri() . '/assets/v2/logo-white.png') . '" class="logo-white" alt="' . esc_attr(get_bloginfo('name')) . '">';
              }

              $logo_black_html = '';
              if ($logo_black) {
                $logo_black_html = wp_get_attachment_image($logo_black, 'full', false, array('class' => 'logo-black'));
              } else {
                $logo_black_html = '<img src="' . esc_url(get_template_directory_uri() . '/assets/v2/logo.png') . '" class="logo-black" alt="' . esc_attr(get_bloginfo('name')) . '">';
              }

              if (is_home()): ?>
                <h1 class="logo">
                  <a href="<?php echo site_url(); ?>">
                    <?php
                    echo $logo_white_html;
                    echo $logo_black_html;
                    ?>
                  </a>
                </h1>
              <?php else: ?>
                <p class="logo">
                  <a href="<?php echo site_url(); ?>">
                    <?php
                    echo $logo_white_html;
                    echo $logo_black_html;
                    ?>
                  </a>
                </p>
              <?php endif;
              ?>

            </div>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'primary',
                'container' => 'ul',
                'container_class' => '',
                'menu_id' => '',
                'menu_class' => 'dn__menu d-none d-xl-flex h-100',
              )
            );
            ?>
            <div class="menu-search-item">
              <div class="header__search--click">
                <div class="search__btn"><i class="fa fa-search" aria-hidden="true"></i></div>
                <div class="header__search-content">
                  <form role="search" method="get" class="search__form" action="/">
                    <input type="search" class="search-field" placeholder="Nhập từ khóa cần tìm …" value="" name="s"
                      autocomplete="new-password">
                    <button class="search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="header__gtranslate">
              <?php echo do_shortcode('[gtranslate]') ?>
            </div>
            <a href="#menu__mobile" class="mburger d-flex d-xl-none ms-3">
              <span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></span>
            </a>
          </nav>
          <!--end main nav-->
        </div>
      </header><!--end header-->
    </div>