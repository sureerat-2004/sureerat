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
<h1>สุรีรัตน์ เกษกัน (เตย)</h1>
<?php
	echo $_SESSION['nane'] = "สุรีรัตน์ เกษกัน";
	echo $_SESSION['nickname'] = "เตย";
	echo $_SESSION['p1'] = "โซฟา";
	echo $_SESSION['p2'] = "ห่วงยาง";
	
?>
</body>
</html>