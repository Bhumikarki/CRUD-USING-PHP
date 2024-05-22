<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="SELECT * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];

    $nameerror= "" ;
    $emailerror="";
    $phoneerror="";
    $addresserror="";
    
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
    
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
    <h2>List</h2>
    <form action="" method="post" >
    Name:<input type="text" name="name" placeholder="enter your name" autocomplete="off" value=<?php echo $name;?> required>
    <span style="color:red;">*<?php echo $nameerror;?><br><br>
    Email:<input type="email" name="email" placeholder="enter your email" autocomplete="off" required value=<?php echo $email;?>>
    <span style="color:red;">*<?php echo $emailerror;?></span><br><br>
    Phone:<input type="text" name="phone" placeholder="enter your phone number" autocomplete="off" required value=<?php echo $phone;?>>
    <span style="color:red;">*<?php echo $phoneerror;?> </span><<br><br>
    Address:<input type="text" name="address" placeholder="enter your address" autocomplete="off" required value=<?php echo $address;?>>
    <span style="color:red;">*<?php echo $addresserror;?> </span><br><br>
    <button type="submit" value="submit" name="submit"> Update </button>


   </div>
</body>
</html>