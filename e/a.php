<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สุรีรัตน์ เกษกัน เตย</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: 600;
        }
        .color-preview {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 5px;
            text-align: center;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="mb-0"><i class="bi bi-person-lines-fill"></i> ฟอร์มรับข้อมูล</h2>
                        <p class="mb-0 opacity-75">สุรีรัตน์ เกษกัน (เตย) </p>
                    </div>
                    
                    <div class="card-body p-4">
                        <form method="post" action="">
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ระบุชื่อ-สกุล" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="0xx-xxxxxxx" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="height" class="form-label">ส่วนสูง (ซม.) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="height" id="height" min="100" max="200" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="birthday" class="form-label">วันเดือนปีเกิด</label>
                                    <input type="date" class="form-control" name="birthday" id="birthday">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">ที่อยู่</label>
                                <textarea name="address" id="address" class="form-control" rows="3" placeholder="ระบุที่อยู่ปัจจุบัน"></textarea>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="color" class="form-label">สีที่ชอบ</label>
                                    <input type="color" class="form-control form-control-color w-100" name="color" id="color" value="#563d7c" title="Choose your color">
                                </div>
                                <div class="col-md-8">
                                    <label for="major" class="form-label">สาขาวิชา</label>
                                    <select name="major" id="major" class="form-select">
                                        <option value="การบัญชี">การบัญชี</option>
                                        <option value="การตลาด">การตลาด</option>
                                        <option value="การจัดการ">การจัดการ</option>
                                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                <button type="submit" name="Submit" class="btn btn-success px-4">
                                    <i class="bi bi-save"></i> สมัครสมาชิก
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    <i class="bi bi-arrow-counterclockwise"></i> ยกเลิก
                                </button>
                                <button type="button" class="btn btn-outline-primary" onClick="window.location='https://www.msu.ac.th/';">
                                    Go to MSU
                                </button>
                                <button type="button" class="btn btn-outline-warning" onDblClick="alert('จ๊ะเอ๋!');" title="ดับเบิ้ลคลิกฉันสิ">
                                    DblClick Me
                                </button>
                                <button type="button" class="btn btn-outline-info" onMouseOver="alert('จ๊ะเอ๋!');">
                                    MouseOver Me
                                </button>
                                <button type="button" class="btn btn-dark" onClick="window.print();">
                                    <i class="bi bi-printer"></i> พิมพ์
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                <?php
                if(isset($_POST['Submit'])){
                    $fullname = $_POST['fullname'];
                    $phone = $_POST['phone'];
                    $height = $_POST['height'];
                    $address = $_POST['address'];
                    $birthday =$_POST['birthday'];
                    $color = $_POST['color'];
                    $major = $_POST['major'];
                
                    include_once("connectdb.php");

                    $sql = "INSERT INTO register (r_id, r_name, r_phone, r_height, r_address, r_birthday, r_color, r_major) VALUES (NULL, '{$fullname}', '{$phone}', '{$height}', '{$address}', '{$birthday}', '{$color}', '{$major}');";
                    mysqli_query($conn, $sql) or die ("insert ไม่ได้");

                    echo "<script>";
                    echo "alert('บันทึกข้อมูลสำเร็จ');";
                    echo "</script>";
                } 
                ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>