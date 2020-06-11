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
    <div class="container" style="margin-top: 50px;">
        <table class="table table-hover table-cart">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php echo showAllCartItems() ?>
            </tbody>
        </table>
    </div>

    <form method="post">
        <button type="submit" name="clearAllCart">Xoá sạch giỏ hàng</button>
    </form>

    <!-- footer -->
    <?php include 'views/common/footer.php' ?>
</body>