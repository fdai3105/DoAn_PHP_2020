<?php
include_once 'dbConn.php';

function getProductNum()
{
    session_start();
    echo  '<span>' . count($_SESSION['cart']) .  '</span>';
}

// add product to session cart
// tạo 1 mảng session tên bằng id sản phẩm và 
// giá trị là số lượng sản phẩm
if (isset($_POST['product_id'])) {
    session_start();
    $quantity = 1;
    $product_id = $_POST['product_id'];

    if (array_key_exists($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

if (isset($_POST['clearAllCart'])) {
    session_start();
    unset($_SESSION['cart']);
}

if (isset($_POST['delCart'])) {
    session_start();
    unset($_SESSION['cart'][$_POST['delCart']]);
}

// display all cart items
function showAllCartItems()
{
    global $conn;
    $itemCart = '';
    $totalBilled = 0;
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    session_start();
    // session_destroy();
    if ($products_in_cart) {
        $findReplace = ['[', ']', '"'];
        $listID = str_replace($findReplace, '', json_encode(array_keys($products_in_cart)));
        $query = $conn->query("select * from products where product_id in (" . $listID . ')');

        $itemCart .= '<table class="table table-hover table-cart">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Sản Phẩm</th>
                    <th scope="col">Đơn Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>';
        while ($r = $query->fetch_array()) {
            $itemCart .= '<tr class="tb-cart-body">';
            $itemCart .= '<td style="width: 10px !important;"><img width="80px" src="' . $r['product_img'] . '" alt=""></td>';
            $itemCart .= '<td>' . $r['product_name'] . '</td>';
            $itemCart .= '<td>' . number_format($r['product_price'], 0, '.', ',') . '₫</td>';
            $itemCart .= '<td>' . $products_in_cart[$r['product_id']] . '</td>';

            $productTotal = $r['product_price'] * $products_in_cart[$r['product_id']];
            $itemCart .= '<td>' . number_format($productTotal, 0, '.', ',')  . '₫</td>';

            $itemCart .= '<td>';
            $itemCart .= '<form method="post" style="margin: 0px;">';
            $itemCart .= '<input type="hidden" name="delCart" value="' . $r['product_id'] . '"></button>';
            $itemCart .= '<button class="btn btn-danger" type="submit">Xoá</button>';
            $itemCart .= '</form>';
            $itemCart .= '</td>';
            $itemCart .= '</tr>';
            $totalBilled += $r['product_price'] * $products_in_cart[$r['product_id']];
        }
        $itemCart .= '<tr class="tb-cart-body">';
        $itemCart .= '<td colspan="6" style="text-align: end;" class="total"><h5>Tổng cộng: ' . number_format($totalBilled, 0, '.', ',') . '₫</5></td>';
        $itemCart .= '</tr>';
        $itemCart .= '</tbody></table>';
        $itemCart .= '<div style="text-align: right">';
        $itemCart .= '<button style="font-size: 18px;width: 20%;" class="btn btn-dark" type="submit">Thanh Toán';
        $itemCart .= '</button>';
        $itemCart .= '</div>';
    } else {
        $itemCart .= '<div style="text-align: center;">';
        $itemCart .= '<img src="images/empty-cart.png" width="40%" alt="">';
        $itemCart .= '<h4 style="color: #343A40;margin-top: 10px; margin-bottom: 150px; font-family: Arial, Helvetica, sans-serif;">Không có sản phẩm nào trong giỏ hàng</h4>';
        $itemCart .= '</div>';
    }
    return $itemCart;
}
