<?php 

    require('dbconnect.php');

    $fname = $_POST["fname"]; 
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];

    $emskill = implode(",",$_POST['skills']);

    $sql = "INSERT INTO employees (fname,lname,gender,skills) VALUES ('$fname','$lname','$gender','$emskill')";
    $result = mysqli_query($connect, $sql);
    if($result){
        header("location:index.php");
        exit(0);
    }else{
        echo mysqli_error($connect);
    }


    
?>