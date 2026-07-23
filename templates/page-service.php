<?php

/**
 * Template Name: Page Service
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<?php while (have_posts()):
    the_post(); ?>

    <div class="page-service">
        <main class="site-main" role="main">
            <div class="service-sticky-scene">
                <section class="service-hero">
                    <div class="container">
                        <div class="service-hero__header text-center">
                            <span class="services__subtitle d-inline-flex gap-2 mb-2 justify-content-center">
                                <span class="services__bullet"></span>
                                DỊCH VỤ
                            </span>
                            <h1 class="service-hero__title services__title text-dark mb-4">SKY QUEEN LOGISTICS</h1>
                            <p class="service-hero__lead">Chuyên Nghiệp - Tận Tâm - Tin Cậy - Hiệu Quả</p>
                            <p class="service-hero__description max-width-md mx-auto my-5">Công ty TNHH Giao nhận Sky Queen là nhà cung cấp dịch vụ trong lĩnh vực Logistics với năng lực đáp
                                ứng mọi yêu cầu của khách hàng. Chúng tôi cung cấp dịch vụ các giải pháp trọn gói từ kho người bán
                                cho đến khi hàng hóa tới tay người mua bằng việc thiết lập một chuỗi cung cấp dịch vụ vận chuyển
                                trọn gói door to door tích hợp nhằm tiết kiệm thời gian, chi phí của khách hàng.</p>
                            <a href="#service-contact" class="btn btn-theme">NHẬN TƯ VẤN GIẢI PHÁP
                                <span class="icon-arrow-up-right"></span></a>
                        </div>
                    </div>
                    <div class="service-hero__banner-img-wrap text-center mt-5">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/v2/page-service-hero-earth.png'); ?>" alt="Sky Queen Logistics - Earth Hero" class="service-hero__banner-img service-hero__banner-img--earth img-fluid" />
                    </div>
                    <div class="service-hero__sticky-container-wrap">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/v2/page-service-hero-container.png'); ?>" alt="Sky Queen Logistics - Container Hero" class="service-hero__banner-img service-hero__banner-img--container img-fluid" />
                    </div>
                </section>

                <div class="container-xxl">
                    <?php if (have_rows('items')):
                        $title = get_field('title') ?: 'GIẢI PHÁP LOGISTICS TOÀN CẦU';
                        $subtitle = get_field('subtitle') ?: 'HỆ THỐNG DỊCH VỤ';
                        ?>
                        <div class="services-grid-wrapper position-relative">
                            <!-- SVG overlay for drawing grid lines -->
                            <svg class="services-grid-svg d-none d-md-block"
                                style="position: absolute; top: 0; left: calc(-50vw + 50%); width: 100vw; pointer-events: none; z-index: 2; overflow: visible;"></svg>

                            <div class="services-grid-container">
                                <div class="services-grid-item header-block">
                                    <span class="about-overview__subtitle services__subtitle d-flex gap-2 mb-2">
                                        <span class="services__bullet"></span> <?= esc_html($subtitle) ?>
                                    </span>
                                    <h2 class="about-overview__title services__title text-dark mb-4"><?= esc_html($title) ?></h2>
                                </div>

                                <!-- Repeater Items -->
                                <?php while (have_rows('items')):
                                    the_row();
                                    $title_item = get_sub_field('title');
                                    $link = get_sub_field('link');
                                    $sub_title = get_sub_field('sub_title');
                                    $icon = get_sub_field('icon') ?: 'icon-globe-03';
                                    ?>
                                    <a href="<?= esc_url($link) ?>" class="services-grid-item service-card-v2">
                                        <div class="service-card-v2__icon-wrap">
                                            <span class="<?= esc_attr($icon) ?>"></span>
                                        </div>
                                        <h3 class="service-card-v2__title"><?= esc_html($title_item) ?></h3>
                                        <p class="service-card-v2__desc"><?= esc_html($sub_title) ?></p>
                                    </a>
                                <?php endwhile; ?>

                                <!-- CTA Block -->
                                <a href="#service-contact" class="services-grid-item cta-block">
                                    <div class="cta-content">
                                        <span class="cta-text">NHẬN BÁO GIÁ THEO DỊCH VỤ</span>
                                    </div>
                                    <div class="cta-arrow-btn">
                                        <span class="icon-arrow-up-right"></span>
                                    </div>
                                </a>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cta = document.querySelector('.cta-block');
            if (cta) {
                cta.addEventListener('click', function (e) {
                    const target = document.querySelector('#service-contact');
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }

            // JS Dynamic Grid Line Drawer
            function drawServicesGridLines() {
                const wrapper = document.querySelector('.services-grid-wrapper');
                const svg = document.querySelector('.services-grid-svg');
                if (!wrapper || !svg) return;

                const container = wrapper.querySelector('.services-grid-container');
                const cards = wrapper.querySelectorAll('.services-grid-item');
                if (!cards.length) return;

                const wrapperRect = wrapper.getBoundingClientRect();
                const viewportWidth = window.innerWidth;

                svg.setAttribute('viewBox', `0 0 ${viewportWidth} ${wrapperRect.height}`);
                svg.style.width = `${viewportWidth}px`;
                svg.style.height = `${wrapperRect.height}px`;
                svg.innerHTML = '';

                // Card margin offset (must match CSS margin exactly!)
                const cardMargin = 6;

                const rowsY = new Set();
                const colsX = new Set();
                let maxBottom = 0;

                cards.forEach(card => {
                    const rect = card.getBoundingClientRect();

                    // Y positions of grid lines (outer cell boundaries including margins)
                    const topY = rect.top - wrapperRect.top - cardMargin;
                    const bottomY = rect.bottom - wrapperRect.top + cardMargin;

                    rowsY.add(Math.round(topY));
                    rowsY.add(Math.round(bottomY));

                    if (bottomY > maxBottom) {
                        maxBottom = bottomY;
                    }

                    // X positions of grid lines (outer cell boundaries including margins)
                    colsX.add(Math.round(rect.left - cardMargin));
                    colsX.add(Math.round(rect.right + cardMargin));
                });

                // Add class to container to disable standard CSS borders
                if (container) {
                    container.classList.add('js-grid-drawn');
                }

                const minY = 0;
                const maxY = maxBottom + 60; // Extend vertical lines down below the grid

                function makeLine(x1, y1, x2, y2) {
                    const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                    line.setAttribute('x1', x1);
                    line.setAttribute('y1', y1);
                    line.setAttribute('x2', x2);
                    line.setAttribute('y2', y2);
                    line.setAttribute('stroke', '#CBD5E1');
                    line.setAttribute('stroke-width', '1');
                    return line;
                }

                // Draw horizontal lines spanning the full screen width
                rowsY.forEach(y => {
                    svg.appendChild(makeLine(0, y, viewportWidth, y));
                });

                // Draw vertical lines
                colsX.forEach(x => {
                    svg.appendChild(makeLine(x, minY, x, maxY));
                });
            }

            window.addEventListener('resize', drawServicesGridLines);
            window.addEventListener('load', drawServicesGridLines);
            drawServicesGridLines();
            setTimeout(drawServicesGridLines, 300);
            setTimeout(drawServicesGridLines, 1000); // Secondary run for delayed layouts/fonts
        });
    </script>
<?php endwhile; ?>
<?php get_footer();
