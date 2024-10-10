<?php
    require 'connection.php';
    session_start();
    $count = 0;

    if (isset($_POST['add_to_cart'])){
        $pid = $_POST['id'];
        $quantity = 1;

        if (isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid]['quantity'] += 1;
        }
        else{
            $sql = "SELECT * FROM `pruducts` WHERE `product_id` = '$pid'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                if (mysqli_num_rows($result) > 0){
                    if ($pro = mysqli_fetch_assoc($result)){
                        $count += $quantity;

                        $pname = $pro['product_name'];
                        $pdes = $pro['product_description'];
                        $price = $pro['product_price'];
                        $pimg = $pro['product_image'];

                        $_SESSION['cart'][$pid] = [
                            'image' => $pro['product_image'],
                            'name' => $pro['product_name'],
                            'description' => $pro['product_description'],
                            'price' => $pro['product_price'],
                            'quantity' => $quantity,
                        ];
                    //    count++

                    // add to cart info into db table
                        $cart_query = "INSERT INTO `cart_order`(`user_Fullname`, `item_productID`, `item_Name`, `item_Price`, `item_Des`, `item_Image`, `item_Date`) VALUES ('User','$pid','$pname','$pdes','$price','$pimg')";

                        $result_query = mysqli_query($conn, $cart_query);
                        if (!$result_query){
                            echo "Error, Product Not Added To Cart";
                        }
                    }
                }
            }
        }
    }

    if (!empty($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $item){
            $count += $item['quantity'];
        }
    }

    if(isset($_POST['btn_del'])){
        $rid = $_POST['id'];

        // remove from cart info from table
        $delete_cart = "DELETE FROM `cart_order` WHERE `item_productID` = '$id'";
        $result_delete = mysqli_query($conn, $delete_cart);
        if (!$result_delete){
            echo "Error, Product was not deleted from table";
        }

        if(isset($_SESSION['cart'][$rid])){
            unset($_SESSION['cart'][$rid]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="productstyling.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <!-- bootstrap link -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <nav>
        <div class="logo">
            <h1>Comfy@<span>Home</span></h1>
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#shop">FURNITURE</a></li>
            <li><a href="#arrival">HOMEWARE</a></li>
            <li><a href="#sale" style="color: red;">SALE</a></li>

            

        </ul>
        <ul class="nav-icons">
            <li><i class="ri-contacts-book-line"></i></li>
            <li><i class="ri-heart-line"></i></li>
            <li><i class="ri-user-fill"></i></li>
            <li><i class="ri-shopping-cart-2-fill"></i></li>
        </ul>
        <i id="bar" class="fa-solid fa-bars"></i>
    </nav>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '1'";
                        $result = mysqli_query($conn, $query);

                        if ($result){
                            if (mysqli_num_rows($result) != 0){
                                if ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['product_id'];
                                    $name = $row['product_name'];
                                    $description = $row['product_description'];
                                    $price = $row['product_price'];
                                    $image = $row['product_image'];
                                    // $products[] = $row;
                                }
                            }
                        }
                ?>
                     <form action="" method="post">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                    <img src="images/product_1/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
                    
                    
                    
                    <!-- <?php
                    if (isset($_SESSION['cart']['1'])){
                        echo ("$name is added to CART<br>
                        <button type='submit' name='btn_del'> Remove From Cart</button>");
                    }
                    else
                    {
                        echo "<button type='submit' name='add_to_cart'><i class='ri-shopping-cart-2-fill'></i></button>";
                    }
                    ?> -->
                    </form>
                <!-- <img src="images/Home.png" width="100%" id="ProductImg"> -->
                <div class="small-img-row">

                    <div class="small-img-col">
                        <img src="images/Home.png" width="100%" class="small-img">
                    </div>

                    <div class="small-img-col">
                        <img src="images/Home.png" width="100%" class="small-img">
                    </div>

                    <div class="small-img-col">
                        <img src="images/Home.png" width="100%" class="small-img">
                    </div>

                    <div class="small-img-col">
                        <img src="images/Home.png" width="100%" class="small-img">
                    </div>
                </div>
            </div>

                <div class="col-2">
                <form action="" method="post">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                        <p>Home/Furniture</p>
                    <p><?php echo $name; ?></p>
                    <p>R<?php echo $price; ?></p>
                    <input type="number" value="1">
                    <?php
                    if (isset($_SESSION['cart']['1'])){
                        echo ("$name is added to CART<br>
                        <button type='submit' class='btn' name='btn_del'> Remove From Cart</button>");
                    }
                    else
                    {
                        echo "<button type='submit' class='btn' name='add_to_cart'>Add To Cart</button>";
                        echo "<button type='submit' class='btn' name='add_to_cart'>Wishlist</button>";
                    }
                    ?>
                    </form>                    
                   <!-- <a href="" class="btn">Add to Cart</a>
                    <a href="" class="btn">Add to Wishlist</a>-->
                    <h3>Product Details <i class="fa fa-indent"></i></h3>
                    <br>
                    <p><?php echo $description; ?></p>
                </div>
        </div>
    </div>
    <br>
    <br>

    <!-- furniture -->
    <section class="shop">
        <div id="shop">
            <div class="head">
                <h1>FURNITURE</h1>
            </div>
            <div class="shops">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '41'";
                        $result = mysqli_query($conn, $query);

                        if ($result){
                            if (mysqli_num_rows($result) != 0){
                                if ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['product_id'];
                                    $name = $row['product_name'];
                                    $description = $row['product_description'];
                                    $price = $row['product_price'];
                                    $image = $row['product_image'];
                                    // $products[] = $row;
                                }
                            }
                        }
                ?>
                     <form action="" method="post">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                    <img src="images/product_9/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
                    <p><?php echo $description; ?></p>
                    <p>R<?php echo $price; ?></p>
                    <p><?php echo $name; ?></p>
                    <?php
                    if (isset($_SESSION['cart']['1'])){
                        echo ("$name is added to CART<br>
                        <button type='submit' name='btn_del'> Remove From Cart</button>");
                    }
                    else
                    {
                        echo "<button type='submit' name='add_to_cart'><i class='ri-shopping-cart-2-fill'></i></button>";
                    }
                    ?>
                    </form>
                    <!-- <img src="images/shop.jpg" alt="">
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p> -->

                </div>
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '41'";
                        $result = mysqli_query($conn, $query);

                        if ($result){
                            if (mysqli_num_rows($result) != 0){
                                if ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['product_id'];
                                    $name = $row['product_name'];
                                    $description = $row['product_description'];
                                    $price = $row['product_price'];
                                    $image = $row['product_image'];
                                    // $products[] = $row;
                                }
                            }
                        }
                ?>
                     <form action="" method="post">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                    <img src="images/product_9/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
                    <p><?php echo $description; ?></p>
                    <p>R<?php echo $price; ?></p>
                    <p><?php echo $name; ?></p>
                    <?php
                    if (isset($_SESSION['cart']['1'])){
                        echo ("$name is added to CART<br>
                        <button type='submit' name='btn_del'> Remove From Cart</button>");
                    }
                    else
                    {
                        echo "<button type='submit' name='add_to_cart'><i class='ri-shopping-cart-2-fill'></i></button>";
                    }
                    ?>
                    </form>
                    <!-- <img src="images/shop.jpg" alt="">
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p> -->

                </div>
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '41'";
                        $result = mysqli_query($conn, $query);

                        if ($result){
                            if (mysqli_num_rows($result) != 0){
                                if ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['product_id'];
                                    $name = $row['product_name'];
                                    $description = $row['product_description'];
                                    $price = $row['product_price'];
                                    $image = $row['product_image'];
                                    // $products[] = $row;
                                }
                            }
                        }
                ?>
                     <form action="" method="post">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                    <img src="images/product_9/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
                    <p><?php echo $description; ?></p>
                    <p>R<?php echo $price; ?></p>
                    <p><?php echo $name; ?></p>
                    <?php
                    if (isset($_SESSION['cart']['1'])){
                        echo ("$name is added to CART<br>
                        <button type='submit' name='btn_del'> Remove From Cart</button>");
                    }
                    else
                    {
                        echo "<button type='submit' name='add_to_cart'><i class='ri-shopping-cart-2-fill'></i></button>";
                    }
                    ?>
                    </form>
                    <!-- <img src="images/shop.jpg" alt="">
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p> -->

                </div>
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '41'";
                        $result = mysqli_query($conn, $query);

                        if ($result){
                            if (mysqli_num_rows($result) != 0){
                                if ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['product_id'];
                                    $name = $row['product_name'];
                                    $description = $row['product_description'];
                                    $price = $row['product_price'];
                                    $image = $row['product_image'];
                                    // $products[] = $row;
                                }
                            }
                        }
                ?>
                     <form action="" method="post">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                    <img src="images/product_9/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
                    <p><?php echo $description; ?></p>
                    <p>R<?php echo $price; ?></p>
                    <p><?php echo $name; ?></p>
                    <?php
                    if (isset($_SESSION['cart']['1'])){
                        echo ("$name is added to CART<br>
                        <button type='submit' name='btn_del'> Remove From Cart</button>");
                    }
                    else
                    {
                        echo "<button type='submit' name='add_to_cart'><i class='ri-shopping-cart-2-fill'></i></button>";
                    }
                    ?>
                    </form>
                    <!-- <img src="images/shop.jpg" alt="">
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p> -->

                </div>
               
            </div>
        </div>
        </section>

    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = Document.getElementByClassName("small-img");

        SmallImg[0].onclick = fumction()
        {
            ProductImg.src = SmallImg[0].src;
        }

        SmallImg[1].onclick = fumction()
        {
            ProductImg.src = SmallImg[1].src;
        }

        SmallImg[2].onclick = fumction()
        {
            ProductImg.src = SmallImg[2].src;
        }

        SmallImg[3].onclick = fumction()
        {
            ProductImg.src = SmallImg[3].src;
        }
    </script>

</body>
</html>