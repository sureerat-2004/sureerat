<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>สุรีรัตน์ เกษกัน (เตย)</title>
    <style>
        /* เพิ่ม CSS เล็กน้อยเพื่อให้หน้าตาใกล้เคียงรูปตัวอย่าง */
        table { border-collapse: collapse; width: 80%; }
        th, td { padding: 10px; text-align: left; }
        .form-inline { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>

<h1>สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="multipart/form-data" class="form-inline">
    ชื่อจังหวัด <input type="text" name="pname" autofocus required> 
    รูปภาพ <input type="file" name="pimage" required> 
    ภาค 
    <select name="rid">
        <option value="">-- เลือกภาค --</option>
        <?php
        include_once("conectdb.php");
        $sql3 = "SELECT * FROM regions";
        $rs3 = mysqli_query($conn, $sql3);
        while ($data3 = mysqli_fetch_array($rs3)){
        ?>
            <option value="<?php echo $data3['r_id']; ?>"><?php echo $data3['r_name']; ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<?php
if(isset($_POST['Submit'])){
    include_once("conectdb.php");
    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // ตรวจสอบชื่อคอลัมน์ในฐานข้อมูลของคุณ (p_id, p_name, p_ext, r_id)
    $sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql2) or die ("บันทึกข้อมูลไม่ได้: " . mysqli_error($conn));

    $pid = mysqli_insert_id($conn);
    // ตรวจสอบว่ามีโฟลเดอร์ชื่อ images อยู่จริง
    move_uploaded_file($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);
    
    // Refresh หน้าเพื่อให้ข้อมูลอัปเดต
    echo "<script>window.location.href=window.location.href;</script>";
}
?>

<table border="1">
    <tr bgcolor="#f9f9f9">
        <th>Province ID</th>
        <th>Province Name</th>
        <th>Province Picture</th>
        <th>Delete</th>
    </tr>
<?php
    include_once("conectdb.php");
    // ใช้ INNER JOIN เพื่อดึงชื่อภาคมาแสดง
    $sql = "SELECT * FROM `provinces` AS p INNER JOIN `regions` AS r ON p.r_id = r.r_id ORDER BY p.p_id DESC";
    $rs = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($rs)){
        $image_name = "images/" . $data['p_id'] . "." . $data['p_ext'];
?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td>
            <?php if(file_exists($image_name)){ ?>
                <img src="<?php echo $image_name; ?>" width="150">
            <?php } else { echo "ไม่มีรูปภาพ"; } ?>
        </td>
        <td align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext'];?>" onClick="return confirm('ยืนยันการลบ?');">
                <img src="img/delete_icon.png" width="30" alt="ลบ"> </a>
        </td>
    </tr>
<?php } ?>
</table>

</body>
</html>
<?php
mysqli_close($conn);
?>