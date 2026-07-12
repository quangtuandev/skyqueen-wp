<?php
/**
 * Template Part: Global Network
 *
 * Displays the "Chuyển động liên tục, kết nối toàn cầu" section
 * with world map background, content, and list.
 * ACF Fields: gt2_image (image ID), gt2_content (wysiwyg), gt3_items (repeater)
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */

$gt2_image = get_field('gt2_image');
$gt2_content = get_field('gt2_content');
?>

<section class="home-global-network pt-5 pb-5 position-relative" style="background: url('<?= get_theme_file_uri('assets/img/bg-map.png') ?>') no-repeat center center / contain;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="network__image position-relative">
          <?php
          if ($gt2_image) {
            echo wp_get_attachment_image($gt2_image, 'full', false, ['class' => 'img-fluid']);
          } else {
            echo '<div class="text-center p-5 bg-light rounded"><i class="fa fa-globe fa-5x text-muted"></i></div>';
          }
          ?>
        </div>
      </div>
      <div class="col-lg-7 ps-lg-5">
        <div class="network__content">
          <span class="section-subtitle fw-bold text-uppercase d-block mb-2" style="color: #073767; letter-spacing: 1px;">Mạng lưới</span>
          <h2 class="section-title fw-bold mb-4" style="color: #333; font-size: 2rem;">CHUYỂN ĐỘNG LIÊN TỤC,<br>KẾT NỐI TOÀN CẦU</h2>
          
          <?php if ($gt2_content): ?>
            <div class="network__desc text-muted mb-4">
              <?= wp_kses_post($gt2_content) ?>
            </div>
          <?php endif; ?>

          <?php if (have_rows('gt3_items')): $i = 0; ?>
            <div class="network__list mt-4">
              <?php while (have_rows('gt3_items')) : the_row();
                $i++;
                $title = get_sub_field('title');
                $content = get_sub_field('content');
              ?>
                <div class="network-item d-flex mb-3 p-3 bg-white rounded shadow-sm border-start border-4 border-danger transition-all">
                  <div class="network-item__number fw-bold text-danger me-3" style="font-size: 1.5rem;">
                    <?= sprintf('%02d', $i) ?>.
                  </div>
                  <div class="network-item__body">
                    <h5 class="network-item__title fw-bold mb-1" style="color: #073767;"><?= esc_html($title) ?></h5>
                    <?php if ($content): ?>
                      <div class="network-item__content text-muted small mt-2">
                        <?= wp_kses_post($content) ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
