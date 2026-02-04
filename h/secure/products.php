<?php
	include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - สุรีรัตน์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #fff5f8;
        }
        .navbar {
            background-color: #ec407a !important;
        }
        .sidebar {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 10px;
        }
        .nav-link {
            color: #555;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.3s;
        }
        .nav-link:hover {
            background-color: #fce4ec;
            color: #ec407a;
        }
        .nav-link.active {
            background-color: #f06292 !important;
            color: white !important;
        }
        .content-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn-pink {
            background-color: #f06292;
            color: white;
        }
        .btn-pink:hover {
            background-color: #ec407a;
            color: white;
        }
        .table thead {
            background-color: #fce4ec;
            color: #ec407a;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">
            <i class="bi bi-shop"></i> S_Admin Panel
        </a>
        <span class="navbar-text text-white">
            <i class="bi bi-person-circle"></i> แอดมิน: <?php echo $_SESSION['aname']; ?>
        </span>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link" href="index2.php"><i class="bi bi-house-door"></i> หน้าแรก</a>
                    <a class="nav-link active" href="products.php"><i class="bi bi-box-seam"></i> จัดการสินค้า</a>
                    <a class="nav-link" href="orders.php"><i class="bi bi-cart-check"></i> จัดการออเดอร์</a>
                    <a class="nav-link" href="customers.php"><i class="bi bi-people"></i> จัดการลูกค้า</a>
                    <hr>
                    <a class="nav-link text-danger" href="logout.php" onclick="return confirm('ต้องการออกจากระบบ?')">
                        <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
                    </a>
                </nav>
            </div>
        </div>

        <div class="col-md-9">
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0 text-secondary">รายการสินค้าทั้งหมด</h3>
                    <a href="product_add.php" class="btn btn-pink"><i class="bi bi-plus-circle"></i> เพิ่มสินค้าใหม่</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="80">รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>หมวดหมู่</th>
                                <th class="text-end">ราคา</th>
                                <th class="text-center">สต็อก</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" class="product-img" alt="product"></td>
                                <td><strong>ครีมบำรุงผิวสูตรอ่อนโยน</strong></td>
                                <td><span class="badge bg-light text-dark">สกินแคร์</span></td>
                                <td class="text-end">350.00</td>
                                <td class="text-center">24</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm" onclick="return confirm('ยืนยันการลบ?')"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" class="product-img" alt="product"></td>
                                <td><strong>ลิปสติกโทนชมพูพีช</strong></td>