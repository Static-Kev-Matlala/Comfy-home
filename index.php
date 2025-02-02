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
    <title>Comfy@Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Dancing+Script:wght@700&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styling.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    
</head>
<body>
    <div class="container">
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
                <a href="contact.html">
                <li><i class="ri-contacts-book-line"></i></li>
                </a>
                <li><i class="ri-heart-line"></i></li>
                <li><i class="ri-user-fill" onclick="toggleMenu()"></i></li>
                <!-- dropdown menu -->
                 <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <h2>Kevin Matlala</h2>
                        </div>
                        <hr>

                        <a href="#" class="sub-menu-link">
                            <a href="Comfy@home"><p>Login/Register</p></a>
                            <span>></span>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                 </div>
                <li><i class="ri-shopping-cart-2-fill"></i></li>
            </ul>
            <i id="bar" class="fa-solid fa-bars"></i>
        </nav>


        <div class="main">
            <img src="images/Home.png" alt="" width="100%" height="100%">
            <div class="mainText">
                <h1>LUXURY FURNITURE</h1>
                <P>For The Few Fortunate</P>
                
            </div>
            <div class="main-btn">
                <center><button><a href="#shop" style="text-decoration:none;">Shop Now</a></button></center>
            </div>
        </div>

        <section class="about">
        <div id="about">
            <div class="about_head">
                <h2>About <span>Us</span></h2>
                <h1>THE SUPREME LIFESTYLE</h1>
            </div>
            <div class="about">
                
                <div class="aboutText">
                    <h3>We Make Furniture From Heart</h3>

                    <p>From its humble beginnings in 1964 as a traditional furniture store in Windhoek, Namibia, Weylandts has grown into South Africa’s leading furniture and homeware retailer with 10 stores nationwide.</p><br>
                        
                        <p>Inheriting his father’s eye for extraordinary furniture and an appreciation of good living in its widest sense, Chris Weylandt has developed the brand into one that’s synonymous with bold, confident aesthetics and timeless taste. At the heart of Weylandts’ aesthetic vision is the unique fusion of clean, contemporary design with the soul of natural material.</p><br>
                        
                        <p>With an infrastructure that enables us to manufacture, source and import furniture and homeware from every corner of the globe, Weylandts established itself as a brand with a reputation of merging the best handcrafted traditions from around the world with the confidence of masculine minimalist design.</p><br>
                        
                        <P>In line with our philosophy of good living, the Weylandts brand extends to Weylandts Spaces, a bespoke interior design and concept service, and the Maison Estate in Franschhoek — home to a collection of superb wines and a fine dining restaurant. Our in-store experience includes The Kitchen restaurants and niche coffee bars at selected stores — bringing to life our vision of celebrating good living with all the senses.</p>

                    
                </div>
            </div>
        </div><br>
        
        </section><br> <Center><h1>THE COMFY@HOME HISTORY</h1></Center>
        <div class="history">
           
            <div class="history_img">
                <img src="images/History.png">
            </div>
            <div class="history_text">
                <h1><i>1964</i></h1><br>
                <h1>THE STORY BEGINS</h1><br>
                <P>In line with our philosophy of good living, the Weylandts brand extends to Weylandts Spaces, a bespoke interior design and concept service, and the Maison Estate in Franschhoek — home to a collection of superb wines and a fine dining restaurant. Our in-store experience includes The Kitchen restaurants and niche coffee bars at selected stores — bringing to life our vision of celebrating good living with all the senses.</P>
            </div>
        </div>
        <br>

        <!-- furniture -->
         <section class="shop">
        <div id="shop">
            <div class="head">
                <h1>FURNITURE</h1>
            </div>
            <div class="shops">
                <a href="product.html">
                <div class="card">
                    
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
                    <i class="ri-heart-line"></i>
                    

                </div>

                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '6'";
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
                    <img src="images/product_2/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_2/bubble_sofa_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '11'";
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
                    <img src="images/product_3/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_3/classy_sofa_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '16'";
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
                    <img src="images/product_4/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_4/coffe_set_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '21'";
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
                    <img src="images/product_5/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_5/coffee_table_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '26'";
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
                    <img src="images/product_6/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_6/dining_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '31'";
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
                    <img src="images/product_7/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_7/half_mirror_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
                <a href="product.html">
                <div class="card">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '36'";
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
                    <img src="images/product_8/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/product_8/lamp_1.jpg" alt=""></a>
                    <p>Luxury Sofa's</p>
                    <p>R999</p>
                    <p>Feel Comfort</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->

                </div>
            </div>
        </div>
        </section>
        <br><br><br>

        <!-- Homeware -->
         <section class="arrival">
        <div id="arrival">
            <div class="head">
                <h1>Homeware</h1>
            </div>
            <div class="arrival">
                <a href="product.html">
                <div class="arrivalCard">

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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_1.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '46'";
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
                    <img src="images/product_10/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_2.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '51'";
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
                    <img src="images/product_11/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_3.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '56'";
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
                    <img src="images/product_12/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_7.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '61'";
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
                    <img src="images/product_13/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_5.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '66'";
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
                    <img src="images/product_14/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_6.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '71'";
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
                    <img src="images/product_15/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_8.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>

                <a href="product.html">
                <div class="arrivalCard">

                <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '76'";
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
                    <img src="images/product_16/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                    <!-- <img src="images/homeware_9.jpg" alt=""></a>
                    <h3>Exciting Offer's</h3>
                    <p>Shop Now At Lowest Price</p>
                    <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                </div>
            </div>
        </div>
    </section>
    <br><br>
        <!-- sale -->
        <section class="sale">
            <div id="sale">
                <div class="head">
                    <h1 style="color: red;">SALE</h1>
                </div>
                <div class="sales">
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '81'";
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
                    <img src="images/product_17/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/sofa_1.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
                        
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '86'";
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
                    <img src="images/product_18/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/sofa_2.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '91'";
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
                    <img src="images/product_19/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/sofa_3.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '96'";
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
                    <img src="images/product_20/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/setup_1.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '101'";
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
                    <img src="images/product_21/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/setup_2.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '106'";
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
                    <img src="images/product_22/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/homeware_1.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '111'";
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
                    <img src="images/product_23/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/homeware_2.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                    <a href="product.html">
                    <div class="card">

                    <?php
                        $query = "SELECT * FROM `pruducts` WHERE `product_id` = '116'";
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
                    <img src="images/product_24/<?php echo $image; ?>" alt="<?php echo $name; ?> "></a>
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
                    <i class="ri-heart-line"></i>
                        <!-- <img src="images/set_1.jpg" alt=""></a>
                        <p>Luxury Sofa's</p>
                        <p>R999</p>
                        <p>Feel Comfort</p>
                        <i class="ri-shopping-cart-2-fill"></i><i class="ri-heart-line"></i> -->
    
                    </div>
                </div>
            </div>
            </section>
            <br><br>
         

        
        <!-- footer -->
        <div class="footer">
            <div class="text">
                <h3>THE COMPANY</h3><br>
                <p>History</p>
                <p>Careers</p>
                <p>Stores</p>
                <p>Contact us</p>
                

            </div>
            <div class="text">
                <h3>Account</h3><br>
                <p>My account</p>
                <p>Wishlist</p>
                <p>Returns</p>
                

            </div>
            <div class="text">
                <h3>LOWEST PRICE</h3><br>
                <p>Affordable</p>
                <p>Quality</p>
                <p>Best Price</p>
                <p>Offer</p>

            </div>
            <div class="text">
                <h3>CUSTOMER SERVICE</h3><br>
                <p>International shipping</p>
                <p>FAQ</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>

            </div>
        </div>
    </div>
    <hr> &copy; Lethabo
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <!-- <script src="web.js"></script> -->
</body>
</html>