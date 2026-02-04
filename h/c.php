<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
</head>

<body>
<h1>c.php</h1>
<?php
	echo $_SESSION['nane'] ."<br>";
	echo $_SESSION['nickname']  ."<br>";
	echo $_SESSION['p1'] ."<br>";
	echo $_SESSION['p2'] ."<br>";
?>
</body>
</html>