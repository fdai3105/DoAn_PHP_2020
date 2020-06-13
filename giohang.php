<?php
include_once 'database/cart.php';
include_once  'database/brandDB.php';
include_once  'database/categoryDB.php';
?>

<title>Giỏ Hàng | Điện Máy CDB</title>
<?php include 'views/common/head.php'; ?>

<body>
    <!-- nav bar -->
    <?php include 'views/common/navbar.php' ?>

    <!-- body -->
    <div class="container" style="margin-top: 50px;margin-bottom: 180px">
        <?php echo showAllCartItems() ?>
    </div>

    <!-- <form method="post">
        <button class="btn btn-danger" type="submit" name="clearAllCart">Xoá sạch giỏ hàng</button>
    </form> -->

    <!-- footer -->
    <?php include 'views/common/footer.php' ?>
</body>