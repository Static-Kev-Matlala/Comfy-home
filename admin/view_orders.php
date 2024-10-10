<?php

@include 'connection.php';

$message = [];

if(isset($_POST['add_orders'])){
   $o_name = isset($_POST['order_name']) ? $_POST['order_name'] : ''; // Check if the key exists before accessing it
   $o_number = isset($_POST['order_number']) ? $_POST['order_number'] : '';
   $o_email = isset($_POST['order_email']) ? $_POST['order_email'] : ''; // Check if the key exists before accessing it
   $o_method = isset($_POST['order_method']) ? $_POST['order_method'] : '';
   $o_address = isset($_POST['order_address']) ? $_POST['order_address'] : '';
   $o_total_method = isset($_POST['order_total_method']) ? $_POST['order_total_method'] : '';
   $o_total_price = isset($_POST['order_total_price']) ? $_POST['order_total_price'] : '';

   if(!empty($o_name) && !empty($o_email)){ // Check if both fields are not empty
      $insert_query = mysqli_query($conn, "INSERT INTO `orders`(order_name, order_number, order_email, order_method, order_address, order_total_method, order_total_price) VALUES('$o_name', '$o_number', '$o_email', '$o_method', '$o_address', '$o_total_method', '$o_total_price')");

      if($insert_query){
         $message[] = 'Order added successfully';
      }else{
         $message[] = 'Failed to add order: ' . mysqli_error($conn); // Display MySQL error
      }
   }else{
      $message[] = 'Please provide both order name and email';
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `orders` WHERE order_id = $delete_id ");

   if($delete_query){
      header('location:admin.php');
      $message[] = 'Order has been deleted';
   }else{
      $message[] = 'Failed to delete order: ' . mysqli_error($conn); // Display MySQL error
   }
}

if(isset($_POST['update_order'])){
   $update_o_id = $_POST['update_o_id'];
   $update_o_name = isset($_POST['update_o_name']) ? $_POST['update_o_name'] : ''; // Check if the key exists before accessing it
   $update_o_email = isset($_POST['update_o_email']) ? $_POST['update_o_email'] : ''; // Check if the key exists before accessing it
   $update_o_address = isset($_POST['update_o_address']) ? $_POST['update_o_address'] : '';
   $update_o_password = isset($_POST['update_o_password']) ? $_POST['update_o_password'] : '';
   $update_o_type = isset($_POST['update_o_type']) ? $_POST['update_o_type'] : '';

   if(!empty($update_o_name) && !empty($update_o_email)){ // Check if both fields are not empty
      $update_query = mysqli_query($conn, "UPDATE `orders` SET order_name = '$update_o_name', order_email = '$update_o_email' WHERE order_id = '$update_o_id'");

      if($update_query){
         $message[] = 'Order updated successfully';
         header('location:admin.php');
      }else{
         $message[] = 'Failed to update order: ' . mysqli_error($conn); // Display MySQL error
      }
   }else{
      $message[] = 'Please provide both order name and email';
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
   <h3>add a new order</h3>
   <input type="text" name="order_name" placeholder="enter the order name" class="box" required>
   <input type="email" name="order_email" placeholder="enter the order email" class="box" required>
   <input type="address" name="order_address" placeholder="enter the order address" class="box" required>
   <input type="password" name="order_password" placeholder="enter the order password" class="box" required>
   <input type="text" name="order_type" placeholder="enter the order type" class="box" required>
   
   <input type="submit" value="add the order" name="add_order" class="btn">
</form>

</section>

<section class="display-order-table">

   <table>

      <thead>
         
         <th>order name</th>
         <th>order email</th>
         <th>order address</th>
         <th>order password</th>
         <th>order type</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_users = mysqli_query($conn, "SELECT * FROM `order`");
            if($select_users && mysqli_num_rows($select_users) > 0){
               while($row = mysqli_fetch_assoc($select_users)){
         ?>

         <tr>
            
            <td><?php echo $row['order_fullname']; ?></td>
            <td><?php echo $row['order_email']; ?></td>
            <td><?php echo $row['order_address']; ?></td>
            <td><?php echo $row['order_password']; ?></td>
            <td><?php echo $row['order_type']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['order_id']; ?>" class="delete-btn" onclick="return confirm('are you sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['order_id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
               }
            }else{
               echo "<tr><td colspan='3' class='empty'>No order added</td></tr>";
            }
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `order` WHERE order_id = $edit_id");
      if($edit_query && mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
         }
        }
    }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_o_id" value="<?php echo $fetch_edit['order_id']; ?>">
      <input type="text" class="box" required name="update_o_name" value="<?php echo $fetch_edit['order_name']; ?>">
      <input type="email" class="box" required name="update_o_email" value="<?php echo $fetch_edit['order_email']; ?>">
      <input type="address" class="box" required name="update_o_address" value="<?php echo $fetch_edit['order_address']; ?>">
      <input type="password" class="box" required name="update_o_password" value="<?php echo $fetch_edit['order_password']; ?>">
      <input type="text" class="box" required name="update_o_type" value="<?php echo $fetch_edit['order_type']; ?>">
      
      <input type="submit" value="update the order" name="update">
</section>