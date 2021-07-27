<?php 
    require('dbconnect.php');

    $name = $_POST["empname"];
    $sql = "SELECT * FROM employees WHERE fname LIKE '%$name%' ORDER BY fname ASC";
    $result = mysqli_query($connect, $sql);

    $count = mysqli_num_rows($result);
    $order = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>ข้อมูลพนักงาน</title>
</head>
<body>
    <div class="container">
    <h1 align="center">ข้อมูลพนักงาน</h1>
    <hr>
    <?php if($count > 0) { ?>
        <form action="searchData.php" class="form-group" method="POST">
        <label for="">ค้นหาข้อมูลพนักงาน</label>
        <input type="text" placeholder="ป้อนชื่อพนักงาน" name="empname" class="form-control">
        <input type="submit" value="ค้นหา" class="btn btn-success my-2">
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>รหัสพนักงาน</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เพศ</th>
                <th>ความสามารถ</th>
                <th>แก้ไข</th>
                <th>ลบข้อมูล</th>
                <th>ลบข้อมูล (CheckBox)</th>
                
            </tr>
        </thead>  
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $order++; ?></td>
                <td><?php echo $row["fname"]; ?></td>
                <td><?php echo $row["lname"]; ?></td>
                <td>
                    <?php 
                    if($row["gender"] == "male") { ?>
                        ชาย
                    <?php }else if($row["gender"] == "female") { ?>
                        หญิง
                    <?php }else { ?>
                        อื่นๆ 
                    <?php } ?>
                </td>
                <td><?php echo $row["skills"]; ?></td>
                <td>
                    <a href="editForm.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">แก้ไข</a>
                </td>
                <td>
                <a href="deleteQueryString.php?idemp=<?php echo $row["id"]; ?>" 
                    class="btn btn-danger del-btn";
                    >ลบข้อมูล</a>
                </td>

                <form action="multipleDelete.php" method="POST">
                <td>
                    <input type="checkbox" class="form-control" name="idcheckbox[]" value="<?php echo $row["id"];  ?>">
                </td>
                
            </tr>
            <?php } ?>
        </tbody>      
    </table>
    
    <?php } else{ ?>
        <div class="alert alert-danger">
            ไม่พบข้อมูล
        </div>
    <?php }?>
    <a href="index.php" class="btn btn-success">กลับหน้าหลัก</a>
        <?php if($count > 0) {?>
            <input type="submit" value="ลบข้อมูล (checkbox)" class="btn btn-danger">
        <?php }?>
    </form>
    <button class="btn btn-primary" onclick="checkAll()">เลือกทั้งหมด</button>
    <button class="btn btn-warning" onclick="uncheckAll()">ยกเลิก</button>
    </div>
</body>
<script>
    function checkAll(){
        var form_element = document.forms[1].length;
        for(i=0; i<form_element-1; i++){
            document.forms[1].elements[i].checked = true;
        }
    }
    function uncheckAll(){
        var form_element = document.forms[1].length;
        for(i=0; i<form_element-1; i++){
            document.forms[1].elements[i].checked = false;
        }
    }
</script>
<script>
    $('.del-btn').on('click',function(e){
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            title: 'คุณแน่ใจว่าจะลบข้อมูลนี้ ?',
            text: "โปรดพิจารณาให้ดีก่อนลบข้อมูลนี้",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ลบข้อมูล'
            }).then((result) => {
                if(result.value){
                    document.location.href = href;
                }
            })
        })
</script>
</html>