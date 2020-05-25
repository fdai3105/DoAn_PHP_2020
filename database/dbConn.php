<?php
define('DB_USER', "root"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "doan_php_dienmay"); // database name
define('DB_SERVER', "localhost"); // db server

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_errno) {
    echo "Kết nối thất bại";
}
