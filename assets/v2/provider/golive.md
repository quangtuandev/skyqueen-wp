# Kế hoạch Implement: Section Partners (Provider Logos)

## Phân tích thiết kế

Dựa trên [image.png](file:///Users/duanyu-fs/space/phucanh/wp/sky-v2/wp-content/themes/skyqueen/assets/v2/provider/Section/image.png), section này gồm 2 phần chính:

### Phần trên: Hình container Sky Queen
- Một hình ảnh container shipping xanh dương có logo **SKY QUEEN LOGISTICS** in trên thân, được cần cẩu treo lơ lửng từ phía trên.
- Container này nổi lên trên phần logo partners, tạo chiều sâu thị giác ấn tượng.
- Nền trắng/xám nhạt (`#f5f5f5` hoặc tương tự) — phần trên section.

### Phần dưới: Logo Carousel (Partners)
- Dãy logo các hãng tàu: **Evergreen**, **Cosco Shipping**, **HMM**, **Maersk**, **MSC** (và thêm logo bị cắt ở 2 bên — carousel cuộn ngang).
- Logo hiển thị đơn sắc (grayscale), tone xám đậm.
- Phía sau logo có **lưới tọa độ (grid lines)** mờ nhạt, giống hiệu ứng đã dùng ở section Contact — đường kẻ ngang/dọc + điểm giao cắt vuông nhỏ.
- Logo carousel cuộn tự động (autoplay) hoặc kéo tay.

---

## Kế hoạch chi tiết

### 1. Chuẩn bị hình ảnh container
- Cần có một ảnh container PNG nền trong suốt (transparent background).
- Hiện tại file `assets/img/container-graphic.png` đang được dùng — kiểm tra xem có phù hợp với thiết kế mới hay cần thay thế.
- Nếu cần, đặt ảnh mới tại `assets/v2/provider/container.png`.

### 2. Cập nhật PHP Template (`section-partners.php`)
- **Container graphic**: Đặt ảnh container ở phía trên, `position: relative` với `margin-top` âm để nổi lên trên section trước đó (overlap effect).
- **Logo carousel**: Giữ nguyên cấu trúc Swiper hiện tại (đọc từ ACF `partner_logos` repeater), chỉ cập nhật markup và class CSS.
- **Grid overlay**: Thêm `<svg>` overlay động (giống section Contact) vào vùng logo, dùng `data-grid` trên container wrapper.
- **Fallback logo tĩnh**: Nếu ACF chưa có dữ liệu, hiển thị danh sách logo tĩnh từ `assets/v2/provider/` (11 file đã flatten sẵn).

### 3. Cập nhật CSS (`style.css`)
- Nền section: `background: #f5f5f5` hoặc gradient nhẹ trắng → xám.
- Container graphic: căn giữa, `max-height` khoảng 300-400px, `margin-top` âm tạo overlap.
- Logo items: `filter: grayscale(100%)`, chuyển về màu gốc khi hover.
- Grid lines overlay: tương tự contact section, vẽ SVG động.

### 4. Cập nhật JS (`main.js`)
- Init Swiper cho `.swiper-partners` nếu chưa có:
  ```js
  new Swiper(".swiper-partners", {
    slidesPerView: 'auto',
    spaceBetween: 40,
    loop: true,
    autoplay: { delay: 2500, disableOnInteraction: false },
    breakpoints: {
      768: { slidesPerView: 4 },
      1200: { slidesPerView: 6 }
    }
  });
  ```

### 5. Danh sách logo tĩnh sẵn có (`assets/v2/provider/`)
| File | Hãng tàu |
|---|---|
| `cma.png` | CMA CGM |
| `cosco.png` | Cosco Shipping |
| `evergreen.png` | Evergreen |
| `hapag.png` | Hapag-Lloyd |
| `hmm.png` | HMM |
| `maersk.png` | Maersk |
| `msc.png` | MSC |
| `one.png` | ONE |
| `sitc.png` | SITC |
| `ts-lines.png` | TS Lines |
| `wan-hai.png` | Wan Hai |

---

## Câu hỏi cần xác nhận

1. **Ảnh container**: Cần sử dụng ảnh container nào? Có ảnh PNG transparent sẵn không, hay cần cắt từ file design?
2. **Logo source**: Lấy logo từ ACF field `partner_logos` (dynamic) hay hardcode danh sách 11 logo tĩnh từ `assets/v2/provider/`?
3. **Grid overlay**: Có cần grid lines phía sau logo carousel giống trong hình không, hay chỉ phần contact section mới có?
