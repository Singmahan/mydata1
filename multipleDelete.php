<?php 

    require('dbconnect.php');

    $id_array = $_POST["idcheckbox"];

    $multiple_id = implode(",",$id_array);

    $sql = "DELETE FROM employees WHERE id in($multiple_id)";
    
    $result = mysqli_query($connect, $sql);
    if($result){
        header("location:index.php");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาด";
    }
?>