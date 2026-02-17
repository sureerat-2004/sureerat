<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
<style>
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
    ชื่อจังหวัด: <input type="text" name="pname" autofocus required><br>
    รูปประจำจังหวัด: <input type="file" name="pimage" required><br>
    ภาค: 
    <select name="rid">
    <?php
    include_once("conectdb.php");
    // ดึงข้อมูลจากฐานข้อมูล r_regions มาแสดงใน Dropdown
    $sql_reg = "SELECT * FROM r_regions";
    $rs_reg = mysqli_query($conn, $sql_reg);
    while ($data_reg = mysqli_fetch_array($rs_reg)){
    ?>
        <option value="<?php echo $data_reg['r_id']; ?>"><?php echo $data_reg['r_name']; ?></option>
    <?php } ?>
    </select>
    <br>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><br>

<?php
if(isset($_POST['Submit'])){
    $pname = $_POST['pname'];
    $rid = $_POST['rid'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    
    // บันทึกลงตาราง provinces (เรียงตามโครงสร้าง: id, ชื่อ, นามสกุลไฟล์, รหัสภาค)
    $sql_ins = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql_ins) or die ("บันทึกข้อมูลไม่ได้");

    $pid = mysqli_insert_id($conn);
    // ตรวจสอบโฟลเดอร์ปลายทางว่าชื่อ images หรือ img (แก้ให้ตรงกับตอนแสดงผล)
    move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pid.".".$ext);
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
    // ใช้ INNER JOIN เพื่อดึงชื่อภาคจากตาราง r_regions มาแสดง
    $sql_list = "SELECT * FROM `provinces` AS p INNER JOIN `r_regions` AS r ON p.r_id = r.r_id";
    $rs_list = mysqli_query($conn, $sql_list);
    while ($data = mysqli_fetch_array($rs_list)){
?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td><img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="80"></td>
        <td width="80" align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext'];?>" onClick="return confirm('ยืนยันการลบ?');">
                <img src="images/delete.jpg" width="30">
            </a>
        </td>
    </tr>
<?php } ?>
</table>

<?php mysqli_close($conn); ?>
</body>
</html>