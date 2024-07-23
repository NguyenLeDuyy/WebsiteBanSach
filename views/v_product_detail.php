<div class="row product-detail">
    <div class="col-50">
        <img src="public/img/Sach/<?= $sp['cover_image'] ?>" alt="">
    </div>
    <div class="col-50">
        <h2><?= $sp['title'] ?></h2>
        <?php if (isset($sp['discounted_price'])) : ?>
        <p>
            <strong><?= number_format($sp['discounted_price']) ?><sup>đ</sup></strong>
            <del><?= number_format($sp['price']) ?><sup>đ</sup></del>
        </p>
        <?php else : ?>
        <p>
            <?= number_format($sp['price']) ?><sup>đ</sup>
        </p>
        <?php endif; ?>
        <a href="?ctrl=product&view=addToCart&id=<?= $sp['id'] ?>">Thêm vào giỏ hàng</a>
    </div>
</div>
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