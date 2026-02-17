<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน (เตย)</title>
</head>

<body>

<h1>งาน i --สุรีรัตน์ เกษกัน (เตย)</h1>

<form method="post" action="" enctype="mulipart/form-data">
    ชื่อจังหวัด <input type="text" name="rname" autofocus required><br> รูปภาพ <input type="file" name="pimage" requird><br>
    <button type="submit" name="Submit">บันทึก</button>

    ภาค
    <select name="rid">
    <?php
include_once("connectdb.php");
$sql3 = "SELECT * FROM `r_regions`";
$rs3 = mysqli_query($conn, $sql3);
while ($data3 = mysqli_fetch_array($rs3)){
?>
        <option value="<td><?php echo $data3['r_id'];?></td>"><?php echo $data3['r_name'];?></option>
<?php } ?>
    </select>
</form><br><br>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");
    $rname = $_POST['pname'];
    $ext = pathinfo($_FILES['pimage']['name'],PATHINFO_EXTENSION);
    $rid = $_POST['rid'];

    $sql2= "INSERT INTO `r_regions` (`r_id`, `r_name`) VALUES (NULL,'{$pname}' ,'{$ext}' ,'{$rid}')";
    mysqli_query($conn, $sql2) or die ('เพิ่มข้อมูลไม่ได้');
    $qid = mysqli_insert_id($conn);
    copy($_FILES['pimage']['tmp_name'],"images/".$qid.".".$ext);
}
?>
<table border="1">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจัวหวัด</th>
        <th>ชื่อภาค</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM `provinces`";
$rs = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($rs)){

?>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM `provinces`AS p INNER JOIN `regions` AS r ON p.r_id=r.r_id";
$rs = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['p_id'];?></td>
        <td><?php echo $data['p_name'];?></td>
        <td><?php echo $data['xxx'];?></td>
        <td><img src="images/<?php echo $data['p_id'];?>.<?php echo $data['p_exp'];?>"width="140"></td>
        <td width="80" align="center"><a href="delete_regions.php?id=<img src=<?php echo $data['p_id'];?>$ext=<<?php echo $data['p_ext'];?>' onClick="return confirm('ยืนยันการลบ?');"><img src="images/delete.jpg"width="20"></a></td>
    </tr>
<?php } ?>
</tadle>
</body>
</html>
 
<?php
 mysqli_close($conn)
?>