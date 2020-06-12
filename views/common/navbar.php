<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand logo" href="index.php">
        <!-- <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt=""> -->
        Điện máy CDB
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="sanpham.php">Sản phẩm</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh Mục
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <?php echo listCategory() ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Thương Hiệu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <?php echo listBrand() ?>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="timkiem.php">
            <input class="form-control mr-sm-2" name="proName" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="link-icons">
            <a href="giohang.php">
                <i class="fa fa-shopping-cart"></i>
                <?php getProductNum() ?>
            </a>
        </div>
    </div>
</nav>