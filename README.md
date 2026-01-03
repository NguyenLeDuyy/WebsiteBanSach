# WebsiteBanSach 📚

Một nền tảng thương mại điện tử bán sách trực tuyến được xây dựng bằng PHP, cho phép người dùng duyệt, tìm kiếm và mua sách. Hệ thống bao gồm cả giao diện người dùng và bảng điều khiển quản trị.

## 🌟 Tính năng

### Người dùng
- **Xác thực người dùng**: Đăng ký, đăng nhập, quản lý hồ sơ cá nhân
- **Danh mục sách**: Duyệt sách theo danh mục
- **Chi tiết sản phẩm**: Xem thông tin chi tiết, hình ảnh và mô tả sách
- **Giỏ hàng**: Thêm, xóa, cập nhật sản phẩm trong giỏ hàng
- **Đặt hàng**: Quy trình thanh toán hoàn chỉnh với địa chỉ giao hàng
- **Quản lý đơn hàng**: Theo dõi lịch sử đơn hàng và trạng thái
- **Bình luận & Đánh giá**: Viết đánh giá cho sách đã mua
- **Tin tức**: Đọc tin tức và bài viết liên quan đến sách

### Quản trị viên
- **Quản lý sản phẩm**: Thêm, sửa, xóa sách và danh mục
- **Quản lý người dùng**: Quản lý tài khoản người dùng
- **Quản lý đơn hàng**: Xem và cập nhật trạng thái đơn hàng
- **Dashboard**: Tổng quan về hoạt động của hệ thống
- **Quản lý tin tức**: Tạo và quản lý bài viết tin tức

## 🛠️ Công nghệ sử dụng

- **Backend**: PHP (MVC Pattern)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Server**: Apache/Nginx
- **Database Management**: phpMyAdmin

## 📋 Yêu cầu hệ thống

- PHP >= 7.4
- MySQL >= 5.7
- Apache/Nginx Web Server
- phpMyAdmin (khuyến nghị)

## 🚀 Cài đặt

### 1. Clone repository

```bash
git clone https://github.com/NguyenLeDuyy/WebsiteBanSach.git
cd WebsiteBanSach
```

### 2. Cấu hình cơ sở dữ liệu

1. Tạo database mới tên `book_store` trong phpMyAdmin
2. Import file `book_store.sql` vào database vừa tạo:
   ```bash
   mysql -u root -p book_store < book_store.sql
   ```
   Hoặc sử dụng phpMyAdmin để import file SQL

### 3. Cấu hình kết nối database

Mở file `models/pdo.php` và cập nhật thông tin kết nối:

```php
$servername = "localhost";
$username = "root";        // Tên đăng nhập MySQL của bạn
$password = "";            // Mật khẩu MySQL của bạn
```

### 4. Chạy ứng dụng

1. Đặt project vào thư mục web server (htdocs cho XAMPP, www cho WAMP)
2. Khởi động Apache và MySQL
3. Truy cập ứng dụng:
   - **Giao diện người dùng**: `http://localhost/WebsiteBanSach/index.php`
   - **Trang quản trị**: `http://localhost/WebsiteBanSach/admin.php`

### 5. Tài khoản mặc định

Sau khi import database, bạn có thể đăng nhập với:
- **Admin**: Kiểm tra trong bảng `accounts` với `role = 'admin'`
- **User**: Đăng ký tài khoản mới hoặc kiểm tra trong database

## 📁 Cấu trúc dự án

```
WebsiteBanSach/
├── controllers/          # Controllers xử lý logic nghiệp vụ
│   ├── c_cart.php       # Quản lý giỏ hàng
│   ├── c_comment.php    # Quản lý bình luận
│   ├── c_order.php      # Quản lý đơn hàng
│   ├── c_page.php       # Quản lý trang
│   ├── c_product.php    # Quản lý sản phẩm
│   └── c_user.php       # Quản lý người dùng
├── models/              # Models tương tác với database
│   ├── m_cart.php
│   ├── m_categories.php
│   ├── m_comment.php
│   ├── m_order.php
│   ├── m_product.php
│   ├── m_user.php
│   └── pdo.php          # Kết nối database
├── views/               # Views hiển thị giao diện
│   ├── t_header*.php    # Headers
│   ├── v_cart*.php      # Trang giỏ hàng
│   ├── v_order*.php     # Trang đơn hàng
│   ├── v_product*.php   # Trang sản phẩm
│   └── v_user*.php      # Trang người dùng
├── public/              # Tài nguyên tĩnh
│   ├── css/            # Stylesheets
│   ├── js/             # JavaScript files
│   └── img/            # Hình ảnh
├── index.php            # Entry point cho người dùng
├── admin.php            # Entry point cho admin
└── book_store.sql       # Database schema

```

## 💡 Sử dụng

### Người dùng

1. **Đăng ký/Đăng nhập**: Tạo tài khoản hoặc đăng nhập vào hệ thống
2. **Duyệt sách**: Xem danh sách sách theo danh mục
3. **Thêm vào giỏ hàng**: Chọn sách và thêm vào giỏ hàng
4. **Đặt hàng**: Điền thông tin giao hàng và hoàn tất đơn hàng
5. **Theo dõi đơn hàng**: Xem lịch sử và trạng thái đơn hàng

### Quản trị viên

1. **Đăng nhập admin**: Truy cập `admin.php` với tài khoản admin
2. **Quản lý sản phẩm**: Thêm, sửa, xóa sách
3. **Quản lý đơn hàng**: Cập nhật trạng thái đơn hàng
4. **Quản lý người dùng**: Xem và quản lý tài khoản người dùng

## 🗄️ Database Schema

Database bao gồm các bảng chính:
- `accounts`: Thông tin người dùng
- `books`: Danh mục sách
- `categories`: Danh mục sản phẩm
- `cart`, `cart_detail`: Giỏ hàng
- `orders`, `order_detail`: Đơn hàng
- `comment`: Bình luận và đánh giá
- `news`: Tin tức
- `province`, `district`, `wards`: Địa chỉ giao hàng

## 🤝 Đóng góp

Mọi đóng góp đều được chào đón! Để đóng góp:

1. Fork repository
2. Tạo branch mới: `git checkout -b feature/ten-tinh-nang`
3. Commit thay đổi: `git commit -m 'Thêm tính năng mới'`
4. Push lên branch: `git push origin feature/ten-tinh-nang`
5. Tạo Pull Request

## 📝 License

Dự án này được phát triển cho mục đích học tập và nghiên cứu.

## 📧 Liên hệ

Nguyen Le Duy - [GitHub](https://github.com/NguyenLeDuyy)

Project Link: [https://github.com/NguyenLeDuyy/WebsiteBanSach](https://github.com/NguyenLeDuyy/WebsiteBanSach)
