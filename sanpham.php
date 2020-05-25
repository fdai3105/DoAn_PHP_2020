<?php include 'database/productDB.php'; ?>

<title>Sản phẩm | Điện Máy CDB</title>

<?php include 'views/common/head.php' ?>

<body>
    <?php include 'views/common/navbar.php' ?>

    <div class="container-fuild">
        <div class="row">
            <?php echo showAllProduct() ?>
            
        </div>
    </div>

    <?php include 'views/common/footer.php' ?>
</body>