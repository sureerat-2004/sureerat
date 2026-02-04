<?php
	session_start();
	unset ($_SESSION['aid'] );
	unset ($_SESSION['aname'] );
	
		echo "<script>" ;
        echo "alert('Username หรือ Password ไม่ถูกต้อง');";
        echo "</script>";
		
		
?>