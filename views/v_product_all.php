<div class="center-temp-container">
    <img class="readingBookDay" src="public\img\logo\worldBookDay.svg" alt="">
</div>
<div class="right-temp-container">
    <img class="core-value" src="public\img\logo\core_value.svg" alt="">
</div>
</div>
<ul class="products" id="product-list">
    <?php foreach ($dsSP as $sp) : ?>
    <li class="wrapper-slide">
        <div class="product__item">
            <div class="product__item-top">
                <a href="?ctrl=product&view=detail&id=<?= $sp['id'] ?>" class="product__item-top--thumb">
                    <img src="public/img/All/<?= $sp['cover_image'] ?>" alt="Book 1">
                </a>
                <a href="?ctrl=cart&view=addToCartOnHome&id=<?= $sp['id'] ?>"><button class="addToCart">Thêm vào
                        giỏ hàng</button></a>
                <a href="?ctrl=cart&view=addToCart&id=<?= $sp['id'] ?>"><button class="buy">Mua
                        ngay</button></a>
            </div>
            <div class="product__info">
                <a href="?ctrl=product&view=detail&id=<?= $sp['id'] ?>" class="product__info-name">
                    <?= $sp['title'] ?>
                </a>
                <div class="product__info-price">
                    <?php if (isset($sp['discounted_price'])) : ?>
                    <p>
                        <del class="product__info-price--root"><?= number_format($sp['price']) ?><sup>đ</sup></del>
                        <span><?= number_format($sp['discounted_price']) ?></span><sup>đ</sup>
                    </p>
                    <?php if (isset($sp['discount_percentage'])) : ?>
                    <div class="tag-icon"> - <?= $sp['discount_percentage'] ?>%</div>
                    <?php else : ?>
                    <div class="tag-icon">
                        - <?= round((($sp['price'] - $sp['discounted_price']) / $sp['price']) * 100) ?>%
                    </div>
                    <?php endif; ?>
                    <?php else : ?>
                    <p>
                        <?= number_format($sp['price']) ?><sup>đ</sup>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>