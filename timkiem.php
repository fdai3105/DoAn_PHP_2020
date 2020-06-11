<?php
include_once  'database/productDB.php';
include_once  'database/cart.php' ?>

<title>Danh mục | Điện Máy CDB</title>

<?php include 'views/common/head.php' ?>

<body>
    <?php include 'views/common/navbar.php' ?>

    <div class="container">
        <div class="row">
            <?php $proName = $_GET['proName'];
            echo findProducts($proName) ?>
        </div>
    </div>

    <?php include 'views/common/footer.php' ?>
</body>