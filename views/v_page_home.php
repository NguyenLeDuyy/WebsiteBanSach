<div class="container">
    <h2>Sản phẩm HOT</h2>
    <div class="row">
        <div class=" col-25">
            <h2>Danh mục</h2>
            <ul class="category-list">
                <?php foreach ($dsDM as $dm) : ?>
                <li>
                    <a href="?ctrl=product&view=category&id=<?= $dm['id'] ?>"><?= $dm['name'] ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="col-75">
            <div class="product-container">
                <?php foreach ($dsSP as $sp) : ?>
                <div class="col-25">
                    <div class="product">
                        <img src="public/img/Sach/<?= $sp['cover_image'] ?>" alt="">
                        <div class="title">
                            <p><?= $sp['title'] ?></p>
                        </div>
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
                        <a href="?ctrl=product&view=detail&id=<?= $sp['id'] ?>">
                            Mua
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <h2>Sản phẩm SALE</h2>
    </div>

</div>
</div>