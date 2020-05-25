<?php
include 'dbConn.php';

function showAllProduct()
{
    global $conn;
    $query = $conn->query("select * from products");
    $products = '';
    while ($r = $query->fetch_array()) {
        $products .= '<div class="col-2 col-product">';
        $products .= '<a href="sanphamItem.php?id=' . $r['product_id'] . '">';
        $products .= '<div class="card">';
        if (empty($r['product_img'])) {
            $products .= '<img class="card-img-top img-product" src="https://via.placeholder.com/400x400.png?text=dien%20may%20CDB" alt="Card image">';
        } else {
            $products .= '<img class="card-img-top img-product" src="' . $r['product_img'] . '" alt="Card image">';
        }
        $products .= '<div class="card-body">';
        $products .= '<p class="card-text">' . 'Danh mục' . '</p>';
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

function showProduct($id)
{
    global $conn;
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
    $product .= '</div>';
    return $product;
}

function showTop5Products()
{
    // SELECT * FROM `products` ORDER BY product_danhgia DESC LIMIT 3


}
