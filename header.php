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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <?php wp_body_open(); ?>
  <div class="wrapper">
    <div class="header__top text-uppercase">
      <div class="container d-flex">
        <div class="d-flex align-items-center gap-1 gap-xxl-3">
          <div class="header__slogan fw-bold"><?= $slogan ?></div>
          <div class="header__address d-none d-xl-block"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $address_short ?></div>
          <div class="header__phone d-none d-xl-block">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <a href="tel:<?= dntheme_just_number($phone) ?>"><?= $phone ?></a>
            <?php if ($phone2): ?>
              -
              <a href="tel:<?= dntheme_just_number($phone2) ?>"><?= $phone2 ?></a>
            <?php endif; ?>
          </div>
          <?php if ($whatsapp): ?>
            <a href="https://wa.me/<?= $whatsapp ?>" class="header__whatsapp d-none d-xl-block"><span><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp: </span><?= $whatsapp ?></a>
          <?php endif; ?>
        </div>
        <div class="ms-auto d-none d-md-block">
          <div class="social__box -s1 ml-auto">
            <a href="<?= $facebook ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="<?= $instagram ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="<?= $email ?>" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
            <a href="<?= dntheme_remove_space($phone) ?>" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <a href="<?= $youtube ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>

    <header class="header" data-toggle="sticky-onscroll">
      <div class="container">
        <div class="sc__wrap d-flex justify-content-between align-items-center">
          <div class="header__brand">

            <?php
            $logo_img = get_field('logo', 'option');
            if (is_home()): ?>
              <h1 class="logo">
                <a href="<?php echo site_url(); ?>">
                  <?php echo wp_get_attachment_image($logo_img, 'full'); ?>
                </a>
              </h1>
            <?php else: ?>
              <p class="logo">
                <a href="<?php echo site_url(); ?>">
                  <?php echo wp_get_attachment_image($logo_img, 'full'); ?>
                </a>
              </p>
            <?php endif;
            ?>

          </div>
          <!--start main nav-->
          <nav class="main__nav d-flex align-items-center">

            <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'primary',
                'container'       => 'ul',
                'container_class' => '',
                'menu_id'         => '',
                'menu_class'      => 'dn__menu d-none d-xl-flex',
              )
            );
            ?>
            <div class="header__gtranslate">
              <?php echo do_shortcode('[gtranslate]') ?>
            </div>
            <a href="#menu__mobile" class="mburger d-flex d-xl-none ms-3">
              <span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></span>
            </a>
          </nav>
          <!--end main nav-->
        </div>
      </div>
    </header><!--end header-->