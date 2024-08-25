<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Thêm người dùng mới</h2>
        </div>
        <form action="add_user.php" method="POST">
            <div class="modal-body">
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" required>

                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone">

                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address">

                <label for="city">Thành phố:</label>
                <input type="text" id="city" name="city">

                <label for="district">Quận/Huyện:</label>
                <input type="text" id="district" name="district">

                <label for="ward">Phường/Xã:</label>
                <input type="text" id="ward" name="ward">
            </div>
        </form>
        <div class="modal-footer">
            <div class="btn-sumbit-new-user">
                <button type="submit">Thêm người dùng</button>
            </div>
        </div>
    </div>

</div>



<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>