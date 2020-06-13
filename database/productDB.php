<?php
include_once  'dbConn.php';
include_once  'database/brandDB.php';
include_once  'database/categoryDB.php';


function showAllProduct()
{
    global $conn;
    // phân trang
    $result = mysqli_query($conn, 'select count(product_id) as total from products');
    $row =  $result->fetch_array();
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    // change phân trang here
    $limit = 12;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    // hiển thị
    $query = $conn->query("select * from products order by products.product_danhgia desc limit $start, $limit");
    $products = '';
    while ($r = $query->fetch_array()) {
        $products .= '<div class="col-3 col-product">';
        $products .= '<a href="sanphamItem.php?id=' . $r['product_id'] . '">';
        $products .= '<div class="card">';
        if (empty($r['product_img'])) {
            $products .= '<img class="card-img-top img-product" src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="Card image">';
        } else {
            $products .= '<img class="card-img-top img-product" src="' . $r['product_img'] . '" alt="Card image">';
        }
        $products .= '<div class="card-body">';
        $products .= '<p class="card-text">' . getCategoryByProduct($r['product_id']) . '</p>';
        $products .= '<p class="card-title">' . $r['product_name'] . '</p>';
        $vietnam_format_number = number_format($r['product_price'], 0, ',', '.');
        $products .= '<p class="card-text price">' . $vietnam_format_number . 'đ' . '</p>';
        $products .= '</div>';
        $products .= '</div>';
        $products .= '</a>';
        $products .= '</div>';
    }
    $products .= '<div class="container">';
    $products .= '<ul class="pagination pg-dark justify-content-end">';
    if ($current_page == 1) {
        $products .= '<li class="page-item disabled"><a class="page-link" href="">Previous</a></li>';
    } else {
        $products .= '<li class="page-item"><a class="page-link" href="sanpham.php?page=' . ($current_page - 1) . '">Previous</a></li>';
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $current_page) {
            $products .=  '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $products .= '<li class="page-item"><a class="page-link" href="sanpham.php?page=' . $i . '">' . $i . '</a></li>';
        }
    }
    if ($current_page == $total_page) {
        $products .= '<li class="page-item disabled"><a class="page-link" href="">Next</a></li>';
    } else {
        $products .= '<li class="page-item"><a class="page-link" href="sanpham.php?page=' . ($current_page + 1) . '">Next</a></li>';
    }
    $products .= '</ul>';
    $products .= '</div>';

    return $products;
}

function showProduct($id)
{
    global $conn;
    $product = '';
    $query = mysqli_query($conn, "select * from products where product_id=" . $id);
    $r =  $query->fetch_array();

    $product .= '<div class="col-4 img">';
    if (empty($r['product_img'])) {
        $product .= '<img src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="">';
    } else {
        $product .= '<img src="' . $r['product_img'] . '" alt="">';
    }
    $product .= '</div>';

    $product .= '<div class="col-8 body">';
    $product .= '<form action="" method="POST">';
    $product .= '<input type="hidden" name="product_id" value="' . $r['product_id'] . '">';
    $product .= '<h3 style="margin: 0">' . $r['product_name'] . '</h3>';
    $product .= '<div class="starbar">';

    // add sao vàng
    $soSao = $r['product_danhgia'];
    for ($i = 1; $i <= $soSao; $i++) {
        $product .= '<span class="fa fa-star checked"></span>';
    }
    // add sao đen
    for ($i = 0; $i < (5 - $soSao); $i++) {
        $product .= '<span class="fa fa-star unchecked"></span>';
    }

    $vietnam_format_number = number_format($r['product_price'], 0, ',', '.');
    $product .= '<h4>' . $vietnam_format_number . 'đ' . '</h4>';
    $product .= '<h5 style="margin: 0">Đặc điểm nổi bật</h5>';

    // trim product_tienich by dot
    $product .= '<ul>';
    $tienich = explode('.', $r['product_tienich']);
    foreach (array_slice($tienich, 0, 5) as $tienich) {
        if (!empty($tienich)) {
            $product .=  '<li>' . $tienich . '</li>';
        }
    }
    $product .= '</ul>';
    $product .= '<div class="row buy-add">
                <button type="submit" class="btn btn-dark add-cart ">
                <p style="font-size: 18px; font-weight:700; margin: 0">THÊM VÀO GIỎ HÀNG</p>
                </button>
                </div>';
    $product .= '</form>';
    $product .= '</div>';
    $product .= '</div>';
    return $product;
}

function showAllProductByCategory($cateName)
{
    global $conn;
    // hiển thị
    $query =
        $conn->query("SELECT products.*, categories.category_name
                    from products, categories
                    where products.categories_category_id = categories.category_id
                    having categories.category_name = '$cateName'");
    $products = '';
    while ($r = $query->fetch_array()) {
        $products .= '<div class="col-3 col-product">';
        $products .= '<a href="sanphamItem.php?id=' . $r['product_id'] . '">';
        $products .= '<div class="card">';
        if (empty($r['product_img'])) {
            $products .= '<img class="card-img-top img-product" src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="Card image">';
        } else {
            $products .= '<img class="card-img-top img-product" src="' . $r['product_img'] . '" alt="Card image">';
        }
        $products .= '<div class="card-body">';
        $products .= '<p class="card-text">' . getCategoryByProduct($r['product_id']) . '</p>';
        $products .= '<p class="card-title">' . $r['product_name'] . '</p>';
        $vietnam_format_number = number_format($r['product_price'], 0, ',', '.');
        $products .= '<p class="card-text price">' . $vietnam_format_number . 'đ' . '</p>';
        $products .= '</div>';
        $products .= '</div>';
        $products .= '</a>';
        $products .= '</div>';
    }
    return $products;
}

function showAllProductByBrand($brandName)
{
    global $conn;
    // phân trang
    $result = mysqli_query($conn, "SELECT count(*) as total 
                        FROM products,brands 
                        WHERE products.brands_brand_id = brands.brand_id 
                        and brands.brand_name = '$brandName'");
    $row =  $result->fetch_array();
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    // change phân trang here
    $limit = 8;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    // hiển thị
    $query =
        $conn->query("SELECT products.*, brands.brand_name FROM products, brands WHERE 
            products.brands_brand_id = brands.brand_id HAVING brands.brand_name = '$brandName' limit $start, $limit");
    $products = '';
    while ($r = $query->fetch_array()) {
        $products .= '<div class="col-3 col-product">';
        $products .= '<a href="sanphamItem.php?id=' . $r['product_id'] . '">';
        $products .= '<div class="card">';
        if (empty($r['product_img'])) {
            $products .= '<img class="card-img-top img-product" src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="Card image">';
        } else {
            $products .= '<img class="card-img-top img-product" src="' . $r['product_img'] . '" alt="Card image">';
        }
        $products .= '<div class="card-body">';
        $products .= '<p class="card-text">' . getCategoryByProduct($r['product_id']) . '</p>';
        $products .= '<p class="card-title">' . $r['product_name'] . '</p>';
        $vietnam_format_number = number_format($r['product_price'], 0, ',', '.');
        $products .= '<p class="card-text price">' . $vietnam_format_number . 'đ' . '</p>';
        $products .= '</div>';
        $products .= '</div>';
        $products .= '</a>';
        $products .= '</div>';
    }
    $products .= '<div class="container">';
    $products .= '<ul class="pagination pg-dark justify-content-end">';
    if ($current_page == 1) {
        $products .= '<li class="page-item disabled"><a class="page-link" href="">Previous</a></li>';
    } else {
        $products .= '<li class="page-item"><a class="page-link" href="thuonghieu.php?brand=thuonghieu.php?brand=' . $brandName . '&page=' . ($current_page - 1) . '">Previous</a></li>';
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $current_page) {
            $products .=  '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $products .= '<li class="page-item"><a class="page-link" href="thuonghieu.php?brand=' . $brandName . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }
    if ($current_page == $total_page) {
        $products .= '<li class="page-item disabled"><a class="page-link" href="">Next</a></li>';
    } else {
        $products .= '<li class="page-item"><a class="page-link" href="thuonghieu.php?brand=' . $brandName . '&page=' . ($current_page + 1) . '">Next</a></li>';
    }
    $products .= '</ul>';
    $products .= '</div>';
    return $products;
}

function findProducts($proName, $orderBy)
{
    global $conn;
    $products = '';
    // hiển thị
    $query = $conn->query("select * from products where product_name like '%$proName%' " . $orderBy);
    if (mysqli_num_rows($query)>0) {
        #region sort by price
        $products .= '<div class="col-lg-12">';
        $products .= '<div class="row" style="justify-content: flex-end;">';
        $products .= '<form class="form-inline" method="get" name="priceSort">';
        $products .= '<input name="proName" type="hidden" value="' . $_GET['proName'] . '">';
        $products .= '<div class="form-group mx-3">';
        $products .= '<select class="form-control" id="priceSort" name="priceSort">';
        $products .= '<option value="" disabled selected hidden>Sắp xếp theo giá</option>';
        $products .= "<option " . ((isset($_GET['priceSort']) && $_GET['priceSort'] == 'PriceAsc') ? 'selected ' : '')  . "value='PriceAsc'>Từ thấp đến cao</option>";
        $products .= "<option " . ((isset($_GET['priceSort']) && $_GET['priceSort'] == 'PriceDesc') ? 'selected ' : '') . "value='PriceDesc'>Từ cao đến thấp</option>";
        $products .= '</select>';
        $products .= '</div>';
        $products .= '<button class="btn btn-info mx-3" type="submit" value="Sort">Sắp xếp</button>';
        $products .= '</form>';
        $products .= '</div>';
        $products .= '</div>';
        #endregion
        while ($r = $query->fetch_array()) {
            $products .= '<div class="col-3 col-product">';
            $products .= '<a href="sanphamItem.php?id=' . $r['product_id'] . '">';
            $products .= '<div class="card">';
            if (empty($r['product_img'])) {
                $products .= '<img class="card-img-top img-product" src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="Card image">';
            } else {
                $products .= '<img class="card-img-top img-product" src="' . $r['product_img'] . '" alt="Card image">';
            }
            $products .= '<div class="card-body">';
            $products .= '<p class="card-text">' . getCategoryByProduct($r['product_id']) . '</p>';
            $products .= '<p class="card-title">' . $r['product_name'] . '</p>';
            $vietnam_format_number = number_format($r['product_price'], 0, ',', '.');
            $products .= '<p class="card-text price">' . $vietnam_format_number . 'đ' . '</p>';
            $products .= '</div>';
            $products .= '</div>';
            $products .= '</a>';
            $products .= '</div>';
        }
    } else {
        #region display if search empty
        $products .= '<div class="col" style="text-align: center;">';
        $products .= '<img src="images/cant-find.png" width="40%" alt="">';
        $products .= '<h4 style="color: #343A40;margin-top: 10px;font-family: Arial, Helvetica, sans-serif;">Không thể tìm thấy sản phẩm nào.</h4>';
        $products .= '<h5 style="color: #343A40;margin-bottom: 150px; font-family: Arial, Helvetica, sans-serif;">Vui lòng thử lại từ khoá khác</h5>';
        $products .= '</div>';
        #endregion
    }
    return $products;
}


function showTop5Products()
{
    global $conn;
    $query = $conn->query("SELECT * FROM `products` ORDER BY product_danhgia DESC LIMIT 5");
    $products = '';
    $products .= '<div class="container product-hot">';
    $products .= '<div class="row product-hot-items">';
    while ($r = $query->fetch_array()) {
        $products .= '<div class="col">';
        $products .= '<a href="sanphamItem.php?id=' . $r['product_id'] . '">';
        $products .= '<div class="card">';
        if (empty($r['product_img'])) {
            $products .= '<img class="card-img-top img-product" src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="Card image">';
        } else {
            $products .= '<img class="card-img-top img-product" src="' . $r['product_img'] . '" alt="Card image">';
        }
        $products .= '<div class="card-body">';
        $products .= '<p class="card-text">' . getCategoryByProduct($r['product_id']) . '</p>';
        $products .= '<p class="card-title">' . mb_strimwidth($r['product_name'], 0, 35, '...') . '</p>';
        $vietnam_format_number = number_format($r['product_price'], 0, ',', '.');
        $products .= '<p class="card-text price">' . $vietnam_format_number . 'đ' . '</p>';
        $products .= '</div>';
        $products .= '</div>';
        $products .= '</a>';
        $products .= '</div>';
    }
    $products .= '</div>';
    $products .= '</div>';
    return $products;
}
