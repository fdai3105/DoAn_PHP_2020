<?php include 'database/productDB.php'; ?>

<title>Sản phẩm | Điện Máy CDB</title>

<?php include 'views/common/head.php' ?>

<body>
    <?php include 'views/common/navbar.php' ?>

    <div class="container product-item">
        <div class="row">
            <?php $id = $_GET['id'];
            echo showProduct($id);
            ?>
            <!-- <div class="col-4 img">
                <img src="https://cdn.nguyenkimmall.com/images/thumbnails/370/370/detailed/290/10005313-tu-mat-alaska-450l-lc-743db-4.jpg" alt="">
            </div> -->

            <!-- <div class="col-8 body">
                <h3 style="margin: 0">Tủ lạnh abc 450 lít nhé</h3>
                <div class="starbar">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div> -->
                <!-- <h4>4.200.200đ</h4>
                <h5 style="margin: 0">Đặc điểm nổi bật</h5> -->
                <ul>
                    <li>Bảo quản thực phẩm không cần rã đông khi sử dụng ngăn cấp đông mềm thế hệ mới Prime Fresh+.</li>
                    <li>Tiết kiệm điện tối đa với bộ 3 công nghệ Inverter, Multi Control và cảm biến Econavi.</li>
                    <li>Ngăn chặn vi khuẩn, mùi hôi khó chịu với công nghệ kháng khuẩn Ag Clean.</li>
                    <li>Hơi lạnh tỏa đều mọi vị trí trong tủ thông qua công nghệ làm lạnh Panorama.</li>
                </ul>
                <div class="row buy-add">
                    <button type="button" class="btn btn-dark buy">
                        <p style="font-size: 18px; font-weight:700; margin: 0">MUA NGAY</p>Miễn Phí Vận Chuyển
                    </button>
                    <button type="button" class="btn btn-dark add-cart">
                        <p style="font-size: 18px; font-weight:700; margin: 0">THÊM VÀO GIỎ HÀNG</p>
                    </button>
                </div>
                <div style="width: 70%; margin: 0 auto; margin-top:18px">
                    <div style="background-color: slategrey; text-align: center;">
                        <p class="bold">ƯU ĐÃI CHỈ CÓ TẠI CDB, GỌI NGAY <a href="tel:1800.6800">1800.6800</a> ĐỂ ĐẶT HÀNG</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'views/common/footer.php' ?>
</body>