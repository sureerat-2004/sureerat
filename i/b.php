<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
<style>
    /* ปรับแต่ง Dropdown ให้มีขอบมนตามรูปตัวอย่าง */
    select {
        border-radius: 5px;
        border: 1px solid #000;
        padding: 2px;
    }
</style>
</head>
<body>

<h1>สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
    รูปประจำจังหวัด <input type="file" name="pimage" required><br>
    ภาค 
    <select name="rid">
    <?php
    include_once("conectdb.php");
    $sql3 = "SELECT * FROM regions";
    $rs3 = mysqli_query($conn, $sql3);
    while ($data3 = mysqli_fetch_array($rs3)) {
    ?>
        <option value="<?php echo $data3['r_id']; ?>"><?php echo $data3['r_name']; ?></option>
    <?php } // ปิด loop เลือกภาค ?>
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
    
    // บันทึกข้อมูล (NULL คือ p_id ที่เป็น Auto Increment)
    $sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql2) or die ("บันทึกไม่ได้: " . mysqli_error($conn));

    $pid = mysqli_insert_id($conn);
    
    // อัปโหลดไฟล์ไปที่โฟลเดอร์ img/ (เช็คชื่อโฟลเดอร์ให้ตรงกับที่มีจริง)
    move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pid.".".$ext);
    
    // Refresh หน้าเพื่อให้ข้อมูลในตารางอัปเดต
    echo "<script>window.location.href=window.location.href;</script>";
}
?>

<table border="1">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูปจังหวัด</th>
        <th>ลบ</th>
    </tr>
<?php
    include_once("conectdb.php");
    // ใช้ INNER JOIN เพื่อดึงชื่อภาค (r_name) มาแสดงแทนไอดี
    $sql = "SELECT * FROM `provinces` AS p INNER JOIN `regions` AS r ON p.r_id = r.r_id";
    $rs = mysqli_query($conn, $sql);
    
    // เริ่มต้น Loop แสดงข้อมูลในตารางเพียงรอบเดียว
    while ($data = mysqli_fetch_array($rs)) {
?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td><img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="80"></td>
        <td width="80" align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext'];?>" onClick="return confirm('ยืนยันการลบ?');">
                <img src="img/delete.jpg" width="30">
            </a>
        </td>
    </tr>
<?php } // ปิด loop แสดงตาราง ?>
</table>

<?php mysqli_close($conn); ?>
</body>
</html>