<?php

include 'connection.php';
session_start();

$name = $_SESSION['name'];
if (!isset($name)){
   header("location: sign_in.php");
}

$message = [];

if(isset($_POST['add_product'])){
   $p_id = $_POST['product_id'];
   $p_name = $_POST['product_name'];
   $p_description = $_POST['product_description'];
   $p_price = $_POST['product_price'];
   $p_image = $_FILES['product_image']['name'];
   $p_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $p_image_folder = '../images/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(`product_id`,`product_name`,`product_description`, `product_price`, `product_image`) VALUES('$p_id','$p_name','$p_description', '$p_price', '$p_image')");

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Product added successfully';
   }else{
      $message[] = 'Failed to add product: ' . mysqli_error($conn); // Display MySQL error
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ");

   if($delete_query){
      header('location:admin.php');
      $message[] = 'Product has been deleted';
   }else{
      $message[] = 'Failed to delete product: ' . mysqli_error($conn); // Display MySQL error
   }
}

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET product_id = '$update_p_id',product_name = '$update_p_name',product_description = '$update_p_description', product_price = '$update_p_price', product_image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'Product updated successfully';
      header('location:admin.php');
   }else{
      $message[] = 'Failed to update product: ' . mysqli_error($conn); // Display MySQL error
      header('location:admin.php');
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
   <link rel="stylesheet" href="styling.css">

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
<p>Welcome <?php echo $name; ?></p>
<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="product_id" placeholder="enter the product id" class="box" required>
   <input type="text" name="product_name" placeholder="enter the product name" class="box" required>
   <input type="text" name="product_description" placeholder="enter the product description" class="box" required>
   <input type="number" name="product_price" min="0" placeholder="enter the product price" class="box" required>
   <input type="file" name="product_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if($select_products && mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>$<?php echo $row['product_price']; ?>/-</td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are you sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
               }
            }else{
               echo "<tr><td colspan='4' class='empty'>No product added</td></tr>";
            }
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if($edit_query && mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['product_image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['product_name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['product_price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the product" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
               }
            echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
         }
      }

   ?>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
