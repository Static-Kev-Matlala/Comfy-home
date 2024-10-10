<?php
    include 'connection.php';

    if (isset($_POST['add_to_cart'])){
        $pid = $_POST['id'];
        $quantity = 1;

        if (isset($_SESSION['cart'][$pid])){
            $_SESSION['cart']['quantity'] += 1;
        }
        else
        {
            $sql = "SELECT * FROM `pruducts` WHERE `product_id` = '$pid'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                if (mysqli_num_rows($result) > 0){
                    if ($pro = mysqli_fetch_assoc($result)){
                        $_SESSION['cart'][$pid] = [
                            'img' => $pro['product_image'],
                            'name' => $pro['product_name'],
                            'description' => $pro['product_description'],
                            'price' => $pro['product_price'],
                            'quantity' => $quantity,
                        ];
                    }
                }
            }
        }

        if (isset($_POST['btn_del'])){
            $id = $_POST['id'];
            if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <center>View Cart</center>
        <?php 
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
             foreach ($_SESSION['cart'] as $id => $item){
                 echo "<img src= 'images/" . $item['img'] . "' alt='" . $item['name'] ."'<br><br>";
                 echo "Name: " . $item['name'] . "<br>";
                 echo "Description: " . $item['description'] . "<br>";
                 echo "R" . $item['price'];
                 echo "<br> <br>"; 
                 echo "
                        <form action= '' method='POST'>
                            <input type='hidden' name='remove_id' value='$id'>
                            <button type= 'submit' name='btn_del'> Remove from cart</button>
                        </form>";
            }
        }
        else
        {
            echo "CART is Empty";
        }
        ?>
        <a href="index.php">Continue shopping</a>
    </body>
</html>