<?php
include_once  'database/productDB.php';
include_once  'database/cart.php' ?>

<title>Danh mục | Điện Máy CDB</title>

<?php include 'views/common/head.php' ?>

<body>
    <?php include 'views/common/navbar.php' ?>

    <div class="container" style="margin-top:25px">
        <div class="row">
            <?php $brandName = $_GET['brand'];
            echo showAllProductByBrand($brandName) ?>
        </div>
    </div>

    <?php include 'views/common/footer.php' ?>
</body>