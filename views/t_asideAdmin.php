<div id="sidebar" class="sidebar" style="display:block">
    <h2>Bảng Điều Khiển</h2>
    <ul>
        <li><a href=" admin.php?ctrl=page&view=dashboard">Tổng Quan</a></li>
        <li><a href="admin.php?ctrl=user&view=userAdmin">Người Dùng</a></li>
        <li><a href="admin.php?ctrl=order&view=orderAdmin">Đơn Hàng</a></li>
        <li><a href="admin.php?ctrl=page&view=products">Sản Phẩm</a></li>
        <li><a href="admin.php?ctrl=page&view=account-setting">Cài Đặt</a></li>
        <li><a href="admin.php?ctrl=page&view=logout">Đăng Xuất</a></li>
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
            iconBar.style.color = "var(--color-neutral)";
        } else {
            sidebar.style.display = "none";
            mainContent.style.marginLeft = "0";
            mainContent.style.width = "100%";
            iconBar.style.color = "var(--color-text)";
        }
    }
</script>