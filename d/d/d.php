<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>สุรีรัตน์ เกษกัน เตย</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">
      ฟอร์มรับข้อมูล - สุรีรัตน์ เกษกัน (เตย) - ChatGPT
    </a>
  </div>
</nav>

<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">แบบฟอร์มสมัครสมาชิก</h5>
        </div>
        <div class="card-body">

          <form method="post" action="">
            <!-- ชื่อ-สกุล -->
            <div class="mb-3">
              <label class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
              <input type="text" name="fullname" class="form-control" autofocus required>
            </div>

            <!-- เบอร์โทร -->
            <div class="mb-3">
              <label class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
              <input type="text" name="phone" class="form-control" required>
            </div>

            <!-- ส่วนสูง -->
            <div class="mb-3">
              <label class="form-label">ส่วนสูง (ซม.) <span class="text-danger">*</span></label>
              <input type="number" name="height" min="100" max="200" class="form-control" required>
              <div class="form-text">กรอกระหว่าง 100 - 200 เซนติเมตร</div>
            </div>

            <!-- ที่อยู่ -->
            <div class="mb-3">
              <label class="form-label">ที่อยู่</label>
              <textarea name="address" cols="40" rows="4" class="form-control" placeholder="บ้านเลขที่ / ตำบล / อำเภอ / จังหวัด / รหัสไปรษณีย์"></textarea>
            </div>

            <!-- วันเดือนปีเกิด + สีที่ชอบ -->
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label">วันเดือนปีเกิด</label>
                <input type="date" name="birthday" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">สีที่ชอบ</label>
                <div class="d-flex align-items-center gap-2">
                  <input type="color" name="color" class="form-control form-control-color" value="#0d6efd">
                  <span class="text-muted small">เลือกสีที่คุณชอบ</span>
                </div>
              </div>
            </div>

            <!-- สาขาวิชา -->
            <div class="mb-4">
              <label class="form-label">สาขาวิชา</label>
              <select name="major" class="form-select">
                <option value="การบัญชี">การบัญชี</option>
                <option value="การตลาด">การตลาด</option>
                <option value="การจัดการ">การจัดการ</option>
                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
              </select>
            </div>

            <!-- ปุ่มต่าง ๆ -->
            <div class="d-flex flex-wrap gap-2">
              <!-- submit -->
              <button type="submit" name="Submit" class="btn btn-success">
                สมัครสมาชิก
              </button>

              <!-- reset -->
              <button type="reset" class="btn btn-outline-secondary">
                ยกเลิก
              </button>

              <!-- Go to MSU -->
              <button type="button" class="btn btn-primary"
                      onClick="window.location='https://www.msu.ac.th/';">
                Go to MSU
              </button>

              <!-- Hello dblclick -->
              <button type="button" class="btn btn-warning"
                      onDblClick="alert('จ๊ะเอ๋!');">
                Hello (Double Click)
              </button>

              <!-- Hello mouseover -->
              <button type="button" class="btn btn-info"
                      onMouseOver="alert('จ๊ะเอ๋!');">
                Hello (Mouse Over)
              </button>

              <!-- print -->
              <button type="button" class="btn btn-dark"
                      onClick="window.print();">
                พิมพ์
              </button>
            </div>

          </form>

        </div>
      </div>

      <!-- แสดงผลข้อมูลที่ส่งมา -->
      <div class="mt-4">
        <?php
        if(isset($_POST['Submit'])){
          $fullname = $_POST['fullname'];
          $phone    = $_POST['phone'];
          $height   = $_POST['height'];
          $address  = $_POST['address'];
          $birthday = $_POST['birthday'];
          $color    = $_POST['color'];
          $major    = $_POST['major'];
        ?>
          <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
              <h6 class="mb-0">ข้อมูลที่คุณกรอก</h6>
            </div>
            <div class="card-body">
              <p><strong>ชื่อ-สกุล:</strong> <?php echo htmlspecialchars($fullname); ?></p>
              <p><strong>เบอร์โทร:</strong> <?php echo htmlspecialchars($phone); ?></p>
              <p><strong>ส่วนสูง:</strong> <?php echo htmlspecialchars($height); ?> ซม.</p>
              <p><strong>ที่อยู่:</strong> <?php echo nl2br(htmlspecialchars($address)); ?></p>
              <p><strong>วันเดือนปีเกิด:</strong> <?php echo htmlspecialchars($birthday); ?></p>
              <p><strong>สีที่ชอบ:</strong></p>
              <div class="mb-2">
                <div style="background-color:<?php echo htmlspecialchars($color); ?>;width:100%;max-width:300px;height:40px;border-radius:0.5rem;border:1px solid #dee2e6;"></div>
                <span class="small text-muted"><?php echo htmlspecialchars($color); ?></span>
              </div>
              <p><strong>สาขาวิชา:</strong> <?php echo htmlspecialchars($major); ?></p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS (optionally for components thatต้องใช้ JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
