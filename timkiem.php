<?php
include_once  'database/productDB.php';
include_once  'database/cart.php' ?>

<title>Danh mục | Điện Máy CDB</title>

<?php include 'views/common/head.php' ?>

<body>
    <?php include 'views/common/navbar.php'; ?>
    <div class="container" style="margin-top:25px">
        <div class="col-lg-12">
            <div class="row" style="justify-content: flex-end;">
                <form class="form-inline" method="get" name="priceSort">
                    <input name="proName" type="hidden" value="<?php echo $_GET['proName'] ?>">
                    <div class="form-group mx-3">
                        <select class="form-control" id="priceSort" name="priceSort">
                            <option value="" disabled selected hidden>Sắp xếp theo giá</option>
                            <option <?php echo (isset($_GET['priceSort']) && $_GET['priceSort'] == 'PriceAsc') ? 'selected' : '' ?> value='PriceAsc'>Từ thấp đến cao</option>
                            <option <?php echo (isset($_GET['priceSort']) && $_GET['priceSort'] == 'PriceDesc') ? 'selected' : '' ?> value='PriceDesc'>Từ cao đến thấp</option>
                        </select>
                    </div>
                    <button class="btn btn-info mx-3" type="submit" value="Sort">Sắp xếp</button>
                </form>
            </div>
        </div>
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