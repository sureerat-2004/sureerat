<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สุรีรัตน์ เกษกัน เตย</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Sarabun', sans-serif; /* แนะนำให้ใช้ฟอนต์ที่อ่านง่าย */
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .table img {
            border-radius: 5px;
            object-fit: cover;
        }
    </style>
</head>

<body>

<div class="container">
    <h1 class="text-center mb-4 text-primary">สุรีรัตน์ เกษกัน เตย</h1>
    <hr>

    <div class="table-responsive">
        <table id="productTable" class="table table-striped table-hover table-bordered" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>ชื่อสินค้า</th>
                    <th>ประเภทสินค้า</th>
                    <th>วันที่</th>
                    <th>ประเทศ</th>
                    <th>จำนวนเงิน</th>
                    <th>รูปภาพ</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // ตรวจสอบว่าไฟล์ connectdb.php มีอยู่จริง
            if(file_exists("connectdb.php")){
                include_once("connectdb.php");
                
                // ตรวจสอบการเชื่อมต่อก่อน query
                if(isset($conn)){
                    $sql = "SELECT * FROM `popsupermarket`";
                    $rs = mysqli_query($conn, $sql);

                    if($rs){
                        while ($data = mysqli_fetch_array($rs)){
            ?>
                <tr>
                    <td><?php echo $data['p_order_id'];?></td>
                    <td><?php echo $data['p_product_name'];?></td>
                    <td><?php echo $data['p_category'];?></td>
                    <td><?php echo $data['p_date'];?></td>
                    <td><?php echo $data['p_country'];?></td>
                    <td class="text-end"><?php echo number_format($data['p_amount'], 0);?></td>
                    <td class="text-center">
                        <img src="<?php echo $data['p_product_name'];?>.jpg" width="55" class="img-thumbnail" alt="สินค้า">
                    </td>
                </tr>
            <?php 
                        }
                    } 
                    mysqli_close($conn);
                }
            } else {
                echo "<tr><td colspan='7' class='text-center text-danger'>ไม่พบไฟล์ connectdb.php</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            // ตั้งค่าภาษาไทย
            "language": {
                "lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
                "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                "search": "ค้นหา:",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            }
        });
    });
</script>

</body>
</html>