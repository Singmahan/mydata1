<?php 
    require('dbconnect.php');

    $id = $_GET["idemp"];

    $sql = "DELETE FROM employees WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    if($result){
        header("location:index.php?m=1");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาด";
    }
?>