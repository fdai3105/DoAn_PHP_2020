<?php
include_once  'database/productDB.php';
include_once  'database/brandDB.php';
include_once  'database/categoryDB.php';
include_once  'database/cart.php'
?>

<title>Điện Máy CDB</title>
<?php include 'views/common/head.php'; ?>

<body>
    <!-- nav bar -->
    <?php include 'views/common/navbar.php' ?>

    <!-- vertical slide and banner-->
    <div class="container slide">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <!-- <?php echo listCategory(); ?> -->
                </div>
            </div>

            <div class="col-10">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://cdn.nguyenkimmall.com/images/companies/_1/MKT_ECM/0420/DealBocMangDenTanNha/DealBoc_MangDenTanNha_1008x405.jpg" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.nguyenkimmall.com/images/companies/_1/MKT_ECM/0520/Laptop_Dienthoai/p2/1008x405.png" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.nguyenkimmall.com/images/companies/_1/Data_Price/Pic_Tags/2020/Banner_Cate/quatdieuhoa_10.05_1008x405.jpg" alt="New York">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.tgdd.vn/2020/04/banner/MG-Pana-690-300-690x300.png" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- sản phẩm hot -->
    <div class="container product-hot">
        <div class="row product-hot-items">
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/180" alt="Card image">
                    <div class="card-body">
                        <p class="card-text">Samsung</p>
                        <p class="card-title">Máy lạnh Sharp Inverter 1 HP AH-X9VEW</p>
                        <p class="card-text price">x00.000 ₫</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/180" alt="Card image">
                    <div class="card-body">
                        <p class="card-text">Sản phẩm demo</p>
                        <p class="card-title">Demo 1</p>
                        <p class="card-text price">x00.000 ₫</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/180" alt="Card image">
                    <div class="card-body">
                        <p class="card-text">Sản phẩm demo</p>
                        <p class="card-title">Demo 1</p>
                        <p class="card-text price">x00.000 ₫</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/180" alt="Card image">
                    <div class="card-body">
                        <p class="card-text">Sản phẩm demo</p>
                        <p class="card-title">Demo 1</p>
                        <p class="card-text price">x00.000 ₫</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/180" alt="Card image">
                    <div class="card-body">
                        <p class="card-text">Sản phẩm demo</p>
                        <p class="card-title">Demo 1</p>
                        <p class="card-text price">x00.000 ₫</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- banner sale -->
    <div class="container banner">
        <div class="row">
            <div class="col-6 banner-item">
                <a href="">
                    <img src="https://cdn.nguyenkimmall.com/images/companies/_1/MKT_ECM/0320/bannertang/quat_d.jpg" alt="">
                </a>
            </div>
            <div class="col-6 banner-item">
                <a href="">
                    <img src="https://cdn.nguyenkimmall.com/images/companies/_1/MKT_ECM/0320/bannertang/noicom_d.jpg" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div>
        <?php include 'views/common/footer.php' ?>
    </div>
</body>