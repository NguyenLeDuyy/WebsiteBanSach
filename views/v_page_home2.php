<article class="article-container">
    <div class="slideShow">
        <div class="slideShow__list">
            <a href="#link1">
                <img class="slideShow__list-item" src="public\img\cover_slide\kientao.jpg" alt="tủ sách kinh tế">
            </a>
            <a href="#link2">
                <img class="slideShow__list-item" src="public\img\cover_slide\kinh te.png" alt="sách kiến tạo thành công">
            </a>
            <a href="#link3">
                <img class="slideShow__list-item" src="public\img\cover_slide\sachmoi.jpg" alt="sách mới nổi bật">
            </a>

        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
    <div class="right-article">
        <div class="slideShow__list-item2">
            <a href=""><img src="public\img\cover_slide\sp.png" alt="anh phu"></a>
            <a href=""><img src="public\img\cover_slide\sp2.jpg" alt="anh phu 2"></a>
        </div>
    </div>
</article>

</div>
<main>
    <div id="wrapper">
        <div class="headline">
            <div class="headline-title">
                <h3 class="headline-name"><a href="/sanpham/sp.html" class="headline-link">
                        <i class="fab fa-hotjar headline-icon"></i>
                        SẢN PHẨM NỔI BẬT </a>
                </h3>
            </div>
            <img src="public\img\cover_slide\sachmoi.jpg" alt="">
        </div>
        <button id="prev-button" onclick="goPrev()"><i class="fas fa-step-backward"></i></button>
        <ul class="products your-ul-selector" id="product-list">

        </ul>

        <button id="next-button" onclick="goNext()"><i class="fas fa-step-forward"></i></button>

    </div>
    <div id="wrapper">
        <div class="headline">
            <div class="headline-title">
                <h3 class="headline-name"><a href="/sanpham/sp.html" class="headline-link">
                        <i class="fas fa-book headline-icon"></i>
                        TỦ SÁCH GIA ĐÌNH </a>
                </h3>
            </div>
            <img src="public\img\cover_slide\tusachgd.png" alt="">
        </div>
        <ul class="products" id="product-list">
            <?php foreach ($familySP as $sp) : ?>
                <li class="wrapper-slide">
                    <div class="product__item">
                        <div class="product__item-top">
                            <a href="?ctrl=product&view=detail&id=<?= $sp['id'] ?>" class="product__item-top--thumb">
                                <img src="public/img/All/<?= $sp['cover_image'] ?>" alt="Book 1">
                            </a>
                            <button class="buy">Mua ngay</button>
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


    </div>
    <div class="Review-container">
        <h3 class="headline-name">Review sách hay</h3>
        <div class="review">
            <?php foreach ($someNews as $news) : ?>
                <a href="<?= $news['link'] ?>" class="review__item">
                    <div class="review__image-container">
                        <img src="public/img/imgreview/<?= $news['image'] ?>" alt="Image 1" class="review__image">
                    </div>
                    <div class="review__overlay"></div>
                    <div class="review__content">
                        <p><?= $news['title'] ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<script>
    const featuredProducts = <?= json_encode($featuredSP) ?>;
</script>
<script src="public/js/slide copy.js" defer></script>
<script src="public/js/action.js"></script>