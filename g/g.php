<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุรีรัตน์ เกษกัน เตย</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .chart-container { display: flex; gap: 20px; justify-content: center; margin-bottom: 20px; flex-wrap: wrap; }
    .box { width: 45%; min-width: 320px; border: 1px solid #ccc; padding: 15px; border-radius: 8px; }
    h2 { text-align: center; font-size: 18px; margin-top: 0; }
</style>
</head>

<body>
<h1>สุรีรัตน์ เกษกัน เตย - รายงานยอดขายรายเดือน</h1>

<div class="chart-container">
    <div class="box">
        <h2>แนวโน้มยอดขาย (Bar)</h2>
        <canvas id="barChart"></canvas>
    </div>
    <div class="box">
        <h2>สัดส่วนยอดขาย (Donut)</h2>
        <canvas id="donutChart"></canvas>
    </div>
</div>

<table border="1" cellpadding="5" cellspacing="0" style="margin: 0 auto; width: 50%;">
<tr>
    <th>เดือน</th>
    <th>ยอดขาย</th>
</tr>
<?php
include_once("connectdb.php");
$sql = "SELECT MONTH(p_date) AS Month, SUM(p_amount) AS Total_Sales FROM popsupermarket GROUP BY MONTH(p_date) ORDER BY Month;";
$rs = mysqli_query($conn, $sql);

// เตรียมตัวแปรชื่อเดือนไทย และตัวแปรเก็บข้อมูลกราฟ
$thai_months = [
    1=>"ม.ค.", 2=>"ก.พ.", 3=>"มี.ค.", 4=>"เม.ย.", 5=>"พ.ค.", 6=>"มิ.ย.",
    7=>"ก.ค.", 8=>"ส.ค.", 9=>"ก.ย.", 10=>"ต.ค.", 11=>"พ.ย.", 12=>"ธ.ค."
];
$labels = [];
$data_sales = [];

while ($data = mysqli_fetch_array($rs)){
    // แปลงเลขเดือนเป็นชื่อไทย
    $monthName = $thai_months[$data['Month']]; 
    
    // เก็บใส่ Array ไว้ส่งให้กราฟ
    $labels[] = $monthName;
    $data_sales[] = $data['Total_Sales'];
?>
<tr>
    <td align="center"><?php echo $monthName; ?></td>
    <td align="right"><?php echo number_format($data['Total_Sales'], 0);?></td>
</tr>
<?php 
}
mysqli_close($conn);
?>
</table>

<script>
    // ดึงค่าจาก PHP
    const labels = <?php echo json_encode($labels); ?>;
    const salesData = <?php echo json_encode($data_sales); ?>;
    const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#E7E9ED', '#71B37C'];

    // ตั้งค่ากราฟแท่ง (Bar)
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขาย',
                data: salesData,
                backgroundColor: '#36A2EB',
                borderColor: '#2484C6',
                borderWidth: 1
            }]
        }
    });

    // ตั้งค่ากราฟโดนัท (Doughnut)
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut', // ถ้าอยากได้ Pie ให้เปลี่ยนคำว่า doughnut เป็น pie
        data: {
            labels: labels,
            datasets: [{
                data: salesData,
                backgroundColor: colors,
                hoverOffset: 4
            }]
        }
    });
</script>

</body>
</html>