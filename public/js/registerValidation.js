document.getElementById('registerForm').addEventListener('submit', function (event) {
    // Ngăn chặn hành vi mặc định của form
    event.preventDefault();

    // Lấy giá trị từ các trường
    const fullname = document.getElementById('fullname').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const repassword = document.getElementById('repassword').value.trim();

    // Kiểm tra tính hợp lệ
    if (fullname === '') {
        alert('Họ và tên người dùng không được để trống.');
        return;
    }

    if (email === '') {
        alert('Email không được để trống.');
        return;
    }

    if (password === '') {
        alert('Mật khẩu không được để trống.');
        return;
    }

    if (repassword === '') {
        alert('Nhập lại mật khẩu không được để trống.');
        return;
    }

    if (password !== repassword) {
        alert('Mật khẩu không khớp.');
        return;
    }

    if (password.length < 6) {
        alert('Mật khẩu phải có ít nhất 6 ký tự.');
        return;
    }

    // Nếu tất cả các điều kiện đều đúng, có thể tiếp tục gửi form
    alert('Đăng ký thành công!');
    document.getElementById('registerForm').submit(); // Gửi form
});