<?php
include_once 'dbConn.php';

function listBrand()
{
    global $conn;
    $query = $conn->query("select * from brands limit 7");
    $list = '';
    while ($row = $query->fetch_array()) {
        $list .= '<a class="dropdown-item" href="thuonghieu.php?brand=' . $row['brand_name'] . '">' . $row['brand_name'] . '</a>';
    }
    return $list;
}
?>
