<?php 

    require('dbconnect.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);
    $skill_arr = array("Java","PHP","Python","HTML");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>
<body>
    <div class="container my-3">
        <h2 class="text-center">แบบฟอร์มแก้ไขข้อมูล</h2>
        <form action="updateData.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
            <div class="form-group">
                    <label for="">ชื่อ</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $row["fname"]; ?>">
            </div>
            <div>
                <label for="">นามสกุล</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $row["lname"]; ?>">
            </div>
            <div class="form-group">
                <label for="">เพศ</label>
                <?php 
                    if($row["gender"] == "male"){
                        echo "<input type='radio' name='gender' value='male' checked>ชาย";
                        echo "<input type='radio' name='gender' value='female'>หญิง";
                        echo "<input type='radio' name='gender' value='other'>อื่นๆ";
                    }else if($row["gender"] == "female"){
                        echo "<input type='radio' name='gender' value='male'>ชาย";
                        echo "<input type='radio' name='gender' value='female' checked>หญิง";
                        echo "<input type='radio' name='gender' value='other'>อื่นๆ";
                    }else{
                        echo "<input type='radio' name='gender' value='male'>ชาย";
                        echo "<input type='radio' name='gender' value='female' >หญิง";
                        echo "<input type='radio' name='gender' value='other' checked>อื่นๆ";
                    }
                ?>
 
            </div>
            <div class="form-group">
                <label for="">ทักษะ</label>
                <?php 
                    $skill = explode(",",$row["skills"]); //array

                    foreach($skill_arr as $value){
                        if(in_array($value,$skill)){
                            echo "<input type='checkbox' name='skills[]' value='$value' checked> $value";
                        }else{
                            echo "<input type='checkbox' name='skills[]' value='$value'> $value";
                        }
                    }
                ?>

            </div>
            <br>
            <input type="submit" value="อัปเดทข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            <a href="index.php" class="btn btn-primary">กลับหน้าหลัก</a>
        </form>
        
    </div>

    
</body>
</html>