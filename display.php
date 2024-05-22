<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <h2> Crud Operation </h2>
    <div class="container">
        <button><a href="index.php">Add User</a></button><br><br>

        <table class="table" border="2px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Operations</th>
                </tr>
            </thead>
            
            <?php
                $sql="Select * from `crud` ";
                $result=mysqli_query($con, $sql);

                if($result){

                    //mysqli_fetch_assoc()= returns a result set,pointer to the first row of the result. 
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $phone=$row['phone'];
                        $address=$row['address'];
                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$email.'</td>
                                <td>'.$phone.'</td>
                                <td>'.$address.'</td> 
                                <td>
                                
                                <button><a href="update.php?updateid='.$id.' ">UPDATE</a></button>
                                <button><a href="delete.php? delid='.$id.'">DELETE</a></button>
                                </td>               
                        </tr>';
                    }
                }
            ?>
        </table>       
    </div>
</body>
</html>