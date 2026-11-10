<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 15 - Bình chọn</title>
</head>
<body>
    <p><strong>BÌNH CHỌN</strong></p>
    <div id="binhchon">
        <form id="form1" name="form1" method="get" action="xulybinhchon.php">
            Bạn nghĩ sao về chất lượng của trang web ute.udn.vn
            <p>
                <?php
                require_once './config.php';
                $s = "SELECT * FROM phuongan WHERE idBC = 1";
                $kq = mysqli_query($config, $s);
                $i = 0;
                while ($row = mysqli_fetch_array($kq)) {
                ?>
                    <label>
                        <input type="radio" name="idPA" value="<?php echo $row['idPA']; ?>"
                            <?php if ($i == 0) { echo "checked='checked'"; $i++; } ?>>
                    </label>
                    <?php echo $row['MoTa']; ?><br>
                <?php
                }
                ?>
            </p>

            <p>
                <input type="submit" value="Xem kết quả" name="Submit">
            </p>
        </form>
    </div>
</body>
</html>
