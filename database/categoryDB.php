<?php
include 'dbConn.php';

function listCategory()
{
    global $conn;
    $query = $conn->query("select * from categories");
    $list = '';
    while ($row = $query->fetch_array()) {
        $list .= '<a href="#" class="list-group-item">' . $row['category_name'] . '</a>';
    }
    return $list;
}
?>