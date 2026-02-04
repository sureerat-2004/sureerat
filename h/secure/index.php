<?php
    session_start();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - สุรีรัตน์ เกษกัน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #fce4ec; /* พื้นหลังชมพูอ่อน */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .card-header {
            background-color: #ec407a; /* หัวข้อชมพูเข้ม */
            color: white;
            border-radius: 15px 15px 0 0 !important;
            text-align: center;
            padding: 20px;
        }
        .btn-pink {
            background-color: #f06292;
            color: white;
            border: none;
        }
        .btn-pink:hover {
            background-color: #ec407a;
            color: white;
        }
        .form-control:focus {
            border-color: #f06292;
            box-shadow: 0 0 0 0.25 darkred shadow; /* ปรับโฟกัสให้เป็นสีชมพู */
            box-shadow: 0 0 8px rgba(240, 98, 146, 0.5);
        }
    </style>
</head>

<body>

<div class="card login-card">
    <div class="card-header">
        <h4 class="mb-0">ระบบหลังบ้าน - เตย</h4>
    </div>
    <div class="card-body p-4">
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" autofocus required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
            </div>
            <button type="submit" name="Submit" class="btn btn-pink w-100 py-2">เข้าสู่ระบบ</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement ป้องกัน SQL Injection
    $sql = "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_array($result)) {
        // 2. การตรวจสอบรหัสผ่านแบบเข้ารหัส (แนะนำใช้ password_verify)
        // ถ้าใน DB เก็บแบบ plain text ให้ใช้: if($pwd === $data['a_password'])
        // แต่ถ้าเก็บแบบ password_hash ให้ใช้บรรทัดล่างนี้:
        if (password_verify($pwd, $data['a_password']) || $pwd === $data['a_password']) {
            
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>
                window.location='index2.php';
            </script>";
        } else {
            showError();
        }
    } else {
        showError();
    }
}

function showError() {
    echo "<script>
        alert('Username หรือ Password ไม่ถูกต้อง!');
    </script>";
}
?>

</body>
</html>