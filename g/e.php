<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน เตย</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* จัดหน้าให้ดูกระชับ */
    .container { display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 20px; }
    .chart-box { width: 45%; min-width: 300px; border: 1px solid #ddd; padding: 10px; }
</style>
</head>

<body>
<h1>สุรีรัตน์ เกษกัน เตย</h1>

<div class="container">
    <div class="chart-box">
        <canvas id="myBarChart"></canvas>
    </div>
    <div class="chart-box">
        <canvas id="myPieChart"></canvas>
    </div>
</div>

<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>ประเทศ</th>
    <th>ยอดขาย</th>
</tr>
<?php
include_once("connectdb.php");
$sql = "SELECT `p_country`, SUM(`p_amount`) AS total FROM `popsupermarket` GROUP BY `p_country`";
$rs = mysqli_query($conn, $sql);

// ตัวแปรสำหรับเก็บข้อมูลไปทำกราฟ
$labels = [];
$data_chart = [];

while ($data = mysqli_fetch_array($rs)){
    // เก็บข้อมูลลง Array สำหรับกราฟ (ใช้ค่าดิบ ไม่เอา number_format)
    $labels[] = $data['p_country']; 
    $data_chart[] = $data['total']; 
?>
<tr>
    <td><?php echo $data['p_country'];?></td>
    <td align="right"><?php echo number_format($data['total'], 0);?></td>
</tr>
<?php 
}
mysqli_close($conn);
?>
</table>

<script>
    // รับค่าจาก PHP
    const labels = <?php echo json_encode($labels); ?>;
    const dataPoints = <?php echo json_encode($data_chart); ?>;
    
    // กำหนดสีพื้นฐานให้สวยงาม
    const bgColors = [
        'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 
        'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'
    ];

    // สร้าง Bar Chart
    new Chart(document.getElementById('myBarChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายรายประเทศ (Bar)',
                data: dataPoints,
                backgroundColor: bgColors,
                borderWidth: 1
            }]
        }
    });

    // สร้าง Pie Chart
    new Chart(document.getElementById('myPieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'สัดส่วนยอดขาย (Pie)',
                data: dataPoints,
                backgroundColor: bgColors,
                hoverOffset: 4
            }]
        }
    });
</script>

</body>
</html>