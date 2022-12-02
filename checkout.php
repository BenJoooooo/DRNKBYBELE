<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");
    include ("includes/header.php");
?>

    <div class="checkout-container">

        <?php $cart_items = getCartDetails();
        if(mysqli_num_rows($cart_items) > 0) {
        foreach ($cart_items as $items) {
            $total = 0;
        ?>

        <main class="menu-checkout area-one">
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

                <div class="contact-header">
                    <h4 class="contact">Contact Information</h4>
                    <!-- <p class="account"></p> -->

                    <div class="signup-card-body">
                        <form action="shipping.php" method="POST" class="checkout-form" enctype="multipart/form-data">
                            <div class="signup">
                                <label for="">Email</label>
                                <input type="email" name="email" class="signup-input" value="<?= $items['email']; ?>" placeholder="Enter Email">
                            </div>

                            <h4 class="contact-shipping">Shipping address</h4>

                            <div class="signup">
                                <label for="">Country/Region</label>
                                <select name="country" id="country" class="signup-input">
                                    <option selected>Philippines</option>

                                </select>
                            </div>

                            <div class="signup">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="signup-input" required value="<?= $items['fullname']; ?>" placeholder="Full Name">
                            </div>

                            <div class="signup">
                                <label for="">Address</label>
                                <input type="text" name="address" class="signup-input" value="<?= $items['address'] ?>" required placeholder="Address">
                            </div>

                            <div class="signup">
                                <label for="">Apartment, suite, etc. (optional)</label>
                                <input type="text" name="apartment" class="signup-input" value="<?= $items['apartment'] ?>" required placeholder="Apartment, suite, etc. (optional)">
                            </div>

                            <div class="signup-role">
                                <div class="signup price">
                                    <label for="">Postal code</label>
                                    <input type="number" name="postal"  class="signup-input" value="<?= $items['postal'] ?>" required placeholder="Postal code">
                                </div>
                                <div class="signup price">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="signup-input" value="<?= $items['city'] ?>" required placeholder="City">
                                </div>
                            </div>

                            <div class="signup">
                                <label for="">Region</label>
                                <input type="text" name="region" class="signup-input" value="<?= $items['region'] ?>" required placeholder="Region">
                            </div>

                            <div class="signup">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="signup-input phone" value="<?= $items['phone'] ?>" required placeholder="Phone">
                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="In case we need to contact you about your orders"></i>
                            </div>

                            <div class="signup-role">
                                <div class="signup admin-role">
                                    <input type="checkbox" name="status" class="signup-input">
                                    <label for="">Save this information for next time</label>
                                </div>
                            </div>

                            <h4 class="contact">Shipping Information</h4>

                            <!-- Accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <input type="radio" class="me-2" name="courier" id="" required value="othercourier">
                                        <label for="">Other courier</label>
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body text-center">
                                            <img class="mb-3" src="img/othercourier.png" alt="">
                                            <p><Strong>Same-day Delivery</Strong> (NOT FREE, book your orn courier or we can book via lalamove and other third part couriers)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <input type="radio" name="courier" class="me-2" id="" required value="drnkcourier">
                                        <label for="">DRNK courier</label>
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body text-center">
                                            <img class="mb-3" src="img/drnkcourier.png" alt="">
                                            <p><Strong>Same-day Delivery</Strong> (Base price: <span>&#8369</span>40 within Cubao area. Message Us for price quotation and delivery rates)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <input type="radio" name="courier" class="me-2" id="" required value="pickup">
                                        <label for="">pickup</label>
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body text-center">
                                            <img class="mb-3" src="img/pickup.png" alt="">
                                            <p>You will receive notifications of your order status</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion end -->

                            <!-- <div class="contact-shipping-info">
                                <div class="contact-info">
                                    <input type="radio" name="courier" required value="othercourier">
                                    <label for="">Same-day Delivery (NOT FREE; book your own courier or we can book via Lalamove</label>
                                </div>
                                <hr>
                                <div class="contact-info">
                                    <input type="radio" name="courier" required value="drnkcourier">
                                    <label for="">DRNK courier (Base price: P40 within Cubao area)</label>
                                </div>
                                <hr>
                                <div class="contact-info">
                                    <input type="radio" name="courier" required value="pickup">
                                    <label for="">Pick up</label>
                                </div>
                            </div> -->
                            
                            <div class="buttons">
                                    <a href="cart.php" class="back-to-cart">Back to Cart</a>
                                    <button name="shipping" class="buy-now addAddress">Continue to shipping</button">
                            </div>
                        </form>
                    </div>
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
                <div class="divider">
                    <h4>Shipping</h4>
                    <h4>Free</h4>
                </div>
            </div>
            <hr>

            <div class="total-container">
                <div class="divider">
                    <h4>Total</h4>
                    <p><span>&#8369 </span><?= $total ?></p>
                </div>
            </div>
        </aside>

        <?php 
            }
        } else {
                ?>

                    <div class="error-message-container">
                        <div class="product-not-available">
                            <img src="img/emptyCart.png" alt="">
                        </div>
                    </div>
                    <div class="error-message-container">
                        <div class="product-not-available">
                            <h3 class="text-message">Sorry, checkout is empty!</h3>
                        </div>
                    </div>
                    
                <?php
        }
        ?>

    </div>

<?php 
    require ("includes/footer.php");
?>
