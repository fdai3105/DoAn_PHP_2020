<?php
include_once  'database/productDB.php';
include_once  'database/cart.php' ?>

<title>Danh mục | Điện Máy CDB</title>

<?php include 'views/common/head.php' ?>

<body>
    <?php include 'views/common/navbar.php'; ?>
    <div class="container" style="margin-top:25px">
        <div class="row">
            <?php
            $proName = $_GET['proName'];
            if (isset($_GET['priceSort']) && $_GET['priceSort'] == 'PriceAsc') {
                $orderBy = " ORDER BY product_price ASC";
            }
            if (isset($_GET['priceSort']) && $_GET['priceSort'] == 'PriceDesc') {
                $orderBy = " ORDER BY product_price DESC";
            }
            echo findProducts($proName, $orderBy) ?>
        </div>
    </div>

    <?php include 'views/common/footer.php' ?>
</body>