<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
<style>
    /* ปรับแต่งช่อง Select ให้ดูหนาขึ้นตามรูปภาพ */
    select {
        border: 2px solid #000;
        border-radius: 5px;
        padding: 2px;
    }
</style>
</head>
<body>

<h1>6สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
    
    รูปประจำจังหวัด <input type="file" name="pimage" required><br>
    
    ภาค 
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

<br><hr><br>

<?php
if(isset($_POST['Submit'])){
    include_once("conectdb.php");

    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // บันทึกข้อมูล
    $sql2 = "INSERT INTO `provinces` VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql2) or die ("บันทึกข้อมูลไม่สำเร็จ");

    $pid = mysqli_insert_id($conn);
    
    // อัปโหลดไฟล์ไปที่โฟลเดอร์ img/
    move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pid.".".$ext);
    
    // Refresh หน้าเพื่อให้ข้อมูลแสดงทันที
    echo "<script>window.location.href=window.location.href;</script>";
}
?>

<table border="1" cellpadding="5" cellspacing="0">
    <tr bgcolor="#f4f4f4">
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูปจังหวัด</th>
        <th>ลบ</th>
    </tr>
    <?php
    include_once("conectdb.php");
    // ใช้ INNER JOIN เพื่อดึงชื่อภาคจากตาราง regions
    $sql = "SELECT * FROM `provinces` AS p INNER JOIN `regions` AS r ON p.r_id = r.r_id";
    $rs = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($rs)){
    ?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td align="center">
            <img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="80">
        </td>
        <td width="80" align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext'];?>" onClick="return confirm('ยืนยันการลบ?');">
                <img src="img/delete.jpg" width="80">
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
<?php
mysqli_close($conn);
?>