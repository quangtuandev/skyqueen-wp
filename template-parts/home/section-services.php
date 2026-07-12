<?php
/**
 * Template Part: Services
 *
 * Displays the services section with a vertical interactive accordion and left dynamic illustration switcher.
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */

$services = [
    [
        'title' => esc_html__('Đường bộ', 'skyqueen'),
        'index' => '1',
        'icon' => 'icon-truck-01',
        'desc' => esc_html__('Chúng tôi cung cấp Dịch Vụ vận chuyển đường bộ Nội Địa – Quốc Tế.', 'skyqueen'),
        'image' => 'road-transport.png'
    ],
    [
        'title' => esc_html__('Đường thủy', 'skyqueen'),
        'index' => '2',
        'icon' => 'icon-waterway',
        'desc' => esc_html__('Chúng tôi cung cấp Dịch Vụ vận chuyển đường thủy Nội Địa – Quốc Tế.', 'skyqueen'),
        'image' => 'waterway.png'
    ],
    [
        'title' => esc_html__('Đường hàng không', 'skyqueen'),
        'index' => '3',
        'icon' => 'icon-plane',
        'desc' => esc_html__('Chúng tôi cung cấp Dịch Vụ vận chuyển đường hàng không Nội Địa – Quốc Tế.', 'skyqueen'),
        'image' => 'transport.png'
    ],
    [
        'title' => esc_html__('Dịch vụ ủy thác', 'skyqueen'),
        'index' => '4',
        'icon' => 'icon-partner',
        'desc' => esc_html__('Thay mặt Khách Hàng thực hiện các Giao Dịch Thương Mại, thủ tục Xuất Khẩu, Nhập Khẩu hàng hóa.', 'skyqueen'),
        'image' => 'partner.png'
    ],
    [
        'title' => esc_html__('Tìm nhà cung cấp', 'skyqueen'),
        'index' => '5',
        'icon' => 'icon-find-provider',
        'desc' => esc_html__('Chúng tôi cung cấp Dịch Vụ Tìm Nhà Cung Cấp, Nhà Máy, Sản Phẩm theo nhu cầu của Khách Hàng.', 'skyqueen'),
        'image' => 'find-provider.png'
    ],
    [
        'title' => esc_html__('Chuyển phát nhanh quốc tế', 'skyqueen'),
        'index' => '6',
        'icon' => 'icon-packages',
        'desc' => esc_html__('Thay mặt Khách Hàng thực hiện thủ tục Xuất Khẩu, Nhập Khẩu hàng hóa.', 'skyqueen'),
        'image' => 'ship-international.png'
    ],
    [
        'title' => esc_html__('Xin giấy phép - đăng kiểm', 'skyqueen'),
        'index' => '7',
        'icon' => 'icon-certificate',
        'desc' => esc_html__('Cung cấp Dịch Vụ xin Giấy Phép xuất nhập khẩu, Đăng Ký, Đăng Kiểm, Công Bố, Kiểm Dịch.', 'skyqueen'),
        'image' => 'vehicle-inspection-certificate.png'
    ],
    [
        'title' => esc_html__('Khai thuế hải quan', 'skyqueen'),
        'index' => '8',
        'icon' => 'icon-receipt-check',
        'desc' => esc_html__('Chúng tôi thay mặt Khách Hàng thực hiện việc Khai Báo Hải Quan Xuất Khẩu và Nhập Khẩu hàng hóa.', 'skyqueen'),
        'image' => 'tax.png'
    ],
    [
        'title' => esc_html__('Làm chứng nhận FDA hàng thực phẩm', 'skyqueen'),
        'index' => '9',
        'icon' => 'icon-target_Icon',
        'desc' => esc_html__('Hỗ trợ đăng ký FDA thực phẩm trọn gói, giúp hàng hóa thông quan Mỹ nhanh chóng, đúng quy định với chi phí tối ưu nhất.', 'skyqueen'),
        'image' => 'fda.png'
    ]
];

$theme_uri = get_template_directory_uri();
?>

<!-- Pass WordPress directory dynamically to Javascript -->
<script>window.themeUri = "<?php echo esc_js($theme_uri); ?>";</script>

<section class="home-services pt-5 pb-5 position-relative" id="services">
  <div class="container-xxl">
    
    <!-- Section Header (Centered) -->
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center z-1">
        <div class="services__intro-header wow fadeInUp" data-wow-delay="0.1s">
          <span class="services__subtitle text-uppercase mb-2">
            <span class="services__bullet"></span>Dịch vụ
          </span>
          <h2 class="services__title text-dark mb-5">CHUYỂN ĐỘNG LIÊN TỤC, KẾT NỐI TOÀN CẦU</h2>
        </div>
      </div>
    </div>

    <!-- Section Body -->
    <div class="row align-items-stretch">
      
      <!-- Left Column: Dynamic 3D Illustration & Action Button -->
      <div class="col-lg-6 mb-5 mb-lg-0 d-flex flex-column justify-content-between position-relative">
        <div class="services__image-wrapper d-flex align-items-center justify-content-center flex-fill wow fadeInLeft" data-wow-delay="0.2s">
          <!-- Subtle Grid Background -->
          <!-- <img src="<?php echo esc_url($theme_uri . '/assets/v2/services/bg.png'); ?>" class="services__bg-pattern position-absolute" alt="" /> -->
          <!-- Main dynamic 3D Illustration -->
          <img id="service-illustration" src="<?php echo esc_url($theme_uri . '/assets/v2/services/road-transport.png'); ?>" class="services__illustration img-fluid position-relative transition-all" alt="Services" />
        </div>
        
        <!-- Red CTA Button -->
        <div class="text-center text-lg-start mt-4 mx-auto wow fadeInUp" data-wow-delay="0.4s">
          <a href="#" class="btn-consult">
            TÌM HIỂU DỊCH VỤ 
            <i class="icon-arrow-up-right"></i>
          </a>
        </div>
      </div>

      <!-- Right Column: Accordion Items (9 Services Swiper Slider) -->
      <div class="col-lg-6">
        <div class="services-swiper-container position-relative mt-5 wow fadeInRight" data-wow-delay="0.3s">
          
          <!-- Custom Vertical Pagination Bullet List on the left -->
          <div class="swiper-services-pagination"></div>

          <!-- Swiper Container -->
          <div class="swiper swiper-services">
            <div class="swiper-wrapper">
              <?php foreach ($services as $key => $service): 
                $active_class = ($key === 0) ? 'active' : '';
              ?>
                <div class="swiper-slide services-accordion-item <?php echo esc_attr($active_class); ?>" data-image="<?php echo esc_attr($service['image']); ?>" data-index="<?php echo $key; ?>">
                  <div class="services-accordion-header d-flex align-items-center justify-content-between">
                    <div class="services-accordion-title-wrap d-flex align-items-center">
                      <!-- Custom Icon -->
                      <span class="services-accordion-icon me-3">
                        <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                      </span>
                      <!-- Title & Index Number -->
                      <h3 class="services-accordion-title mb-0">
                        <?php echo esc_html($service['title']); ?>
                        <span class="services-accordion-index">[<span class="num"><?php echo esc_html($service['index']); ?></span>]</span>
                      </h3>
                    </div>
                    <!-- Right Indicator Arrow -->
                    <span class="services-accordion-arrow">
                      <i class="icon-arrow-up-right"></i>
                    </span>
                  </div>
                  
                  <!-- Accordion Body Description -->
                  <div class="services-accordion-body">
                    <p class="services-accordion-desc mb-0"><?php echo esc_html($service['desc']); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
