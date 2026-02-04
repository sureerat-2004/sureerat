<?php
	include_once("check_login.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จัดการออเดอร์- สุรีรัตน์</title>
</head>

<body>

<h1>จัดการออเดอร์ - สุรีรัตน์</h1>

<?php echo "แอดมิน:".$_SESSION['aname']; ?>

<ul>
	<a href="products.php"><li>จัดการสินค้า</li></a>
    <a href="orders.php"><li>จัดการออเดอร์</li></a>
    <a href="customers.php"><li>จัดการลูกค้า</li></a>
    <a href="logout.php"><li>ออกจากระบบ</li></a>
</ul>
</body>
</html>