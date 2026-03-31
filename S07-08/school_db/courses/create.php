<?php
// courses/create.php
// Form thêm viên khóa học mới, có validate & xử lý lỗi DB

require_once __DIR__ . '/../classes/Database.php';

$errors = [];
$title   = '';
$description  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $title  = trim($_POST['title']  ?? '');
    $description = trim($_POST['description'] ?? '');

    // 1. Validate phía server
    if ($title === '') {
        $errors['title'] = 'Vui lòng nhập tên khóa học.';
    }

    if ($description === '') {
        $errors['description'] = 'Vui lòng nhập mô tả.';
    }

    // 2. Nếu không có lỗi validate thì xử lý DB
    if (empty($errors)) {
        try {
            $db = Database::getInstance();

            // Kiểm tra description đã tồn tại chưa
            $existing = $db->fetch('SELECT id FROM courses WHERE title = ?', [$title]);

        if ($existing) {
               $errors['title'] = 'Tên khóa học đã tồn tại.';
            } else {
                // Thêm bản ghi mới
                $db->insert('courses', [
                    'title'  => $title,
                    'description' => $description,
                ]);

                // Redirect về danh sách với thông báo success
                header('Location: index.php?success=1');
                exit;
            }
        } catch (Exception $e) {
            // Không show message nhạy cảm, chỉ báo lỗi chung
            $errors['general'] = 'Có lỗi xảy ra, vui lòng thử lại sau.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm khóa học</title>
</head>
<body>
<h1>Thêm khóa học mới</h1>

<?php if (!empty($errors['general'])): ?>
    <p style="color: red;"><?= htmlspecialchars($errors['general']) ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label>Title:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($title) ?>">
        <?php if (!empty($errors['title'])): ?>
            <span style="color: red;"><?= htmlspecialchars($errors['title']) ?></span>
        <?php endif; ?>
    </div>

    <div>
        <label>description:</label><br>
        <input type="text" name="description" value="<?= htmlspecialchars($description) ?>">
        <?php if (!empty($errors['description'])): ?>
            <span style="color: red;"><?= htmlspecialchars($errors['description']) ?></span>
        <?php endif; ?>
    </div>

    <button type="submit">Lưu</button>
    <button href="index.php">Hủy</button>
    <button href="../index.php">Về trang chính</button>
</form>

</body>
</html>