<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
<style>
    /* จัดการให้ฟอร์มแสดงผลเรียงกันในบรรทัดเดียวตามรูปภาพ */
    .form-inline {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }
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

<hr>

<?php
if(isset($_POST['Submit'])){
    include_once("conectdb.php");
    
    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // บันทึกลงฐานข้อมูล
    $sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql2) or die ("บันทึกข้อมูลไม่สำเร็จ");

    $pid = mysqli_insert_id($conn);
    
    // ตรวจสอบและสร้างโฟลเดอร์ images หากยังไม่มี
    if (!file_exists('images')) {
        mkdir('images', 0777, true);
    }
    
    // ย้ายไฟล์รูปภาพ
    move_uploaded_file($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);
    
    // Refresh หน้าเพื่อให้ข้อมูลอัปเดต
    echo "<script>window.location.href=window.location.href;</script>";
}
?>

<table border="1" cellpadding="5" cellspacing="0">
    <tr bgcolor="#eeeeee">
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูปจังหวัด</th>
        <th>ลบ</th>
    </tr>
    <?php
    include_once("conectdb.php");
    // ใช้ INNER JOIN เพื่อดึงชื่อภาคมาโชว์
    $sql = "SELECT * FROM `provinces` AS p INNER JOIN `regions` AS r ON p.r_id = r.r_id";
    $rs = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($rs)){
    ?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td align="center">
            <?php 
            $image_path = "images/".$data['p_id'].".".$data['p_ext'];
            if(file_exists($image_path)){
            ?>
                <img src="<?php echo $image_path; ?>" width="80">
            <?php } else { echo "ไม่มีรูป"; } ?>
        </td>
        <td width="80" align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext'];?>" onClick="return confirm('ยืนยันการลบ?');">
                <img src="img/delete.jpg" width="30" alt="ลบ">
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
<?php
mysqli_close($conn);
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>

<h1>66010914015 ภาคภูมิ วรรณชัย (แมนนนน)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด<input type="text" name="pname" autofocus require><br>
    รูปประจำจังหวัด<input type="file" name="pimage" require><br>
    ภาค
    <select name="rid">
    <?php
include_once("conectdb.php");
$sql3 = "SELECT * FROM regions";
$rs3 = mysqli_query($conn,$sql3);
while ($data3 = mysqli_fetch_array($rs3)){

?>
        <option value="<?php echo $data3['r_id']; ?>"><?php echo $data3['r_name']; ?></option>
<?php } ?>
</SELECT>
<br>
    <button type="submit" name="Submit">บันทึก</button>

</form><br><br>

<?php
if(isset($_POST['Submit'])){
    include_once("conectdb.php");
    

    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    $sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn,$sql2) or die ("ไม่ได้");

    //var_dump($sql2);exit;
    $pid = mysqli_insert_id($conn);
    //copy($_FILES['pimage']['tmp_name'],"img/".$pid.".".$ext);
    move_uploaded_file($_FILES['pimage']['tmp_name'],"img/".$pid.".".$ext);
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
$sql = "SELECT * FROM `provinces`";
$rs = mysqli_query($conn,$sql);
while ($data = mysqli_fetch_array($rs)){
    
?>
<?php
    include_once("conectdb.php");
    $sql = "SELECT * FROM `provinces` AS p INNER JOIN `regions` AS r ON p.r_id = r.r_id";
    $rs = mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($rs)){

?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td><img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="80"></td>
        <td width="80" align="center"><a href="delete_province.php?id=<?php echo $data['p_id']; ?>$ext=<?php echo $data['p_ext'];?>"onClick="return confirm('ยืนยันการลบ?');"><img src="img/delete.jpg" width="80"></a></td>
    </tr>
<?php } ?>
</table>
</body>
</html>
<?php
mysqli_close($conn);
?>
<?php } ?>
