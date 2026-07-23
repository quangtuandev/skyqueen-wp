<?php
/**
 * Template Part: About Us Business Fields
 *
 * Displays the list of service fields/sectors and a visual side banner image.
 *
 * @package    skyqueen
 * @subpackage template-parts/about-us
 * @version 1.0
 */

$business_image_id = get_field('business_image');
$business_image_url = $business_image_id ? wp_get_attachment_image_url($business_image_id, 'full') : get_template_directory_uri() . '/assets/v2/about-us/services-1.jpg';

// We can support dynamic repeater fields if they are set up in the backend
$custom_fields = get_field('business_fields');

$services_data = [];
if ($custom_fields && is_array($custom_fields)) {
  foreach ($custom_fields as $index => $field) {
    $idx = $index + 1;
    $services_data[] = [
      'title' => $field['title'],
      'index' => (string) $idx,
      'icon' => $field['icon'] ?: 'icon-check-done',
      'desc' => $field['desc'] ?: '',
      'image' => $field['image'] ?: 'services-' . ($idx > 7 ? 1 : $idx) . '.jpg',
      'folder' => 'about-us'
    ];
  }
} else {
  // Default static list mapping to the 7 services requested by the user
  $services_data = [
    [
      'title' => esc_html__('Dịch vụ khai thuê hải quan', 'skyqueen'),
      'index' => '1',
      'icon' => ' icon-coins-stacked',
      'image' => 'services-1.jpg',
      'folder' => 'about-us'
    ],
    [
      'title' => esc_html__('Giao nhận hàng hóa tại nước ngoài (door to door)', 'skyqueen'),
      'index' => '2',
      'icon' => 'icon-route',
      'image' => 'services-2.jpg',
      'folder' => 'about-us'
    ],
    [
      'title' => esc_html__('Vận chuyển quốc tế', 'skyqueen'),
      'index' => '3',
      'icon' => 'icon-globe-05',
      'image' => 'services-3.jpg',
      'folder' => 'about-us'
    ],
    [
      'title' => esc_html__('Vận chuyển nội địa', 'skyqueen'),
      'index' => '4',
      'icon' => 'icon-globe-04',
      'image' => 'services-4.jpg',
      'folder' => 'about-us'
    ],
    [
      'title' => esc_html__('Ủy thác xuất nhập khẩu', 'skyqueen'),
      'index' => '5',
      'icon' => 'icon-partner',
      'image' => 'services-5.jpg',
      'folder' => 'about-us'
    ],
    [
      'title' => esc_html__('Các thủ tục pháp lý khác liên quan đến việc thông quan', 'skyqueen'),
      'index' => '6',
      'icon' => 'icon-check-done',
      'image' => 'services-6.jpg',
      'folder' => 'about-us'
    ],
    [
      'title' => esc_html__('Gửi hàng cá nhân', 'skyqueen'),
      'index' => '7',
      'icon' => 'icon-luggage',
      'image' => 'services-7.jpg',
      'folder' => 'about-us'
    ]
  ];
}

$theme_uri = get_template_directory_uri();
?>

<!-- Pass WordPress directory dynamically to Javascript -->
<script>window.themeUri = "<?php echo esc_js($theme_uri); ?>";</script>

<section class="about-fields pt-5 pb-5 about-us-bg z-3 position-relative" id="about-services">
  <div class="container-xxl">
    <div class="section-header mb-5  wow fadeInUp" data-wow-delay="0.1s">
      <h2 class="section-title">NGÀNH NGHỀ KINH DOANH</h2>
    </div>

    <!-- Section Body -->
    <div class="row align-items-stretch justify-content-between">

      <!-- Left Column: Dynamic Illustration -->

      <div class="col-lg-5">
        <div class="services-swiper-container position-relative ps-0 pe-2 wow fadeInLeft" data-wow-delay="0.3s">
          <!-- Swiper Container -->
          <div class="swiper swiper-services">
            <div class="swiper-wrapper">
              <?php foreach ($services_data as $key => $service):
                $active_class = ($key === 0) ? 'active' : '';
                ?>
                <div class="swiper-slide services-accordion-item <?php echo esc_attr($active_class); ?>"
                  data-image="<?php echo esc_attr($service['image']); ?>"
                  data-folder="<?php echo esc_attr($service['folder']); ?>" data-index="<?php echo $key; ?>">
                  <div class="services-accordion-header d-flex align-items-center justify-content-between">
                    <div class="services-accordion-title-wrap d-flex align-items-center">
                      <!-- Custom Icon -->
                      <span class="services-accordion-icon me-3">
                        <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                      </span>
                      <!-- Title & Index Number -->
                      <h3 class="services-accordion-title mb-0">
                        <?php echo esc_html($service['title']); ?>
                        <span class="services-accordion-index">[<span
                            class="num"><?php echo esc_html($service['index']); ?></span>]</span>
                      </h3>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Custom Vertical Pagination Bullet List on the left -->
          <div class="swiper-services-pagination start-100 ms-4"></div>
        </div>
      </div>
      <!-- Right Column: Accordion Items  -->

      <div class="col-lg-6 mb-5 mb-lg-0 d-flex flex-column justify-content-between position-relative">
        <div class="services__image-wrapper d-flex justify-content-center flex-fill wow fadeInRight"
          data-wow-delay="0.2s">
          <img id="service-illustration"
            src="<?php echo esc_url($theme_uri . '/assets/v2/about-us/' . $services_data[0]['image']); ?>"
            class="services__illustration img-fluid position-relative transition-all mh-100 object-fit-cover"
            alt="Business Fields" />
        </div>
      </div>

    </div>
  </div>
</section>