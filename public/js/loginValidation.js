// JavaScript kiểm tra tính hợp lệ
document.getElementById('loginForm').addEventListener('submit', function (event) {
    // Ngăn chặn hành vi mặc định của form
    event.preventDefault();

    // Lấy giá trị từ các trường
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    // Kiểm tra tính hợp lệ
    if (email === '') {
        alert('Email dùng không được để trống.');
        return;
    }

    if (password === '') {
        alert('Mật khẩu không được để trống.');
        return;
    }

    // Thực hiện kiểm tra thêm nếu cần (ví dụ: độ dài mật khẩu, ký tự đặc biệt, v.v.)
    if (password.length < 6) {
        alert('Mật khẩu phải có ít nhất 6 ký tự.');
        return;
    }

    // Nếu tất cả các điều kiện đều đúng, có thể tiếp tục gửi form
    alert('Đăng nhập thành công!');
    document.getElementById('loginForm').submit(); // Gửi form
});