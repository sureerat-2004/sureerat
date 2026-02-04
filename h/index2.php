<?php
	session_start();
	if(empty($_SESSION['aid'])){
		echo "Access Denied";
		echo "<meta http-equiv='refresh' content='3; url=index.php'>";
		exit;
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>หน้าหลักแอดมิน - สุรีรัตน์</title>
</head>

<body>

<h1>สุรีรัตน์ เกษกัน (เตย)</h1>

<?php echo "แอดมิน:".$_SESSION['aname']; ?>

<ul>
	<a href="products.php"><li>จัดการสินค้า</li></a>
    <a href="orders.php"><li>จัดการออเดอร์</li></a>
    <a href="customers.php"><li>จัดการลูกค้า</li></a>
    <a href="logout.php"><li>ออกจากระบบ</li></a>
</ul>
</body>
</html>