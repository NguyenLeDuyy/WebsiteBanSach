<div id="sidebar" class="sidebar" style="display:block">
    <h2 class="title">Bảng Điều Khiển</h2>
    <ul>
        <li><a href=" admin.php?ctrl=page&view=dashboard">Tổng Quan</a></li>
        <li><a href="admin.php?ctrl=user&view=userAdmin">Người Dùng</a></li>
        <li><a href="admin.php?ctrl=order&view=orderAdmin">Đơn Hàng</a></li>
        <li><a href="admin.php?ctrl=product&view=productAdmin">Sản Phẩm</a></li>
        <li><a href="index.php?ctrl=page&view=home">Về trang chủ</a></li>
        <li><a href="admin.php?ctrl=user&view=logout">Đăng Xuất</a></li>
    </ul>
</div>
<script>
function showHideSideBar() {
    var sidebar = document.getElementById("sidebar");
    var mainContent = document.querySelector(".main-content");
    var iconBar = document.getElementsByClassName("icon-bar")[0];

    if (sidebar.style.display === "none" || sidebar.style.display === "") {
        sidebar.style.display = "block";
        mainContent.style.marginLeft = "20%";
        mainContent.style.width = "80%";
    } else {
        sidebar.style.display = "none";
        mainContent.style.marginLeft = "0";
        mainContent.style.width = "100%";
    }
}
</script>