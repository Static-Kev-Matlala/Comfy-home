<?php

@include 'connection.php';

$message = [];

if(isset($_POST['add_user'])){
   $u_name = isset($_POST['user_name']) ? $_POST['user_name'] : ''; // Check if the key exists before accessing it
   $u_email = isset($_POST['user_email']) ? $_POST['user_email'] : ''; // Check if the key exists before accessing it
   $u_address = isset($_POST['user_address']) ? $_POST['user_address'] : '';
   $u_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
   $u_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';

   if(!empty($u_name) && !empty($u_email)){ // Check if both fields are not empty
      $insert_query = mysqli_query($conn, "INSERT INTO `users`(user_name, user_email, user_address, user_password, user_type) VALUES('$u_name', '$u_email', '$u_address', '$u_password', '$u_type')");

      if($insert_query){
         $message[] = 'User added successfully';
      }else{
         $message[] = 'Failed to add user: ' . mysqli_error($conn); // Display MySQL error
      }
   }else{
      $message[] = 'Please provide both user name and email';
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `users` WHERE user_id = $delete_id ");

   if($delete_query){
      header('location:admin.php');
      $message[] = 'User has been deleted';
   }else{
      $message[] = 'Failed to delete user: ' . mysqli_error($conn); // Display MySQL error
   }
}

if(isset($_POST['update_user'])){
   $update_u_id = $_POST['update_u_id'];
   $update_u_name = isset($_POST['update_u_name']) ? $_POST['update_u_name'] : ''; // Check if the key exists before accessing it
   $update_u_email = isset($_POST['update_u_email']) ? $_POST['update_u_email'] : ''; // Check if the key exists before accessing it
   $update_u_address = isset($_POST['update_u_address']) ? $_POST['update_u_address'] : '';
   $update_u_password = isset($_POST['update_u_password']) ? $_POST['update_u_password'] : '';
   $update_u_type = isset($_POST['update_u_type']) ? $_POST['update_u_type'] : '';

   if(!empty($update_u_name) && !empty($update_u_email)){ // Check if both fields are not empty
      $update_query = mysqli_query($conn, "UPDATE `users` SET user_name = '$update_u_name', user_email = '$update_u_email' WHERE user_id = '$update_u_id'");

      if($update_query){
         $message[] = 'User updated successfully';
         header('location:admin.php');
      }else{
         $message[] = 'Failed to update user: ' . mysqli_error($conn); // Display MySQL error
      }
   }else{
      $message[] = 'Please provide both user name and email';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message"><span>'.$msg.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}

include 'header.php';

?>

<div class="container">

<section>

<form action="" method="post" class="add-user-form" enctype="multipart/form-data">
   <h3>add a new user</h3>
   <input type="text" name="user_name" placeholder="enter the user name" class="box" required>
   <input type="email" name="user_email" placeholder="enter the user email" class="box" required>
   <input type="address" name="user_address" placeholder="enter the user address" class="box" required>
   <input type="password" name="user_password" placeholder="enter the user password" class="box" required>
   <input type="text" name="user_type" placeholder="enter the user type" class="box" required>
   
   <input type="submit" value="add the user" name="add_user" class="btn">
</form>

</section>

<section class="display-user-table">

   <table>

      <thead>
         
         <th>user name</th>
         <th>user email</th>
         <th>user address</th>
         <th>user password</th>
         <th>user type</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_users = mysqli_query($conn, "SELECT * FROM `users`");
            if($select_users && mysqli_num_rows($select_users) > 0){
               while($row = mysqli_fetch_assoc($select_users)){
         ?>

         <tr>
            
            <td><?php echo $row['user_fullname']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_address']; ?></td>
            <td><?php echo $row['user_password']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['user_id']; ?>" class="delete-btn" onclick="return confirm('are you sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['user_id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
               }
            }else{
               echo "<tr><td colspan='3' class='empty'>No user added</td></tr>";
            }
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = $edit_id");
      if($edit_query && mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
         }
        }
    }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_u_id" value="<?php echo $fetch_edit['user_id']; ?>">
      <input type="text" class="box" required name="update_u_name" value="<?php echo $fetch_edit['user_name']; ?>">
      <input type="email" class="box" required name="update_u_email" value="<?php echo $fetch_edit['user_email']; ?>">
      <input type="address" class="box" required name="update_u_address" value="<?php echo $fetch_edit['user_address']; ?>">
      <input type="password" class="box" required name="update_u_password" value="<?php echo $fetch_edit['user_password']; ?>">
      <input type="text" class="box" required name="update_u_type" value="<?php echo $fetch_edit['user_type']; ?>">
      
      <input type="submit" value="update the user" name="update">
</section>