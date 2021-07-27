<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    

    <title>บันทึกข้อมูลพนักงาน</title>
</head>
<body>
    <div class="container my-3">
        <h2 class="text-center">แบบฟอร์มบันทึกข้อมูล</h2>
        <form action="insertData.php" method="POST">
            <div class="form-group">
                    <label for="">ชื่อ</label>
                    <input type="text" name="fname" class="form-control" required>
            </div>
            <div>
                <label for="">นามสกุล</label>
                <input type="text" name="lname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">เพศ</label>
                <input type="radio" name="gender" id="" value="male">ชาย
                <input type="radio" name="gender" id="" value="female">หญิง
                <input type="radio" name="gender" id="" value="other">อื่นๆ 
            </div>
            <div class="form-group">
                <label for="">ทักษะ / ภาษา</label>
                <input type="checkbox" name="skills[]" id="" value="Java"> Java
                <input type="checkbox" name="skills[]" id="" value="PHP"> PHP
                <input type="checkbox" name="skills[]" id="" value="Python"> Python
                <input type="checkbox" name="skills[]" id="" value="HTML"> HTML
            </div>
            <br>
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            <a href="index.php" class="btn btn-primary">กลับหน้าหลัก</a>
        </form>
        
    </div>

    
</body>
</html>