<?php
// students/delete.php
// Xóa sinh viên, đã có confirm() bên client

require_once __DIR__ . '/../classes/Database.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

try {
    $db = Database::getInstance();
    $db->delete('students', 'id = ?', [$id]);
    header('Location: index.php?success=deleted');
    exit;
} catch (Exception $e) {
    header('Location: index.php?error=delete');
    exit;
}
