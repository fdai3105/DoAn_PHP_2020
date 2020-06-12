<?php include_once  'database/productDB.php';
include_once  'database/cart.php'?>

<title>Sản phẩm | Điện Máy CDB</title>

<?php include 'views/common/head.php'; ?>

<body>
    <?php include 'views/common/navbar.php' ?>

    <div class="container product-item">
        <div class="row">
            <?php $id = $_GET['id'];
            echo showProduct($id);
            ?>

            <div style="width: 70%; margin: 0 auto; margin-top:18px">
                <div style="background-color: slategrey; text-align: center;">
                    <p class="bold">ƯU ĐÃI CHỈ CÓ TẠI CDB, GỌI NGAY <a href="tel:1800.6800">1800.6800</a> ĐỂ ĐẶT HÀNG</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'views/common/footer.php' ?>
</body>