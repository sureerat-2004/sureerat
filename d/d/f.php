<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปข้อมูลผู้สมัคร - Tech Vision Solutions</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f2f5;
        }
        .profile-header {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .cover-bg {
            height: 120px;
            background: linear-gradient(90deg, #0d6efd 0%, #0dcaf0 100%);
        }
        .profile-img-container {
            margin-top: -60px;
            margin-left: 30px;
            display: inline-block;
            position: relative;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            background-color: #eee;
        }
        .section-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.03);
        }
        .label-text {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .value-text {
            font-weight: 500;
            color: #212529;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

<div class="container py-5">
    
    <?php
    // ตรวจสอบว่ามีการกดปุ่มส่งข้อมูลมาหรือไม่
    if(isset($_POST['submit_app'])){
        
        // --- 1. รับค่าตัวแปร String ---
        $position = htmlspecialchars($_POST['position']);
        $salary = htmlspecialchars($_POST['salary']);
        
        $prefix = $_POST['prefix'];
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $fullname = "$prefix $firstname $lastname";
        
        $birthday = $_POST['birthday'];
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $address = nl2br(htmlspecialchars($_POST['address'])); // nl2br เพื่อเว้นบรรทัด
        
        $edu_level = $_POST['education_level'];
        $gpa = htmlspecialchars($_POST['gpa']);
        $skills = nl2br(htmlspecialchars($_POST['skills']));
        $experience = nl2br(htmlspecialchars($_POST['experience']));

        // คำนวณอายุ
        $dob = new DateTime($birthday);
        $now = new DateTime();
        $age = $now->diff($dob)->y;
        $formatted_dob = $dob->format('d/m/Y');

        // --- 2. จัดการไฟล์อัปโหลด (Files) ---
        // ตรวจสอบรูปถ่าย
        $photo_show = "https://via.placeholder.com/150?text=No+Photo"; // รูป Default
        if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
            // ในการใช้งานจริงต้องย้ายไฟล์ด้วย move_uploaded_file()
            // ตัวอย่างนี้เราจะอ่านข้อมูลชั่วคราวมาแสดงผลเป็น Base64 เพื่อให้เห็นภาพทันทีโดยไม่ต้องสร้างโฟลเดอร์จริง
            $photo_data = file_get_contents($_FILES['photo']['tmp_name']);
            $photo_base64 = base64_encode($photo_data);
            $photo_show = 'data:image/jpeg;base64,' . $photo_base64;
        }

        // ตรวจสอบ Resume
        $resume_name = "ไม่ได้แนบไฟล์";
        if(isset($_FILES['resume']) && $_FILES['resume']['error'] == 0){
            $resume_name = $_FILES['resume']['name'];
        }

    ?>

    <div class="profile-header mb-4">
        <div class="cover-bg"></div>
        <div class="d-flex align-items-end pb-4">
            <div class="profile-img-container">
                <img src="<?php echo $photo_show; ?>" class="profile-img" alt="Profile Picture">
            </div>
            <div class="ms-3 mb-1">
                <h2 class="mb-0 fw-bold"><?php echo $fullname; ?></h2>
                <span class="badge bg-primary fs-6 mt-1"><?php echo $position; ?></span>
                <span class="text-muted ms-2"><i class="bi bi-geo-alt"></i> ผู้สมัครงานใหม่</span>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="section-card">
                <h5 class="mb-3 text-primary"><i class="bi bi-person-badge"></i> ข้อมูลส่วนตัว</h5>
                
                <div class="label-text">วันเดือนปีเกิด (อายุ)</div>
                <div class="value-text"><?php echo "$formatted_dob ($age ปี)"; ?></div>

                <div class="label-text">เบอร์โทรศัพท์</div>
                <div class="value-text"><?php echo $phone; ?></div>

                <div class="label-text">อีเมล</div>
                <div class="value-text"><?php echo $email; ?></div>

                <div class="label-text">ที่อยู่</div>
                <div class="value-text"><?php echo $address; ?></div>

                <div class="label-text">เงินเดือนที่คาดหวัง</div>
                <div class="value-text text-success fw-bold"><?php echo number_format((float)$salary); ?> บาท</div>
                
                <hr>
                <h5 class="mb-3 text-primary"><i class="bi bi-paperclip"></i> เอกสารแนบ</h5>
                <div class="alert alert-light border">
                    <i class="bi bi-file-earmark-pdf text-danger"></i> 
                    Resume: <strong><?php echo $resume_name; ?></strong>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="section-card">
                
                <h5 class="mb-3 text-primary border-bottom pb-2"><i class="bi bi-mortarboard"></i> การศึกษา</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="label-text">ระดับการศึกษา</div>
                        <div class="value-text"><?php echo $edu_level; ?></div>
                    </div>
                    <div class="col-md-6">
                        <div class="label-text">เกรดเฉลี่ย (GPA)</div>
                        <div class="value-text"><?php echo ($gpa) ? $gpa : "-"; ?></div>
                    </div>
                </div>

                <h5 class="mb-3 mt-2 text-primary border-bottom pb-2"><i class="bi bi-briefcase"></i> ประสบการณ์ทำงาน</h5>
                <div class="p-3 bg-light rounded mb-3">
                    <?php echo ($experience) ? $experience : "<em>ไม่มีข้อมูล</em>"; ?>
                </div>

                <h5 class="mb-3 text-primary border-bottom pb-2"><i class="bi bi-stars"></i> ความสามารถพิเศษ / ทักษะ</h5>
                <div class="p-3 bg-light rounded">
                    <?php echo ($skills) ? $skills : "<em>ไม่มีข้อมูล</em>"; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <button class="btn btn-secondary px-4" onclick="window.history.back();"><i class="bi bi-arrow-left"></i> กลับไปแก้ไขข้อมูล</button>
        <button class="btn btn-success px-4" onclick="window.print();"><i class="bi bi-printer"></i> พิมพ์ใบสมัคร</button>
    </div>

    <?php 
    } else {
        // กรณีเปิดไฟล์ f.php ตรงๆ โดยไม่ได้ส่งฟอร์ม
    ?>
        <div class="alert alert-warning text-center mt-5" role="alert">
            <h4 class="alert-heading">ไม่พบข้อมูล!</h4>
            <p>กรุณากรอกข้อมูลผ่านแบบฟอร์มใบสมัครก่อน</p>
            <hr>
            <a href="form.php" class="btn btn-warning">ไปที่หน้าแบบฟอร์ม</a>
        </div>
    <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>