<div class="container">
    <main>
        <div class="containermain">
            <h2>Dầu Và Máu - Mohammed Bin Salman Và Tham Vọng Tái Thiết Kinh Tế Ả-Rập</h2>
            <hr>
            <div class="container--sp">
                <div class="wrapper">
                    <div class="large-image">
                        <img src="public\img\imgproduct\anh1.png" alt="Hình Lớn" id="largeImage">
                    </div>
                    <div class="small-images">
                        <img src="public\img\imgproduct\anh1.png" alt="Hình Nhỏ 1" class="small-image">
                        <img src="public\img\imgproduct\anh4.jpeg" alt="Hình Nhỏ 2" class="small-image">
                        <img src="public\img\imgproduct\anh5.jpeg" alt="Hình Nhỏ 3" class="small-image">
                    </div>
                </div>
                <div class="info-basic">
                    <div class="price-container">
                        <p class="price-container__label">Giá bán:
                            <span class="price-container__current-price">199.200đ</span>
                            <del class="price-container__old-price">249.000đ</del>
                        </p>
                    </div>
                    <p class="thrifty">Tiết kiệm: <b> 49.800đ</b>
                        <span>-20%</span>
                    </p>
                    <div class="Incentives">
                        <b>KHUYẾN MÃI & ƯU ĐÃI</b>
                        <ol>
                            <li>Cơ hội để hiểu rõ hơn về những sức mạnh và mâu thuẫn địa chính trị đang định hình thế
                                giới xung quanh</li>
                            <li>Văn phong dễ hiểu, lôi cuốn, phù hợp với mọi độc giả</li>
                            <li>Cẩm nang chứa đựng ý nghĩa địa chính trị, địa chiến lược và chính trị của Ả Rập</li>
                        </ol>
                    </div>
                    <div class="quantity-control">
                        Số lượng:
                        <button id="tru" onclick="tru()">-</button>
                        <span id="quantity">1</span>
                        <button id="cong" onclick="cong()">+</button>
                    </div>
                    <a href="?ctrl=cart&view=addToCart&id=<?= $sp['id'] ?>"><button class="buy" onclick="buyNow()">MUA
                            NGAY</button></a>
                    <div class="chinhsach">
                        <div class="one-hundred-per">
                            <i class="fa-solid fa-check-double"></i>
                            <p> 100% sách bản quyền</p>
                        </div>
                        <div class="free-trade">
                            <i class="fas fa-undo-alt"></i>
                            <p> Đổi trả miễn phí</p>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="logo">
                        <img src="public\img\logo\logo-removebg-preview.png" alt="">
                        <div class="ph">
                            <b>Nhà sách DuyKhang</b>
                            <p>Phát hành</p>
                        </div>
                    </div>
                    <div class="nxb">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Tác giả</td>
                                    <td>Bradley Hope, Justin Scheck</td>
                                </tr>
                                <tr>
                                    <td>Người Dịch</td>
                                    <td>Phương Anh, Kiên Lưu </td>
                                </tr>
                                <tr>
                                    <td>NXB</td>
                                    <td>NXB Thế giới</td>
                                </tr>
                                <tr>
                                    <td>Kích Thước</td>
                                    <td>16 x 24 cm</td>
                                </tr>
                                <tr>
                                    <td>Số trang</td>
                                    <td>378</td>
                                </tr>
                                <tr>
                                    <td>Hình thức</td>
                                    <td>Bìa cứng áo ôm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <hr>

    <h3>Bình luận</h3>
    <div class="comment">
        <?php if (isset($_SESSION['user'])) : ?>
        <form action="?ctrl=comment&view=add" method="post">
            <textarea name="comment" id="comment" placeholder="Đánh giá của bạn về sản phẩm này"></textarea>
            <input type="hidden" name="product_id" value="<?= $sp['id'] ?>">
            <button type="submit">Gửi</button>
        </form>
        <?php else : ?>
        <p style="text-align:center">
            Vui lòng <a href="?ctrl=user&view=login">đăng nhập</a> để đánh giá
        </p>
        <?php endif; ?>
    </div>

    <?php foreach ($dsBL as $bl) : ?>
    <div class="comment">
        <strong><?= $bl['fullname'] ?></strong>
        <?= $bl['comment_time'] ?>
        <p><?= $bl['comment_content'] ?></p>
    </div>
    <?php endforeach; ?>
</div>

<script src="public\js\product.js"></script>