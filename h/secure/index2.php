<?php
	session_start();
	if(empty($_SESSION['aid'])){
		echo "<div style='text-align:center; margin-top:50px;'>";
		echo "<h3>Access Denied! กำลังกลับไปหน้าล็อกอิน...</h3>";
		echo "</div>";
		echo "<meta http-equiv='refresh' content='2; url=index.php'>";
		exit;
	}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลักแอดมิน - สุรีรัตน์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #fff5f8;
        }
        .navbar {
            background-color: #ec407a !important; /* ชมพูเข้ม */
        }
        .sidebar-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .list-group-item {
            border: none;
            padding: 15px 20px;
            transition: all 0.3s;
            color: #555;
        }
        .list-group-item:hover {
            background-color: #fce4ec;
            color: #ec407a;
            padding-left: 30px;
        }
        .list-group-item.active-logout {
            color: #dc3545;
        }
        .list-group-item.active-logout:hover {
            background-color: #fff5f5;
        }
        .admin-badge {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        i {
            margin-right: 10px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark sticky-top shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-speedometer2"></i> Admin Panel
        </a>
        <div class="text-white admin-badge">
            <i class="bi bi-person-circle"></i> แอดมิน: <?php echo $_SESSION['aname']; ?>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-secondary">สุรีรัตน์ เกษกัน <span class="text-pink" style="color:#ec407a;">(เตย)</span></h2>
                <p class="text-muted">ยินดีต้อนรับสู่ระบบจัดการหลังบ้าน</p>
            </div>

            <div class="card sidebar-card overflow-hidden">
                <div class="list-group list-group-flush">
                    <a href="products.php" class="list-group-item list-group-item-action">
                        <i class="bi bi-box-seam text-primary"></i> จัดการสินค้า
                    </a>
                    <a href="orders.php" class="list-group-item list-group-item-action">
                        <i class="bi bi-cart-check text-success"></i> จัดการออเดอร์
                    </a>
                    <a href="customers.php" class="list-group-item list-group-item-action">
                        <i class="bi bi-people text-info"></i> จัดการลูกค้า
                    </a>
                    <hr class="m-0 text-muted opacity-10">
                    <a href="logout.php" class="list-group-item list-group-item-action active-logout text-danger" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                        <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
                    </a>
                </div>
            </div>

            <div class="text-center mt-5">
                <small class="text-muted">&copy; 2024 Sureerat Admin System</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>