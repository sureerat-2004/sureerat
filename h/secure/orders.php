<?php
	include_once("check_login.php"); // ไฟล์นี้ควรมี session_start() และเช็คการล็อกอิน
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - สุรีรัตน์</title>
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
        .table thead {
            background-color: #fce4ec;
            color: #ec407a;
        }
        .btn-pink {
            background-color: #f06292;
            color: white;
        }
        .btn-pink:hover {
            background-color: #ec407a;
            color: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">
            <i class="bi bi-box-heart-fill"></i> S_Admin
        </a>
        <span class="navbar-text text-white">
            <i class="bi bi-person-circle"></i> <?php echo $_SESSION['aname']; ?>
        </span>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link" href="index2.php"><i class="bi bi-house-door"></i> หน้าแรก</a>
                    <a class="nav-link" href="products.php"><i class="bi bi-box-seam"></i> จัดการสินค้า</a>
                    <a class="nav-link active" href="orders.php"><i class="bi bi-cart-check"></i> จัดการออเดอร์</a>
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
                    <h3 class="fw-bold mb-0 text-secondary">จัดการออเดอร์</h3>
                    <button class="btn btn-pink btn-sm"><i class="bi bi-printer"></i> พิมพ์รายงาน</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>เลขที่สั่งซื้อ</th>
                                <th>วันที่</th>
                                <th>ลูกค้า</th>
                                <th>ยอดรวม</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-001</td>
                                <td>04 ก.พ. 2569</td>
                                <td>คุณใจดี รักเรียน</td>
                                <td>1,250.00</td>
                                <td><span class="badge rounded-pill bg-warning text-dark">รอดำเนินการ</span></td>
                                <td class="text-center">
                                    <button class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-002</td>
                                <td>04 ก.พ. 2569</td>
                                <td>คุณสมชาย สบายดี</td>
                                <td>850.00</td>
                                <td><span class="badge rounded-pill bg-success">ชำระเงินแล้ว</span></td>
                                <td class="text-center">
                                    <button class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>