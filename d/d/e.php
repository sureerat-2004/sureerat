<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ใบสมัครงาน - Tech Vision Solutions</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #e9ecef;
        }
        .header-banner {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .form-section-title {
            border-left: 5px solid #0d6efd;
            padding-left: 10px;
            margin-bottom: 20px;
            color: #0a58ca;
            font-weight: 600;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>

    <div class="header-banner text-center">
        <div class="container">
            <h1 class="display-5 fw-bold"><i class="bi bi-building"></i> Tech Vision Solutions</h1>
            <p class="lead">แบบฟอร์มรับสมัครพนักงานใหม่ สุรีรัตน์ เกษกัน</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <form method="post" action="f.php" enctype="multipart/form-data">
                    <div class="card p-4">
                        <div class="card-body">

                            <h4 class="form-section-title">1. ข้อมูลการสมัคร (Application Details)</h4>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="position" class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                                    <select class="form-select" name="position" required>
                                        <option value="" selected disabled>-- กรุณาเลือกตำแหน่ง --</option>
                                        <option value="Full Stack Developer">Full Stack Developer</option>
                                        <option value="System Analyst">System Analyst</option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                        <option value="HR Officer">HR Officer</option>
                                        <option value="Accountant">Accountant (บัญชี)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="salary" class="form-label">เงินเดือนที่คาดหวัง (บาท)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="salary" placeholder="ระบุตัวเลข">
                                        <span class="input-group-text">บาท</span>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-section-title">2. ข้อมูลส่วนตัว (Personal Information)</h4>
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    <label for="prefix" class="form-label">คำนำหน้า</label>
                                    <select class="form-select" name="prefix">
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="firstname" class="form-label">ชื่อ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="lastname" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="birthday" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="birthday" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" placeholder="0xx-xxxxxxx" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">อีเมล <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                                </div>
                                
                                <div class="col-12">
                                    <label for="address" class="form-label">ที่อยู่ปัจจุบัน</label>
                                    <textarea class="form-control" name="address" rows="2"></textarea>
                                </div>
                            </div>

                            <h4 class="form-section-title">3. การศึกษาและทักษะ (Education & Skills)</h4>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="education_level" class="form-label">ระดับการศึกษาสูงสุด</label>
                                    <select class="form-select" name="education_level">
                                        <option value="ต่ำกว่าปริญญาตรี">ต่ำกว่าปริญญาตรี</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="gpa" class="form-label">เกรดเฉลี่ย (GPA)</label>
                                    <input type="number" step="0.01" class="form-control" name="gpa" placeholder="เช่น 3.50">
                                </div>
                                <div class="col-12">
                                    <label for="skills" class="form-label">ความสามารถพิเศษ / ทักษะภาษา / คอมพิวเตอร์</label>
                                    <textarea class="form-control" name="skills" rows="3" placeholder="ระบุทักษะ เช่น ภาษาอังกฤษดีมาก, เขียนโปรแกรม PHP ได้, ใช้ Photoshop เป็น"></textarea>
                                </div>
                            </div>

                            <h4 class="form-section-title">4. ประสบการณ์ทำงาน (Work Experience)</h4>
                            <div class="mb-4">
                                <label for="experience" class="form-label">ประวัติการทำงาน (ระบุบริษัท, ตำแหน่ง, ระยะเวลา)</label>
                                <textarea class="form-control" name="experience" rows="4" placeholder="หากไม่มีประสบการณ์ ให้ระบุว่า 'ไม่มี' หรือระบุการฝึกงาน"></textarea>
                            </div>

                            <h4 class="form-section-title">5. เอกสารแนบ (Attachments)</h4>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="photo" class="form-label">รูปถ่ายหน้าตรง (JPG/PNG)</label>
                                    <input type="file" class="form-control" name="photo" accept="image/*">
                                </div>
                                <div class="col-md-6">
                                    <label for="resume" class="form-label">เรซูเม่ / CV (PDF)</label>
                                    <input type="file" class="form-control" name="resume" accept=".pdf">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-secondary me-md-2">ล้างข้อมูล</button>
                                <button type="submit" name="submit_app" class="btn btn-primary px-5 fw-bold">ส่งใบสมัครงาน</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['submit_app'])){
        // รับค่าจากฟอร์ม
        $pos = htmlspecialchars($_POST['position']);
        $fullname = $_POST['prefix'] . htmlspecialchars($_POST['firstname']) . " " . htmlspecialchars($_POST['lastname']);
        $dob = htmlspecialchars($_POST['birthday']);
        $edu = htmlspecialchars($_POST['education_level']);
        $skills = htmlspecialchars($_POST['skills']);
        $exp = htmlspecialchars($_POST['experience']);
        
        // ส่วนนี้เป็นการจำลองการแสดงผล (ในงานจริงควรบันทึกลง Database)
        echo "<div class='container mb-5'><div class='alert alert-success shadow'>";
        echo "<h4 class='alert-heading'>บันทึกใบสมัครเรียบร้อยแล้ว!</h4>";
        echo "<p>ขอบคุณที่สมัครงานในตำแหน่ง: <strong>$pos</strong></p>";
        echo "<hr>";
        echo "<p class='mb-0'>ผู้สมัคร: $fullname <br> วุฒิการศึกษา: $edu</p>";
        echo "</div></div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>