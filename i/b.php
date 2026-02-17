<?php
include_once("conectdb.php"); // เชื่อมต่อฐานข้อมูลครั้งเดียวที่ด้านบนสุด

// ส่วนของการบันทึกข้อมูล
if(isset($_POST['Submit'])){
    $pname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $rid = $_POST['rid'];
    
    // บันทึกข้อมูลลงตาราง provinces
    $sql2 = "INSERT INTO `provinces` (`p_id`, `p_name`, `p_ext`, `r_id`) VALUES (NULL, '{$pname}', '{$ext}', '{$rid}')";
    mysqli_query($conn, $sql2) or die ("บันทึกข้อมูลไม่ได้: " . mysqli_error($conn));

    $pid = mysqli_insert_id($conn);
    // อัปโหลดไฟล์ไปที่โฟลเดอร์ images/
    move_uploaded_file($_FILES['pimage']['tmp_name'], "images/".$pid.".".$ext);
    
    // Refresh หน้าเพื่อให้ข้อมูลล่าสุดปรากฏ
    echo "<script>window.location.href='index.php';</script>";
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
<style>
    table { width: 80%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; text-align: center; }
</style>
</head>

<body>

<h1>งาน i --สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด: <input type="text" name="pname" autofocus required><br><br>
    รูปประจำจังหวัด: <input type="file" name="pimage" required><br><br>
    ภาค: 
    <select name="rid">
    <?php
    // ดึงข้อมูลภาคจากตาราง regions มาทำ Dropdown
    $sql3 = "SELECT * FROM `regions` ORDER BY r_id ASC";
    $rs3 = mysqli_query($conn, $sql3);
    while ($data3 = mysqli_fetch_array($rs3)){
    ?>
        <option value="<?php echo $data3['r_id']; ?>"><?php echo $data3['r_name']; ?></option>
    <?php } ?>
    </select>
    <br><br>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<hr>

<table border="1">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูปจังหวัด</th>
        <th>ลบ</th>
    </tr>
<?php
    // ดึงข้อมูลโดยการ Join ตาราง provinces กับ regions
    $sql = "SELECT p.*, r.r_name FROM `provinces` AS p 
            INNER JOIN `regions` AS r ON p.r_id = r.r_id 
            ORDER BY p.p_id DESC";
    $rs = mysqli_query($conn, $sql);
    
    // ตรวจสอบว่ามีข้อมูลไหม
    if(mysqli_num_rows($rs) > 0){
        while ($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td>
            <?php if(!empty($data['p_ext'])){ ?>
                <img src="images/<?php echo $data['p_id'].".".$data['p_ext']; ?>" width="100">
            <?php } ?>
        </td>
        <td>
            <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext'];?>" onClick="return confirm('ยืนยันการลบ?');">
                <img src="images/delete.jpg" width="40">
            </a>
        </td>
    </tr>
<?php 
        } 
    } else {
        echo "<tr><td colspan='5'>ยังไม่มีข้อมูลจังหวัด</td></tr>";
    }
?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>