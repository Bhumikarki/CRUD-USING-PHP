<?php
include 'connect.php';

if(isset($_GET['delid'])){
    $id=$_GET['delid'];

    $sql="delete from `crud` where id=$id";
    $result=mysqli_query($con, $sql);
    if($result){
        header('location:display.php');
    }

}
?>