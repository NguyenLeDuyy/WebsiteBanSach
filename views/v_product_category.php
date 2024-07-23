<h2><?= $dm['name'] ?></h2>

<div class="row">
    <?php foreach ($dsSP as $sp) : ?>
    <div class="col-25">
        <div class="product">
            <img src="public/img/Sach/<?= $sp['cover_image'] ?>" alt="">
            <div class="title">
                <p><?= $sp['title'] ?></p>
            </div>
            <p><?= number_format($sp['price']) ?>đ</p>
            <a href="?ctrl=product&view=detail&id=<?= $sp['id'] ?>">
                Mua
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>