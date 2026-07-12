<?php
/**
 * Template Part: CTA Contact
 *
 * Displays the contact form call-to-action section with video background,
 * dynamic SVG alignment grid, and glassmorphic contact form.
 * Uses Contact Form 7 shortcode.
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */
?>

<section class="home-contact position-relative py-5 mt-4 mb-4" id="homeContactSection" style="min-height: 580px;">
  
  <!-- 1. Video Background -->
  <video autoplay loop muted playsinline class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover z-0">
    <source src="<?= get_theme_file_uri('assets/home/optimized_0703.mp4') ?>" type="video/mp4">
  </video>

  <!-- Lớp phủ tối mờ tăng tương phản (Overlay) -->
  <!-- <div class="position-absolute top-0 start-0 w-100 h-100 bg-overlay" style="background: rgba(18, 53, 91, 0.25); z-index: 1; pointer-events: none;"></div> -->
  
  <!-- 2. SVG Grid Overlay (vẽ động bằng JS) -->
  <svg class="home-contact__grid-svg d-none d-md-block" id="contactGridOverlay"></svg>

  <!-- 3. Nội dung chính -->
  <div class="container-xxl position-relative z-3 h-100 py-3 py-lg-5">
    <div class="row align-items-stretch justify-content-between h-100 min-vh-50">
      
      <!-- Khung Form liên hệ kính mờ (Left Side) -->
      <div class="col-lg-5 col-md-7 d-flex align-items-center wow fadeInLeft" data-wow-delay="0.2s">
        <div class="box-contact-v2 w-100 p-4 p-md-5" data-grid>
          <div class="box-contact-v2__header mb-4">
            <div class="contact-subtitle text-uppercase d-flex align-items-center gap-2 mb-2">
              <span class="section-subtitle-bullet"></span> Liên hệ
            </div>
            <h3 class="contact-title text-white fw-bold m-0">TƯ VẤN MIỄN PHÍ NGAY</h3>
          </div>
          
          <div class="box-contact-v2__form">
            <?php echo do_shortcode('[contact-form-7 id="053e9b2" title="Form gửi câu hỏi"]') ?>
          </div>
        </div>
      </div>
      
      <!-- Thẻ thông tin thương hiệu (Right Side Bottom) -->
      <div class="col-lg-4 col-md-5 d-flex align-items-end justify-content-end mt-4 mt-md-0 wow fadeInRight" data-wow-delay="0.4s">
        <div class="skyqueen-info-card bg-white p-3 shadow-sm text-start position-relative overflow-hidden" data-grid="right bottom">
          <span class="dotconfig dotconfig__top-right"></span>
          <span class="dotconfig dotconfig__bottom-left"></span>
          <h4 class="card-title fw-bold mb-1">SKY QUEEN</h4>
          <p class="card-subtitle text-muted small mb-0">Chuyên Nghiệp - Tận Tâm - Tin Cậy - Hiệu Quả</p>
        </div>
      </div>
      
    </div>
  </div>
</section>

<script>
/**
 * Dynamic Alignment Grid for Contact Section
 * 
 * Nguyên lý (giống html.html):
 * 1. Lấy getBoundingClientRect() của các element đánh dấu [data-grid] trong section.
 * 2. Vẽ đường ngang qua top & bottom, đường dọc qua left & right,
 *    kéo dài hết chiều rộng/cao của section — giống "smart guide" trong Figma.
 * 3. Tại các điểm giao nhau, vẽ ô vuông nhỏ (marker).
 * 4. Dùng SVG vì vẽ line/rect chính xác theo toạ độ px và không ảnh hưởng layout.
 */
(function() {
  function drawContactGrid() {
    var stage = document.getElementById('homeContactSection');
    var svg   = document.getElementById('contactGridOverlay');
    if (!stage || !svg) return;

    var stageRect = stage.getBoundingClientRect();
    svg.setAttribute('viewBox', '0 0 ' + stageRect.width + ' ' + stageRect.height);
    svg.innerHTML = '';

    var xs = [];
    var ys = [];

    // Thu thập toạ độ từ các phần tử [data-grid] trong section
    // data-grid="" (rỗng) => vẽ cả 4 cạnh (left, right, top, bottom)
    // data-grid="right bottom" => chỉ vẽ cạnh right và bottom
    var gridEls = stage.querySelectorAll('[data-grid]');
    gridEls.forEach(function(el) {
      var r = el.getBoundingClientRect();
      var edges = el.getAttribute('data-grid').trim();
      // Nếu rỗng => vẽ tất cả, nếu có giá trị => chỉ vẽ các cạnh được liệt kê
      var drawAll = edges === '';
      var edgeList = edges.split(/\s+/);

      var left   = r.left   - stageRect.left;
      var right  = r.right  - stageRect.left;
      var top    = r.top    - stageRect.top;
      var bottom = r.bottom - stageRect.top;

      if ((drawAll || edgeList.indexOf('left')   !== -1) && xs.indexOf(left)   === -1) xs.push(left);
      if ((drawAll || edgeList.indexOf('right')  !== -1) && xs.indexOf(right)  === -1) xs.push(right);
      if ((drawAll || edgeList.indexOf('top')    !== -1) && ys.indexOf(top)    === -1) ys.push(top);
      if ((drawAll || edgeList.indexOf('bottom') !== -1) && ys.indexOf(bottom) === -1) ys.push(bottom);
    });

    // Vẽ đường dọc
    xs.forEach(function(x) {
      svg.appendChild(makeLine(x, 0, x, stageRect.height));
    });

    // Vẽ đường ngang
    ys.forEach(function(y) {
      svg.appendChild(makeLine(0, y, stageRect.width, y));
    });

    // Vẽ marker vuông chỉ tại góc top-right và bottom-left của mỗi element
    // Bỏ qua các element có data-grid chỉ định cạnh cụ thể (không rỗng)
    gridEls.forEach(function(el) {
      var edges = el.getAttribute('data-grid').trim();
      if (edges !== '') return; // không vẽ dot cho element có data-grid chỉ định cạnh

      var r = el.getBoundingClientRect();
      var left   = r.left   - stageRect.left;
      var right  = r.right  - stageRect.left;
      var top    = r.top    - stageRect.top;
      var bottom = r.bottom - stageRect.top;

      svg.appendChild(makeDot(right, top, 'top-right'));    // góc trên-phải
      svg.appendChild(makeDot(left, bottom, 'bottom-left'));  // góc dưới-trái
    });
  }

  function makeLine(x1, y1, x2, y2) {
    var line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
    line.setAttribute('x1', x1);
    line.setAttribute('y1', y1);
    line.setAttribute('x2', x2);
    line.setAttribute('y2', y2);
    line.setAttribute('stroke', 'rgba(255,255,255,0.35)');
    line.setAttribute('stroke-width', '1');
    return line;
  }

  function makeDot(x, y, dotPosition = 'top-left') {
    var size = 12;
    var rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
    if (dotPosition === 'top-right') {
      rect.setAttribute('x', x);
      rect.setAttribute('y', y - size);
    } else if (dotPosition === 'bottom-left') {
      rect.setAttribute('x', x - size);
      rect.setAttribute('y', y);
    }
    rect.setAttribute('width', size);
    rect.setAttribute('height', size);
    rect.setAttribute('fill', '#7AA6E5');
    return rect;
  }

  window.addEventListener('load', drawContactGrid);
  window.addEventListener('resize', drawContactGrid);
})();
</script>
