<?php
// students/index.php
// Hiển thị danh sách sinh viên, link sang thêm/sửa/xóa

require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

// Lấy tất cả sinh viên, sắp xếp mới nhất lên trước
$students = $db->fetchAll('SELECT * FROM students ORDER BY created_at DESC');

$message = '';
$messageType = '';

if (isset($_GET['success'])) {
    if ($_GET['success'] === 'created') {
        $message = 'Thêm sinh viên thành công.';
        $messageType = 'success';
    } elseif ($_GET['success'] === 'updated') {
        $message = 'Cập nhật sinh viên thành công.';
        $messageType = 'success';
    } elseif ($_GET['success'] === 'deleted') {
        $message = 'Xóa sinh viên thành công.';
        $messageType = 'success';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] === 'create') {
        $message = 'Không thể thêm sinh viên. Vui lòng thử lại.';
        $messageType = 'error';
    } elseif ($_GET['error'] === 'update') {
        $message = 'Không thể cập nhật sinh viên. Vui lòng thử lại.';
        $messageType = 'error';
    } elseif ($_GET['error'] === 'delete') {
        $message = 'Không thể xóa sinh viên.';
        $messageType = 'error';
    } elseif ($_GET['error'] === 'not_found') {
        $message = 'Không tìm thấy sinh viên.';
        $messageType = 'error';
    } elseif ($_GET['error'] === 'invalid_id') {
        $message = 'ID sinh viên không hợp lệ.';
        $messageType = 'error';
    } elseif ($_GET['error'] === 'load') {
        $message = 'Không thể tải dữ liệu sinh viên.';
        $messageType = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #4CAF50; color: #fff; }
        .btn { padding: 4px 8px; text-decoration: none; border-radius: 3px; }
        .btn-add { background: #4CAF50; color: #fff; }
        .btn-edit { background: #2196F3; color: #fff; }
        .btn-delete { background: #f44336; color: #fff; }
        .alert {
            padding: 10px 14px;
            margin-bottom: 16px;
            border-radius: 5px;
        }
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }
        .alert-error {
            background: #ffebee;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }
    </style>
</head>
<body>
<h1>Quản lý sinh viên</h1>

<?php if ($message): ?>
    <div class="alert <?= $messageType === 'success' ? 'alert-success' : 'alert-error' ?>">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>
<p>
    <a href="create.php" class="btn btn-add">+ Thêm sinh viên</a>
    <a href="../index.php" class="btn" style="background:#666; color:#fff;">← Về trang chính</a>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <td><?= htmlspecialchars($student['phone'] ?? '') ?></td>
            <td><?= $student['created_at'] ?></td>
            <td>
                <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-edit">Sửa</a>
                <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-delete"
                   onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>