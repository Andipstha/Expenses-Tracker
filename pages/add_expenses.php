<?php
    require('../includes/db_conn.php');  // Database connection

    $category_id = $_POST['category_id'];
    $name = $_POST['ename'];
    $amount = $_POST["eamount"];
    $expenses_date = $_POST["date"];

    var_dump($name);
    var_dump($amount);

    // $sql = "INSERT INTO `expenses` (title, amount) values ('test', '25000')";
    $sql = "INSERT INTO `expenses` (category_id, title, amount, expenses_date) values ('$category_id', '$name', '$amount' , '$expenses_date')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Successfully Added Record";
    }else{
        echo "Failed to Added Record";
    }

    header("location: ../index.php");


?>
