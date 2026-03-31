<?php
// courses/edit.php
// Sửa thông tin khóa học theo id, có validate & check description trùng

require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

// Lấy id từ query string
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$errors = [];

// Lấy khóa học hiện tại
try {
    $course = $db->fetch('SELECT * FROM courses WHERE id = ?', [$id]);
    if (!$course) {
        header('Location: index.php');
        exit;
    }
} catch (Exception $e) {
    die('Không lấy được dữ liệu khóa học.');
}

$title  = $course['title'];
$description = $course['description'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title  = trim($_POST['title']  ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($title === '') {
        $errors['title'] = 'Vui lòng nhập tên khóa học.';
    }

    if ($description === '') {
        $errors['description'] = 'Vui lòng nhập mô tả.';
    }

    if (empty($errors)) {
        try {
            // description trùng nhưng không phải bản ghi hiện tại
            $existing = $db->fetch('SELECT id FROM courses WHERE title = ? AND id <> ?', [$title, $id]);

            if ($existing) {
                $errors['title'] = 'Tên khóa học đã thuộc về khóa học khác.';
            } else {
                $db->update('courses', [
                    'title'  => $title,
                    'description' => $description,
                ], 'id = ?', [$id]);

                header('Location: index.php?updated=1');
                exit;
            }
        } catch (Exception $e) {
            $errors['general'] = 'Có lỗi khi cập nhật, vui lòng thử lại.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa khóa học</title>
</head>
<body>
<h1>Sửa khóa học</h1>

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
        <label>Description:</label><br>
        <input type="text" name="description" value="<?= htmlspecialchars($description) ?>">
        <?php if (!empty($errors['description'])): ?>
            <span style="color: red;"><?= htmlspecialchars($errors['description']) ?></span>
        <?php endif; ?>
    </div>

    <button type="submit">Cập nhật</button>
    <button href="index.php">Hủy</button>
    <button href="../index.php">Về trang chính</button>
</form>

</body>
</html>