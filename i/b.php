<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
</head>

<body>

<h1>งาน i --สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด: <input type="text" name="pname" autofocus required><br>
    รูปประจำจังหวัด: <input type="file" name="pimage" required><br>
    ภาค:
    <select name="rid">
    <?php
    include_once("conectdb.php");
    $sql3 = "SELECT * FROM regions"; 
    $rs3 = mysqli_query($conn, $sql3);
    while ($data3 = mysqli_fetch_array($rs3)){
    ?>
        <option value="<?php echo $data3['r_id']; ?>"><?php echo $data3['r_name']; ?></option>
    <?php } ?>
    </select>
    <br>
    <button type="submit" name="Submit">บันทึก</button>
</form>
<br><br>

<?php
if(isset($_POST['Submit'])){
    include_once("conectdb.php");

    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // บันทึกข้อมูลลงตาราง provinces
    $sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql2) or die ("บันทึกข้อมูลไม่ได้");

    $pid = mysqli_insert_id($conn);
    // อัปโหลดไปยังโฟลเดอร์ images ตามที่ระบุ
    copy($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);
    
    echo "<script>alert('บันทึกสำเร็จ'); window.location.href='?';</script>";
}
?>

<table border="1" width="800">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
<?php
    include_once("conectdb.php");
    // Join กับตาราง r_regions
    $sql = "SELECT * FROM `provinces` AS p INNER JOIN `regions` AS r ON p.r_id = r.r_id ORDER BY p.p_id DESC";
    $rs = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name'];?></td>
        <td><?php echo $data['r_name'];?></td>
        <td><img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="80"></td>
        <td width="80" align="center"><a href="delete_province.php?id=<?php echo $data['p_id']; ?>$ext=<?php echo $data['p_ext'];?>"onClick="return confirm('ยืนยันการลบ?');"><img src="images/delete.jpg" width="80"></a></td>

    </tr>
<?php } ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>