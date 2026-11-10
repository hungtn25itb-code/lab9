<?php
require_once './config.php';

$thongBao = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noiDung = $_POST['tomtat'] ?? '';
    $stmt = mysqli_prepare($config, 'INSERT INTO bai8_noidung (noi_dung) VALUES (?)');
    if ($stmt === false) {
        die('Không thể chuẩn bị câu lệnh lưu nội dung: ' . mysqli_error($config));
    }

    mysqli_stmt_bind_param($stmt, 's', $noiDung);
    if (!mysqli_stmt_execute($stmt)) {
        die('Không thể lưu nội dung: ' . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
    $thongBao = 'Đã lưu nội dung.';
}

$result = mysqli_query($config, 'SELECT id, noi_dung, created_at FROM bai8_noidung ORDER BY id DESC');
if ($result === false) {
    die('Không thể tải nội dung: ' . mysqli_error($config));
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8 - CKEditor</title>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
    <h2>Bài 8: Sử dụng CKEditor để soạn thảo trong PHP</h2>
    <p><?php echo htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8'); ?></p>
    <form action="" method="post">
        <textarea name="tomtat" id="tomtat"></textarea>
        <script>
            CKEDITOR.replace('tomtat');
        </script>
        <br>
        <input type="submit" value="Gửi">
    </form>

    <h3>Nội dung đã lưu</h3>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <section>
            <p>
                <strong>Lần lưu #<?php echo (int) $row['id']; ?></strong>
                - <?php echo htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <pre><?php echo htmlspecialchars($row['noi_dung'], ENT_QUOTES, 'UTF-8'); ?></pre>
        </section>
    <?php } ?>
</body>
</html>
