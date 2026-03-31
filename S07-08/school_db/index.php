<?php
// index.php
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý đăng ký học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            display: inline-block;
            width: 220px;
            padding: 20px;
            border-radius: 8px;
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
        }

        .students {
            background: #4CAF50;
        }

        .courses {
            background: #2196F3;
        }

        .enrollments {
            background: #FF9800;
        }

        .card:hover {
            transform: translateY(-5px);
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hệ thống quản lý đăng ký học</h1>
        <p>Chọn module bạn muốn quản lý</p>

        <div class="menu">
            <a href="students/index.php" class="card students">Quản lý sinh viên</a>
            <a href="courses/index.php" class="card courses">Quản lý khóa học</a>
            <a href="enrollments/index.php" class="card enrollments">Quản lý đăng ký học</a>
        </div>
    </div>
</body>
</html>