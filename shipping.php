<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");

    if(isset($_POST['shipping'])) {
        // $courier = $_POST['courier'];
        // $name = $_POST['name'];
        // $phone = $_POST['phone'];
        // $email = $_POST['email'];
        // $status = isset($_POST['status']) ? '1':'0';
        // $addressinfo = $_POST["address"];
        // $apartment = $_POST['apartment'];
        // $postal = $_POST['postal'];
        // $city = $_POST['city'];
        // $region = $_POST['region'];
        // $country = $_POST['country'];
        // $address = $_POST["address"]. ', ' .$_POST['apartment']. ', ' .$_POST['postal']. ' ' .$_POST['city'] .', '.$_POST['region']. ', ' .$_POST['country'];

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
    } else {
        header("location: checkout.php");
    }

    include ("includes/header.php");

    // $_SESSION['courier'] =  $_POST['courier'];
    // $_SESSION['name'] = $_POST['name'];
    // $_SESSION['phone'] = $_POST['phone'];
    // $_SESSION['email'] = $_POST['email'];
    // $_SESSION['status'] = isset($_POST['status']) ? '1':'0';
    // $_SESSION['addressinfo'] = $_POST['address'];
    // $_SESSION['apartment'] = $_POST['apartment'];
    // $_SESSION['postal'] = $_POST['postal'];
    // $_SESSION['city'] = $_POST['city'];
    // $_SESSION['region'] = $_POST['region'];
    // $_SESSION['country'] = $_POST['country'];


    // $courier = $_POST['courier'];
    // $name = $_POST['name'];
    // $phone = $_POST['phone'];
    // $email = $_POST['email'];
    // $status = isset($_POST['status']) ? '1':'0';
    // $addressinfo = $_POST["address"];
    // $apartment = $_POST['apartment'];
    // $postal = $_POST['postal'];
    // $city = $_POST['city'];
    // $region = $_POST['region'];
    // $country = $_POST['country'];

    // if(isset($_POST['shipping'])) {
    //     $courier = $_POST['courier'];
    //     $name = $_POST['name'];
    //     $phone = $_POST['phone'];
    //     $email = $_POST['email'];
    //     $status = isset($_POST['status']) ? '1':'0';
    //     $addressinfo = $_POST["address"];
    //     $apartment = $_POST['apartment'];
    //     $postal = $_POST['postal'];
    //     $city = $_POST['city'];
    //     $region = $_POST['region'];
    //     $country = $_POST['country'];
    //     $address = $_POST["address"]. ', ' .$_POST['apartment']. ', ' .$_POST['postal']. ' ' .$_POST['city'] .', '.$_POST['region']. ', ' .$_POST['country'];
    // }
    // $_SESSION['address'] = $_POST["address"]. ', ' .$_POST['apartment']. ', ' .$_POST['postal']. ' ' .$_POST['city'] .', '.$_POST['region']. ', ' .$_POST['country'];
?>

    <div class="checkout-container">

        <?php $cart_items = getCartDetails();
        foreach ($cart_items as $items) {
            $total = 0;
        ?>

        <main class="menu-checkout">
            <form action="payment.php" method="POST">
            <div class="info-checkout">
                <h4 class="brand-title">DRNK BY BELE</h4>
                <div class="nav-checkout">
                    <a href="cart.php" class="cart">Cart</a>
                    <i class='fa fa-angle-right'></i>
                    <a href="checkout.php" class="cart">Information</a>
                    <i class='fa fa-angle-right'></i>
                    <a href="shipping.php" class="cart">Shipping</a>
                    <i class='fa fa-angle-right'></i>
                    <a href="payment.php" class="cart">Payment</a>
                </div>

                <?= $_SESSION['status'] ?>
                <?= $_SESSION['courier'] ?>

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
                    <a href="checkout.php" class="back-to-cart">Back to Information</a>
                    <button type="submit" name="paynow" class="buy-now">Payment</button">
                </div>

            </div>

            
        </main>
        <aside class="menu-checkout">
        
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
                            <h5>Series - <?= $items['cat_name']; ?></h5>
                            <h6>Small - 12 oz</h6>
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

                <!-- <input type="hidden" name="fullname" value="<?=$name;?>">
                <input type="hidden" name="email" value="<?=$email;?>">
                <input type="hidden" name="addressinfo" value="<?=$addressinfo;?>">
                <input type="hidden" name="apartment" value="<?=$apartment;?>">
                <input type="hidden" name="postal" value="<?=$postal;?>">
                <input type="hidden" name="city" value="<?=$city;?>">
                <input type="hidden" name="region" value="<?=$region;?>">
                <input type="hidden" name="country" value="<?=$country;?>">
                <input type="hidden" name="phone" value="<?=$phone;?>">
                <input type="hidden" name="status" value="<?=$status?>">
                <input type="hidden" name="price" value="<?=$total?>">
                <input type="hidden" name="courier" value="<?= $courier; ?>"> -->
        </form>

            
        </aside>

        <?php 

        }
        ?>

    </div>

    

<?php 
    require ("includes/footer.php");
?>
