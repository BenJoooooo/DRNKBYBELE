<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");

    if(isset($_POST['shipping'])) {

        // Save all sessions from post method
        $_SESSION['userid'] = $_POST['user'];
        $_SESSION['saveinfo'] = $_POST['saveinfo'];
        $_SESSION['courier'] = $_POST['courier'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['status'] = isset($_POST['status']) ? '1':'0';
        $_SESSION['addressinfo'] = $_POST['address'];
        $_SESSION['apartment'] = $_POST['apartment'];
        $_SESSION['postal'] = $_POST['postal'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['region'] = $_POST['region'];
        $_SESSION['country'] = $_POST['country'];
        $_SESSION['address'] = $_POST["address"]. ', ' .$_POST['apartment']. ', ' .$_POST['postal']. ' ' .$_POST['city'] .', '.$_POST['region']. ', ' .$_POST['country'];

        // Placed into a variable to save on database
        $userid = $_SESSION['userid'];
        $country = $_SESSION['country'];
        $address = $_SESSION['addressinfo'];
        $apartment = $_SESSION['apartment'];
        $postal = $_SESSION['postal'];
        $city = $_SESSION['city'];
        $region = $_SESSION['region'];
        $phone = $_SESSION['phone'];
        $saveinfo = $_SESSION['saveinfo'];

        if($saveinfo == 'yes') {
            $query = "UPDATE users SET country = '$country', address = '$address', apartment = '$apartment', postal = '$postal', city = '$city', region = '$region', phone = '$phone' WHERE id = '$userid'";
            $query_run = mysqli_query($con, $query);
        }
        // $_SESSION['specialmsg'] = $_POST['special-instruction'];

    } else {
        header("location: checkout.php");
    }

    include ("includes/header.php");
?>

    <div class="checkout-container">

        <?php 
            $cart_items = getCartDetails();
            foreach ($cart_items as $items) {
                $total = 0;
        ?>

        <main class="menu-checkout area-one">
            <form action="payment.php" method="POST">
            <div class="info-checkout">
                <h4 class="brand-title">DRNK BY BELE</h4>
                <div class="nav-checkout">
                    <a href="cart" class="cart">Cart</a>
                    <i class='fa fa-angle-right'></i>
                    <a href="checkout" class="cart">Information</a>
                    <i class='fa fa-angle-right'></i>
                    <a href="shipping" class="cart">Shipping</a>
                    <i class='fa fa-angle-right'></i>
                    <a href="payment" class="cart">Payment</a>
                </div>

                <div class="contact-header">
                    <div class="contact-shipping-info">
                        <div class="contact-info">
                            <p class="width">Contact</p>
                            <p class="info"><?= $_SESSION['email'].' / '.$_SESSION['phone'];?></p>
                        </div>
                        <hr>
                        <div class="ship">
                            <p class="width">Ship to</p>
                            <p class="info"><?= $_SESSION['address']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <a href="checkout" class="back-to-cart">Back to Information</a>
                    <button type="submit" name="paynow" class="buy-now">Payment</button">
                </div>

            </div>

            
        </main>
        <aside class="menu-checkout area-two">
        
            <div class="checkout">
                <?php foreach ($cart_items as $items) {
                $total_qty = $items['selling_price'] * $items['prod_qty'];
                $total += $items['selling_price'] * $items['prod_qty'];
                ?>
                    
                <div class="container">
                    <div class="drink-info">
                        <img src="uploadsProducts/<?= $items['image']; ?>" alt="">
                        <p class="qty"><?= $items['prod_qty']; ?></p>
                    </div>
                    <div class="drink-title">
                        <div class="drinktitle-container">
                            <h4><?= $items['name']; ?> <?= $items['cat_name']; ?></h4>
                            <h5>(<?= $items['cat_name']; ?> Series)</h5>
                            <h6>Size - <?= $items['size']; ?></h6>
                        </div>
                        <div class="drinktitle-price">
                            <p><span>&#8369 </span><?= $total_qty ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <hr>

            <div class="total-container">
                <div class="divider">
                    <h4>Subtotal</h4>
                    <h5><span>&#8369 </span><?= $total ?></h5>
                </div>

                <?php 
                
                if($_SESSION['courier'] == "drnkcourier") {
                    if($total > 1000) {
                        ?>
                    <div class="divider">
                        <h4>Shipping</h4>
                        <h4>Orders above 1,000 pesos are FREE of shipping</h4>
                    </div>

                    <div class="total-container">
                        <div class="divider">
                            <h4>Total</h4>
                            <p><span>&#8369 </span><?=  $total ?></p>
                        </div>
                    </div>
                    <?php

                    } else {
                        
                    $total += 40;
                    ?>
                    <div class="divider">
                        <h4>Shipping</h4>
                        <h4><span>&#8369 </span>40</h4>
                    </div>

                    <hr>

                    <div class="total-container">
                        <div class="divider">
                            <h4>Total</h4>
                            <p><span>&#8369 </span><?= $total ?></p>
                        </div>
                    </div>
                    <?php
                    }               
                ?>
                
            </div>
            
            <?php

                } elseif($_SESSION['courier'] == "othercourier") {

                    if($total > 1000) {
                        ?>

                    <div class="divider">
                        <h4>Shipping</h4>
                        <h4>Orders above 1,000 pesos are FREE of shipping</h4>
                    </div>

                    <div class="total-container">
                        <div class="divider">
                            <h4>Total</h4>
                            <p><span>&#8369 </span><?= $total?></p>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>

                    <div class="divider">
                        <h4>Shipping</h4>
                        <h4>Not Free</h4>
                        
                    </div>

                    <div class="total-container">
                        <div class="divider">
                            <h4>Total</h4>
                            <p><span>&#8369 </span><?= $total?></p>
                        </div>
                    </div>
                    <?php
                    }                    
                } else {

                    ?>

                    <div class="divider">
                        <h4>Shipping</h4>
                        <h4>Pick-up</h4>
                        
                    </div>

                    <div class="total-container">
                        <div class="divider">
                            <h4>Total</h4>
                            <p><span>&#8369 </span><?= $total?></p>
                        </div>
                    </div>
                    <?php

                }
            ?>  
        </form>

            
        </aside>

        <?php 

        }
        ?>

    </div>

    

<?php 
    require ("includes/footer.php");
?>
