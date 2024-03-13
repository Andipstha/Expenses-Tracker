<?php
require('./includes/db_conn.php');  // Database connection

$delete = false;

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM expenses WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $delete = true;
    }
}


?>