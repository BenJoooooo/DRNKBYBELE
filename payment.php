<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");

    if(!isset($_POST['paynow'])) {
        header("location: shipping.php");
    }   

    include ("includes/header.php");
    
?>

    <div class="checkout-container">

        <?php $cart_items = getCartDetails();
        foreach ($cart_items as $items) {
            $total = 0;
        ?>

        <main class="menu-checkout area-one">
            <form action="functions/placeorder.php" method="POST">
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

                <!-- Accordion -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <input type="radio" name="payment"  id="" required value="paymongo">
                            <label class="mx-2" for="">Secure Payments via PayMongo</label>

                            <div class="images">
                                <img src="img/grab.png" class="img-thumbnail" alt="">
                                <img src="img/bdo.png" alt="">
                                <img src="img/gcash.png" alt="">
                                <img src="img/maya.png" alt="">
                                <small class="mx-1">and more...</small>
                            </div>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img class="text-center" src="img/appWindow.png" alt="">
                                You will be redirected to Secure Payments via PayMongo to complete your purchase securely. 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <input type="radio" name="payment" class="me-2" id="" required value="maya">
                            <label for="">Maya</label>
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img class="maya" src="img/pymya.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <input type="radio" name="payment" class="me-2" id="" required value="gcash">
                            <label for="">Gcash</label>
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <p>Bank Details:</p>
                                <p>Account Name: Lexa Natalie C. Juntado</p>
                                <p>Account Number: 0966 275 0476</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion end -->

                <div class="buttons">
                    <a href="shipping" class="back-to-cart">Back to Shipping</a>
                    <button type="submit" name="paynow" class="buy-now">Pay Now</button">
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

            $_SESSION['price'] = $total;

        }
        ?>

    </div>

<?php 
    require ("includes/footer.php");
?>
