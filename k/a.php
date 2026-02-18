<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>งาน K - 66010914021 สุรีรัตน์ เกษกัน</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f4f4f9;
        }
        .info-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .btn {
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin: 10px;
            color: white;
            transition: 0.3s;
        }
        .btn-student {
            background-color: #28a745; /* สีเขียว */
        }
        .btn-student:hover {
            background-color: #218838;
        }
        .btn-teacher {
            background-color: #ffc107; /* สีส้ม/เหลือง */
            color: #000;
        }
        .btn-teacher:hover {
            background-color: #e0a800;
        }
        #display-area {
            margin-top: 20px;
        }
        #display-area img {
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

    <div class="info-box">
        <h1>งาน K</h1>
        <p><strong>66010914021:</strong> </p>
        <p><strong>สุรีรัตน์ เกษกัน:</strong> ]</p>
    </div>

    <br>

    <button class="btn btn-student" onclick="showImage('images/1.jpg')">เปิดรูปตัวเอง</button>
    <button class="btn btn-teacher" onclick="showImage('images/2.jpg')">เปิดรูปอาจารย์</button>

    <div id="display-area">
        <p>คลิกปุ่มเพื่อแสดงรูปภาพ</p>
    </div>

    <script>
        function showImage(imagePath) {
            const displayArea = document.getElementById('display-area');
            displayArea.innerHTML = `<img src="${imagePath}" alt="Photo">`;
        }
    </script>

</body>
</html>