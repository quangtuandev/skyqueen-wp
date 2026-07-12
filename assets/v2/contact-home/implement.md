# Hướng dẫn chi tiết implement phần Contact Home (Liên hệ)

Dựa theo thiết kế trong file [layout.png](file:///Users/duanyu-fs/space/phucanh/wp/sky-v2/wp-content/themes/skyqueen/assets/v2/contact-home/layout.png), yêu cầu sử dụng video background [optimized_0703.mp4](file:///Users/duanyu-fs/space/phucanh/wp/sky-v2/wp-content/themes/skyqueen/assets/home/optimized_0703.mp4), và thiết kế form theo kiểu **Material Design (Floating Labels)**, phần này (CTA Contact) bao gồm:
1. **Video background** chạy lặp lại mượt mà phía dưới.
2. **Khung lưới vẽ bằng CSS** (đường kẻ ngang/dọc và nút vuông giao cắt) phủ lên trên video.
3. **Form liên hệ kính mờ** (glassmorphic) ở bên trái với thiết kế **Material Floating Labels** (nhãn tự động bay lên khi nhập/focus).
4. **Thẻ thương hiệu** ở góc dưới bên phải.

Dưới đây là mã nguồn và các bước chi tiết để cài đặt.

---

## 1. Cấu hình Contact Form 7 (CF7)

Truy cập trang Quản trị WordPress -> **Form liên hệ** -> Tìm form **"Form gửi câu hỏi"** (ID: `053e9b2`) và cập nhật cấu trúc Form HTML như sau:

```html
<div class="row g-4 contact-form-row">
  <!-- Họ và tên -->
  <div class="col-md-6">
    <div class="input-icon-group material-input-group">
      <span class="input-icon"><i class="icon-user-01"></i></span>
      [text* your-name class:form-control placeholder " "]
      <label class="material-label">Họ và tên</label>
    </div>
  </div>
  
  <!-- Số điện thoại -->
  <div class="col-md-6">
    <div class="input-icon-group material-input-group">
      <span class="input-icon"><i class="icon-phone-02"></i></span>
      [tel* your-phone class:form-control placeholder " "]
      <label class="material-label">Số điện thoại</label>
    </div>
  </div>
  
  <!-- Email -->
  <div class="col-12">
    <div class="input-icon-group material-input-group">
      <span class="input-icon"><i class="icon-envelope"></i></span>
      [email* your-email class:form-control placeholder " "]
      <label class="material-label">Email</label>
    </div>
  </div>
  
  <!-- Nội dung -->
  <div class="col-12">
    <div class="input-icon-group material-input-group">
      <span class="input-icon"><i class="icon-edit"></i></span>
      [textarea* your-message x4 class:form-control placeholder " "]
      <label class="material-label">Nội dung</label>
    </div>
    <!-- Hiển thị đếm số ký tự (Ví dụ: 0/30) -->
    <div class="d-flex justify-content-between text-white-50 small mt-1 textarea-counter">
      <span>0/30</span>
    </div>
  </div>
  
  <!-- Nút gửi -->
  <div class="col-12">
    <button type="submit" class="btn btn-submit-contact text-uppercase w-100">
      Gửi ngay <i class="icon-arrow-up-right ms-1"></i>
    </button>
  </div>
</div>
```

*Lưu ý: Placeholder đặt là `" "` (khoảng trắng đơn) để tận dụng bộ chọn `:placeholder-shown` trong CSS làm hiệu ứng float nhãn.*

---

## 2. Cấu trúc File PHP (`template-parts/home/section-cta-contact.php`)

Cập nhật lại nội dung file [section-cta-contact.php](file:///Users/duanyu-fs/space/phucanh/wp/sky-v2/wp-content/themes/skyqueen/template-parts/home/section-cta-contact.php) với cấu trúc chứa **Video Background** và **Grid Overlay**:

```php
<?php
/**
 * Template Part: CTA Contact
 *
 * Displays the contact form call-to-action section.
 * Uses Contact Form 7 shortcode.
 *
 * @package    skyqueen
 * @subpackage template-parts/home
 */
?>

<section class="home-contact position-relative py-5 mt-4 mb-4" style="min-height: 580px;">
  
  <!-- 1. Video Background -->
  <video autoplay loop muted playsinline class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover z-0">
    <source src="<?= get_theme_file_uri('assets/home/optimized_0703.mp4') ?>" type="video/mp4">
  </video>

  <!-- Lớp phủ tối mờ tăng tương phản (Overlay) -->
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-overlay" style="background: rgba(18, 53, 91, 0.25); z-index: 1; pointer-events: none;"></div>
  
  <!-- 2. Khung lưới Grid Overlay (Các đường kẻ & Nút vuông giao cắt) -->
  <div class="home-contact__grid d-none d-md-block">
    <!-- Các đường dọc (V-lines) -->
    <div class="home-contact__grid-line-v" style="left: 3%;"></div>
    <div class="home-contact__grid-line-v" style="left: 38%;"></div>
    <div class="home-contact__grid-line-v" style="left: 70%;"></div>
    <div class="home-contact__grid-line-v" style="left: 96%;"></div>

    <!-- Các đường ngang (H-lines) -->
    <div class="home-contact__grid-line-h" style="top: 12%;"></div>
    <div class="home-contact__grid-line-h" style="bottom: 12%;"></div>

    <!-- Các điểm giao cắt (Square Intersection Dots) -->
    <div class="home-contact__grid-dot" style="top: 12%; left: 3%;"></div>
    <div class="home-contact__grid-dot" style="top: 12%; left: 38%;"></div>
    <div class="home-contact__grid-dot" style="top: 12%; left: 70%;"></div>
    <div class="home-contact__grid-dot" style="top: 12%; left: 96%;"></div>
    
    <div class="home-contact__grid-dot" style="bottom: 12%; left: 3%;"></div>
    <div class="home-contact__grid-dot" style="bottom: 12%; left: 38%;"></div>
    <div class="home-contact__grid-dot" style="bottom: 12%; left: 70%;"></div>
    <div class="home-contact__grid-dot" style="bottom: 12%; left: 96%;"></div>
  </div>

  <!-- 3. Nội dung chính -->
  <div class="container position-relative z-3 h-100 py-3 py-lg-5">
    <div class="row align-items-stretch justify-content-between h-100 min-vh-50">
      
      <!-- Khung Form liên hệ kính mờ (Left Side) -->
      <div class="col-lg-5 col-md-7 d-flex align-items-center">
        <div class="box-contact-v2 w-100 p-4 p-md-5">
          <div class="box-contact-v2__header mb-4">
            <div class="contact-subtitle text-uppercase d-flex align-items-center gap-2 mb-2">
              <span class="square-dot"></span> Liên hệ
            </div>
            <h3 class="contact-title text-white fw-bold m-0">TƯ VẤN MIỄN PHÍ NGAY</h3>
          </div>
          
          <div class="box-contact-v2__form">
            <?php echo do_shortcode('[contact-form-7 id="053e9b2" title="Form gửi câu hỏi"]') ?>
          </div>
        </div>
      </div>
      
      <!-- Thẻ thông tin thương hiệu (Right Side Bottom) -->
      <div class="col-lg-4 col-md-5 d-flex align-items-end justify-content-end mt-4 mt-md-0">
        <div class="skyqueen-info-card bg-white p-3 shadow-sm text-start position-relative">
          <h4 class="card-title fw-bold mb-1">SKY QUEEN</h4>
          <p class="card-subtitle text-muted small mb-0">Chuyên Nghiệp - Tận Tâm - Tin Cậy - Hiệu Quả</p>
        </div>
      </div>
      
    </div>
  </div>
</section>
```

---

## 3. Cập nhật CSS Styles (`style.css`)

Thêm đoạn CSS sau vào file [style.css](file:///Users/duanyu-fs/space/phucanh/wp/sky-v2/wp-content/themes/skyqueen/style.css) để xử lý video background, đường kẻ lưới và giao diện form kiểu Material Design:

```css
/* ==========================================================================
   Section Contact Home v2 Layout (Video Background & Grid Overlay)
   ========================================================================== */

/* Section wrapper */
.home-contact {
  position: relative;
  display: flex;
  align-items: center;
  overflow: hidden;
}

/* CSS cho Video Background */
.home-contact video {
  pointer-events: none; /* Tránh click đè lên video */
  filter: brightness(0.9); /* Giảm độ sáng nhẹ để nổi form */
}

/* --- Khung lưới Grid Overlay --- */
.home-contact__grid {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 2;
}

/* Đường kẻ dọc */
.home-contact__grid-line-v {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 1px;
  background-color: rgba(255, 255, 255, 0.15); /* Màu trắng mờ tinh tế */
}

/* Đường kẻ ngang */
.home-contact__grid-line-h {
  position: absolute;
  left: 0;
  right: 0;
  height: 1px;
  background-color: rgba(255, 255, 255, 0.15);
}

/* Điểm giao cắt (nút vuông màu trắng xám nhỏ) */
.home-contact__grid-dot {
  position: absolute;
  width: 8px;
  height: 8px;
  background-color: #d1d5db; /* Màu xám sáng */
  border: 1px solid rgba(255, 255, 255, 0.8);
  transform: translate(-50%, -50%); /* Căn giữa điểm giao */
}

/* --- Glassmorphism Box --- */
.box-contact-v2 {
  background: rgba(18, 71, 131, 0.65); /* Màu xanh biển đậm bán trong suốt */
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.15);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
  border-radius: 0px; /* Thiết kế phẳng góc vuông */
  color: #ffffff;
}

/* Subtitle "LIÊN HỆ" với chấm vuông màu xanh tím */
.box-contact-v2__header .contact-subtitle {
  font-size: 13px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.85);
  letter-spacing: 2px;
}

.box-contact-v2__header .square-dot {
  display: inline-block;
  width: 8px;
  height: 8px;
  background-color: #5b75ff; /* Màu xanh/tím đặc trưng */
}

/* Tiêu đề chính */
.box-contact-v2__header .contact-title {
  font-size: 32px;
  line-height: 1.2;
  letter-spacing: 0.5px;
  font-family: 'Roboto', 'Inter', sans-serif;
}

/* --- Material Design Floating Labels --- */
.material-input-group {
  position: relative;
  width: 100%;
}

/* Icon phía trước input */
.material-input-group .input-icon {
  position: absolute;
  left: 0;
  bottom: 10px; /* Căn chỉnh theo viền gạch dưới */
  font-size: 16px;
  color: rgba(255, 255, 255, 0.6);
  pointer-events: none;
  transition: color 0.3s ease;
  z-index: 2;
}

/* Định dạng Input & Textarea của CF7 */
.box-contact-v2__form .wpcf7-form-control {
  width: 100%;
  background: transparent !important;
  border: none !important;
  border-bottom: 1px solid rgba(255, 255, 255, 0.3) !important;
  border-radius: 0 !important;
  box-shadow: none !important;
  color: #ffffff !important;
  padding: 10px 0 10px 28px !important; /* Lùi 28px để chừa không gian cho icon */
  font-size: 15px;
  outline: none !important;
  position: relative;
  z-index: 1;
  transition: border-color 0.3s ease;
}

/* Focus input */
.box-contact-v2__form .wpcf7-form-control:focus {
  border-bottom: 1px solid #ffffff !important;
}

/* Đổi màu icon khi focus */
.material-input-group:focus-within .input-icon {
  color: #ffffff;
}

/* Nhãn Material Label */
.material-input-group .material-label {
  position: absolute;
  left: 28px; /* Thụt lề thẳng với chữ nhập vào */
  bottom: 10px;
  font-size: 15px;
  color: rgba(255, 255, 255, 0.7);
  pointer-events: none;
  z-index: 2;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Hiệu ứng Nhãn bay lên khi Focus hoặc khi Input có giá trị (Sử dụng CSS :has() hiện đại) */
.material-input-group:focus-within .material-label,
.material-input-group:has(.wpcf7-form-control:not(:placeholder-shown)) .material-label {
  bottom: 36px;
  left: 0px; /* Di chuyển nhãn ra sát lề trái phía trên */
  font-size: 12px;
  color: rgba(255, 255, 255, 0.95);
  font-weight: 500;
}

/* Textarea độ cao */
.box-contact-v2__form textarea.wpcf7-form-control {
  height: 90px;
  resize: vertical;
  min-height: 60px;
}

/* Đẩy nhãn của textarea lên cao hơn nữa để không bị đè */
.material-input-group:focus-within .material-label,
.material-input-group:has(textarea.wpcf7-form-control:not(:placeholder-shown)) .material-label {
  bottom: 96px;
}

/* Trình đếm kí tự */
.textarea-counter {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.5);
  margin-top: 4px;
}

/* Nút Submit đỏ */
.btn-submit-contact {
  background-color: #e83e42 !important;
  color: #ffffff !important;
  border: none !important;
  border-radius: 0 !important;
  font-weight: 700;
  padding: 14px 20px !important;
  font-size: 16px;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.btn-submit-contact:hover {
  background-color: #d12e32 !important;
  box-shadow: 0 8px 20px rgba(232, 62, 66, 0.35);
  transform: translateY(-2px);
}

/* Thẻ thông tin thương hiệu */
.skyqueen-info-card {
  background-color: #ffffff;
  padding: 15px 25px !important;
  border: 1px solid rgba(0, 0, 0, 0.05);
  min-width: 280px;
  z-index: 10;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

.skyqueen-info-card .card-title {
  color: #0b5394;
  font-size: 16px;
  letter-spacing: 1.5px;
}

.skyqueen-info-card .card-subtitle {
  font-size: 12px;
  color: #666666;
  font-weight: 500;
}

/* Chấm trang trí góc của Thẻ thương hiệu */
.skyqueen-info-card::before,
.skyqueen-info-card::after {
  content: '';
  position: absolute;
  width: 6px;
  height: 6px;
  background-color: #0b5394;
}

.skyqueen-info-card::before {
  top: 0;
  right: 0;
  transform: translate(50%, -50%);
}

.skyqueen-info-card::after {
  bottom: 0;
  left: 0;
  transform: translate(-50%, 50%);
}

/* ==========================================================================
   Responsive
   ========================================================================== */
@media (max-width: 991.98px) {
  .home-contact {
    min-height: auto !important;
    padding: 60px 0;
  }
  .box-contact-v2__header .contact-title {
    font-size: 26px;
  }
  .skyqueen-info-card {
    min-width: 100%;
    margin-top: 20px;
  }
}
```

---

## 4. Kiểm tra hoạt động & Tinh chỉnh

1. **Hiệu ứng Float**: Đảm bảo khi bấm vào input hoặc khi có giá trị nhập vào, nhãn `<label>` sẽ bay lên trên phía góc trái và thu nhỏ lại mượt mà.
2. **Kiểm tra Layout Responsive**: Co giãn màn hình để đảm bảo Khung Kính Mờ ở bên trái không đè lên thẻ thông tin bên phải trên máy tính, và xếp chồng gọn gàng (stacked) trên mobile/tablet.
3. **Kiểm tra Icon**: Đảm bảo font `icomoon` đã được import thành công trong theme để các icon hiển thị chính xác.
