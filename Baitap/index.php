<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DShop</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <?php
    $dsSP = [
        [
            "name" => "Táo",
            "image" => "Tao.png",
            "price" => 10000,
            "sale_price" => 9500, // Giảm giá
        ],
        [
            "name" => "Lê",
            "image" => "Le.png",
            "price" => 20000,
            "sale_price" => 20000, // Không giảm giá
        ],
        [
            "name" => "Mận",
            "image" => "Man.png",
            "price" => 15000,
            "sale_price" => 14500, // Giảm giá
        ],
        [
            "name" => "Đào",
            "image" => "Dao.png",
            "price" => 22000,
            "sale_price" => 22000, // Không giảm giá
        ],
        [
            "name" => "Ổi",
            "image" => "Oi.png",
            "price" => 30000,
            "sale_price" => 29000, // Giảm giá
        ],
        [
            "name" => "Xoài",
            "image" => "Xoai.png",
            "price" => 35000,
            "sale_price" => 34000, // Giảm giá
        ],
        [
            "name" => "Cóc",
            "image" => "Coc.png",
            "price" => 12000,
            "sale_price" => 12000, // Không giảm giá
        ],
        [
            "name" => "Xaboche",
            "image" => "Xaboche.png",
            "price" => 24000,
            "sale_price" => 23000, // Giảm giá
        ],
        [
            "name" => "Dưa lưới",
            "image" => "Man.png",
            "price" => 20000,
            "sale_price" => 20000, // Không giảm giá
        ],
        [
            "name" => "Dưa hấu",
            "image" => "DuaHau.png",
            "price" => 15000,
            "sale_price" => 14500, // Giảm giá
        ]
    ];

    ?>
    <h1>Danh sách sản phẩm</h1>
    <div class="row">
        <?php for ($i = 0; $i < count($dsSP); $i++) : ?>
        <div class="col">
            <?php if ($i % 2 != 0) : ?>
            <div class="product" style="color:orange">
                <?php else : ?>
                <div class="product">
                    <?php endif; ?>
                    <strong><?php echo $dsSP[$i]['name'] ?></strong>
                    <img src="./images/<?php echo $dsSP[$i]['image'] ?>" alt="">
                    <p>Giá:
                        <?php if ($dsSP[$i]['sale_price'] < $dsSP[$i]['price']) : ?>
                        <?php echo number_format($dsSP[$i]['sale_price']) ?>đ
                        <s><?php echo number_format($dsSP[$i]['price']) ?>đ</s>
                        <?php else : ?>
                        <?php echo number_format($dsSP[$i]['sale_price']) ?>đ
                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <h1>Sản phẩm giá rẻ</h1>
        <!-- Lấy ra những sản phẩm có giá dưới 20,000đ -->
        <div class="row">
            <?php for ($i = 0; $i < count($dsSP); $i++) : ?>
            <?php if ($dsSP[$i]['price'] < 20000) : ?>
            <div class="col">
                <div class="product">
                    <strong><?php echo $dsSP[$i]['name'] ?></strong>
                    <img src="./images/<?php echo $dsSP[$i]['image'] ?>" alt="">
                    <p>Giá: <?php echo number_format($dsSP[$i]['price']) ?>đ</p>
                </div>
            </div>
            <?php endif; ?>
            <?php endfor; ?>
        </div>
        <h1>Sản phẩm giá rẻ</h1>
        <!-- Lấy ra những sản phẩm có giá dưới 20,000đ -->
        <div class="row">
            <?php foreach ($dsSP as $sp) : ?>
            <?php if ($sp['price'] < 20000) : ?>
            <div class="col">
                <div class="product">
                    <strong><?= $sp['name'] ?></strong>
                    <img src="./images/<?= $sp['image'] ?>" alt="">
                    <p>Giá: <?= number_format($sp['price']) ?>đ</p>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
</body>

</html>