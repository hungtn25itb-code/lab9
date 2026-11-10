<?php
$config = mysqli_connect('localhost', 'root', '', 'bai8_ckeditor');

if ($config === false) {
    die('Không thể kết nối cơ sở dữ liệu: ' . mysqli_connect_error());
}

if (!mysqli_set_charset($config, 'utf8mb4')) {
    die('Không thể thiết lập bộ mã kết nối: ' . mysqli_error($config));
}
?>
