<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>จัดการข้อมูลจังหวัด - สุรีรัตน์ เกษกัน</title>
</head>
<body>

<h1>สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด: <input type="text" name="pname" autofocus required><br><br>
    รูปประจำจังหวัด: <input type="file" name="pimage" required><br><br>
    ภาค: 
    <select name="rid">
        <?php
        include_once("conectdb.php");
        $sql_reg = "SELECT * FROM regions";
        $rs_reg = mysqli_query($conn, $sql_reg);
        while ($data_reg = mysqli_fetch_array($rs_reg)){
        ?>
            <option value="<?php echo $data_reg['r_id']; ?>"><?php echo $data_reg['r_name']; ?></option>
        <?php } ?>
    </select>
    <br><br>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<hr>

<?php
// ส่วนของการบันทึกข้อมูล
if(isset($_POST['Submit'])){
    $pname = $_POST['pname'];
    $rid = $_POST['rid'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    
    // ตรวจสอบชื่อ Column ใน Table provinces ของคุณอีกครั้ง (p_name, p_ext, r_id)
    $sql_insert = "INSERT INTO `provinces` (`p_id`, `p_name`, `p_ext`, `r_id`) VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    
    if(mysqli_query($conn, $sql_insert)){
        $pid = mysqli_insert_id($conn);
        // บันทึกไฟล์ลง Folder images/
        move_uploaded_file($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location='your_filename.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
?>

<table border="1" width="80%">
    <tr bgcolor="#f2f2f2">
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูปจังหวัด</th>
        <th>ลบ</th>
    </tr>
    <?php
    // ดึงข้อมูลจังหวัด Join กับ ภาค เพื่อเอาชื่อภาคมาโชว์
    $sql_list = "SELECT p.*, r.r_name FROM `provinces` AS p 
                 INNER JOIN `regions` AS r ON p.r_id = r.r_id 
                 ORDER BY p.p_id DESC";
    $rs_list = mysqli_query($conn, $sql_list);
    
    while ($row = mysqli_fetch_array($rs_list)){
        $img_path = "images/" . $row['p_id'] . "." . $row['p_ext'];
    ?>
    <tr>
        <td align="center"><?php echo $row['p_id']; ?></td>
        <td><?php echo $row['p_name']; ?></td>
        <td><?php echo $row['r_name']; ?></td>
        <td align="center">
            <?php if(file_exists($img_path)){ ?>
                <img src="<?php echo $img_path; ?>" width="100">
            <?php } else { echo "ไม่มีรูป"; } ?>
        </td>
        <td align="center">
            <a href="delete_province.php?id=<?php echo $row['p_id']; ?>&ext=<?php echo $row['p_ext'];?>" 
               onClick="return confirm('ยืนยันการลบ?');">
               ลบ
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