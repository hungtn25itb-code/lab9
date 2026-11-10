<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bình chọn</title>
</head>
<body>
    <table width="450" border="1" cellpadding="4">
        <?php
        require_once './config.php';

        $s = "SELECT * FROM binhchon WHERE idBC = 1";
        $kq = mysqli_query($config, $s);
        $mota = '';
        if ($d = mysqli_fetch_array($kq)) {
            $mota = $d['MoTa'];
        }

        $s = "SELECT SUM(SoLanChon) AS tongsolanchon FROM phuongan WHERE idBC = 1";
        $kq = mysqli_query($config, $s);
        $tongsobinhchon = 0;
        if ($d = mysqli_fetch_array($kq)) {
            $tongsobinhchon = (int) $d['tongsolanchon'];
        }

        $mauSo = max(1, $tongsobinhchon);
        ?>

        <tr>
            <td colspan="3" bgcolor="#66CCFF" align="center"><?php echo $mota; ?></td>
        </tr>

        <?php
        $s = "SELECT * FROM phuongan WHERE idBC = 1";
        $kq = mysqli_query($config, $s);
        while ($d = mysqli_fetch_array($kq)) {
            $rong = ($d['SoLanChon'] / $mauSo) * 150;
            $phantram = ($d['SoLanChon'] / $mauSo) * 100;
        ?>
            <tr>
                <td width="150"><?php echo $d['MoTa']; ?></td>
                <td width="150">
                    <table width="150">
                        <tr>
                            <td width="<?php echo $rong; ?>" bgcolor="#FF0000"></td>
                            <td><?php echo round($phantram, 2); ?>%</td>
                        </tr>
                    </table>
                </td>
                <td width="150">Số lần chọn: <?php echo $d['SoLanChon']; ?></td>
            </tr>
        <?php
        }
        ?>

        <tr>
            <td colspan="3" align="right">Tổng số lần chọn: <?php echo $tongsobinhchon; ?></td>
        </tr>
    </table>
</body>
</html>
