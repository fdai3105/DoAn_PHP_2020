<?php
include_once 'dbConn.php';

function listCategory()
{
    global $conn;
    $query = $conn->query("select * from categories");
    $list = '';
    while ($row = $query->fetch_array()) {
        $list .= '<a class="dropdown-item" href="danhmuc.php?dm=' . $row['category_name'] . '">' . $row['category_name'] . '</a>';
    }
    return $list;
}

function getCategoryByProduct($idProduct)
{
    global $conn;
    $category = '';
    $query = mysqli_query($conn, 'select brands.brand_name FROM `products`,`brands`
                                    WHERE product_id = ' . $idProduct . ' and brands_brand_id = brands.`brand_id`');
    $r =  $query->fetch_array();
    return $category = $r['brand_name'];
}
