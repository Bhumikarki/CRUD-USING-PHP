<?php

include 'connect.php';

//keeping error none firstly
$nameerror= "" ;
$emailerror="";
$phoneerror="";
$addresserror="";

//check if form is submitted
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    //validation for name
    if(empty($name)){
        $nameerror = "Name is required";
    }elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $nameerror = "Name should contain only alphabetic characters";
    }

    // Validation for Email
    if(empty($email)) {
        $emailerror = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerror = "Invalid email format";
    }

    // Validation for Phone
    if(empty($phone)){
        $phoneerror = "Phone number is required";
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        $phoneerror = "Phone number should be of 10 digits";
    }

    // Validation for Address
    if(empty($address)){
        $addresserror = "Address is required";
    }
    // Check if there are no errors
    if(empty($nameerror) && empty($emailerror) && empty($phoneerror) && empty($addresserror)){
        $sql = "INSERT INTO `crud` (name, email, phone, address) VALUES ('$name', '$email', '$phone','$address')";
        $result = mysqli_query($con, $sql);
        if($result){
            header('location:display.php');
        } else {
            die(mysqli_error($con));
        }
        
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="/style.css">

</head>
<body>
   <div class="container my-5">
    <h2>FORM</h2>
    <form action="" method="post" auto_complete="off" >
    Name:<input type="text" name="name" placeholder="enter your name" auto_complete="off">
    <span style="color:red;">*<?php echo $nameerror;?> </span><br><br>
    Email:<input type="email" name="email" placeholder="enter your email" >
    <span style="color:red;">*<?php echo $emailerror;?> </span><br><br>
    Phone:<input type="text" name="phone" placeholder="enter your phone number">
    <span style="color:red;">*<?php echo $phoneerror;?> </span><br><br>
    Address:<input type="text" name="address" placeholder="enter your address">
    <span style="color:red;">*<?php echo $addresserror;?> </span><br><br>
    <button type="submit" value="submit" name="submit"> Submit </button>


   </div>
</body>
</html>