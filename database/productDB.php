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
    $limit = 4;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    // hiển thị
    $query = $conn->query("select * from products limit $start, $limit");
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
    $product .= '<ul>
                <li>Bảo quản thực phẩm không cần rã đông khi sử dụng ngăn cấp đông mềm thế hệ mới Prime Fresh+.</li>
                <li>Tiết kiệm điện tối đa với bộ 3 công nghệ Inverter, Multi Control và cảm biến Econavi.</li>
                <li>Ngăn chặn vi khuẩn, mùi hôi khó chịu với công nghệ kháng khuẩn Ag Clean.</li>
                <li>Hơi lạnh tỏa đều mọi vị trí trong tủ thông qua công nghệ làm lạnh Panorama.</li>
            </ul>';

    $product .= '<div class="row buy-add">
                <button type="button" class="btn btn-dark buy">
                    <p style="font-size: 18px; font-weight:700; margin: 0">MUA NGAY</p>Miễn Phí Vận Chuyển
                </button>
                <button type="submit" class="btn btn-dark add-cart">
                    <p style="font-size: 18px; font-weight:700; margin: 0">THÊM VÀO GIỎ HÀNG</p>
                </button>
            </div>';
    $product .= '</form>';
    $product .= '</div>';
    return $product;
}

function showTop5Products()
{
    // SELECT * FROM `products` ORDER BY product_danhgia DESC LIMIT 3


}

function addProduct(
    $pName,
    $pBrandId,
    $pCategoryId,
    $pPrice,
    $pQuantity,
    $pDanhgia,
    $pImg,
    $pBaoHanh,
    $pNoiSX,
    $pTienIch,
    $pCongSuat,
    $pKichThuoc,
    $pKhoiLuong,
    $pTietKiemDien
) {
    global $conn;
    $q = "INSERT INTO `products` (`product_name`, `brands_barnd_id`, `categories_category_id`, `product_price`, `product_quantity`, `product_danhgia`, `product_image`, `product_baohanh`, `product_noisx`, `product_tienich`, `product_congsuat`, `product_kichthuoc`, `product_khoiluong`, `product_tietkiendien`) 
            VALUES ()";
    $query = $conn->query($q);
}
