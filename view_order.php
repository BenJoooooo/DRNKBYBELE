<?php
    include ("functions/userFunctions.php");
    include ("includes/header.php");
    include ("authenticate-user.php");

    if(isset($_GET['id'])) {

        $tracking_no = $_GET['id'];
        $resultTracking = checkTrackingAndOrderDetails($tracking_no);
        $data = mysqli_fetch_array($resultTracking);

        if($data) {

?>

    <div class="checkout-container">

        <main class="menu-checkout area-one">
            <div class="info-checkout">
                <h4 class="brand-title">DRNK BY BELE</h4>

                <div class="contact-header">

                    <div class="greeting-order-detail">
                        <p>Tracking #<?= $data['tracking_no']; ?></p>
                        <p>Thank you <?= $data['name']; ?>!</p>
                    </div>

                    <div class="signup-card-body">
                        <div class="contact-header">
                            <div class="contact-shipping-info">

                                <p class="header">Your order is confirmed</p>

                                <div class="greeting-order-detail-info">
                                    <p>Our store is open from 10:00 AM to 9:00 PM from Monday to Saturday. Last call for delivery is at 7:00 PM and 9:00 PM for pick up orders</p>
                                    <br>
                                    <p>To proceed your order, please send us a screenshot of your proof of payment to our Facebook page (@drnkybybele) or Instagram page (@drnkbybele)</p>
                                </div>

                                <hr>

                                <p class="header">Order updates</p>
                                <div class="greeting-order-detail-info">
                                    

                                    <p>You will get shipping updates through your email or phone number.</p>
                                </div>

                                <hr>

                                <div class="order-info-container">
                                    <div class="order-info-one">
                                        <p>Contact Information</p>
                                        <p><?= $data['email']; ?></p>
                                        <br>
                                        <p>Shipping Address</p>
                                        <p><?= $data['name']; ?></p>
                                        <p><?= $data['address']; ?></p>
                                        <p><?= $data['phone']; ?></p>
                                        <br>
                                        <p>Shipping Mode</p>
                                        <?php if($data['courier'] == 'drnkcourier') {
                                        ?>
                                            <p><?= $data['courier']; ?>: Same-day Delivery (Base price: ₱40 within Cubao area. Message Us for price quotation and delivery rates)</p>
                                        <?php
                                        } else {
                                        ?>
                                            <p><?= $data['courier']; ?>: Same-day Delivery (NOT FREE, book your orn courier or we can book via lalamove and other third part couriers)</p>
                                        <?php
                                        }?>
                                        <br>
                                        <p>Comments</p>
                                        <p><?= $data['comments']; ?></p>
                                        <br>
                                        <p>Order Placed</p>
                                        <p><?= $data['created_at']; ?></p>
                                    </div>

                                    <div class="order-info-two">
                                        <p>Payment Method</p>
                                        <p><?= $data['payment_mode']; ?> - <span>&#8369</span><?= $data['total_price']; ?></p>
                                        <br>
                                        <p>Billing Address</p>
                                        <p><?= $data['name'] ?></p>
                                        <p><?= $data['address']; ?></p>
                                        <p><?= $data['phone']; ?></p>
                                        <br>
                                        <p>Shipping Mode</p>
                                        <?php if($data['courier'] == 'drnkcourier') {
                                        ?>
                                            <p><?= $data['courier']; ?>: Same-day Delivery (Base price: ₱40 within Cubao area. Message Us for price quotation and delivery rates)</p>
                                        <?php
                                        } else {
                                        ?>
                                            <p><?= $data['courier']; ?>: Same-day Delivery (NOT FREE, book your orn courier or we can book via lalamove and other third part couriers)</p>
                                        <?php
                                        }?>
                                        <br>
                                        <p>Comments</p>
                                        <p><?= $data['comments']; ?></p>
                                        <br>
                                        <p>Order Placed</p>
                                        <p><?= $data['created_at']; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <?php 

            $items = getOrderDetails($tracking_no);
            if(mysqli_num_rows($items) > 0) {
                $item = mysqli_fetch_array($items);
            }

            $total = 0;
        ?>
        
        
        <aside class="menu-checkout area-two">
            <div class="checkout">
                <?php foreach ($items as $item) {
                
                $total += $item['price'];
                ?>
                    
                <div class="container">
                    <div class="drink-info">
                        <img src="uploadsProducts/<?= $item['image']; ?>" alt="">
                        <p class="qty"><?= $item['qty']; ?></p>
                    </div>
                    <div class="drink-title">
                        <div class="drinktitle-container">
                            <h4><?= $item['prod_name']; ?> <?= $item['cat_name']; ?></h4>
                            <h5>(<?= $item['cat_name']; ?> Series)</h5>
                            <h6>Size - <?= $item['size']; ?></h6>
                        </div>
                        <div class="drinktitle-price">
                            <p><span>&#8369 </span><?= $item['price']; ?></p>
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

                    <?php
                        if($item['courier'] == 'drnkcourier') {
                            ?> <h4>Shipping</h4>
                               <h4>&#8369 40</h4>
                            <?php
                        } else {
                            ?>  <h4>Shipping</h4>
                                <h4>FREE</h4>
                            <?php
                        }
                    ?>

                </div>
            </div>
            <hr>

            <div class="total-container">
                <div class="divider">
                    <h4>Total</h4>

                    <?php 
                        if($item['courier'] == 'drnkcourier') {
                            ?>
                                <p><span>&#8369 </span><?= $total + 40 ?></p>
                            <?php
                        } else {
                            ?>
                            <p><span>&#8369 </span><?= $total ?></p>
                            <?php
                        }
                    ?>
                </div>

                <div class="divider">
                    <h4>Status</h4>
                    <h5><?php 
                        if($item['status'] == 0) {
                            echo "Pending";
                        } elseif($item['status'] == 1) {
                            echo "Declined";
                        } elseif($item['status'] == 2) {
                            echo "Processing";
                        } elseif($item['status'] == 3) {
                            echo "Completed";
                        } elseif($item['status'] == 4) {
                            echo "Delivery";
                        } elseif($item['status'] == 5) {
                            echo "Failed Order";
                        } else {
                            echo "Error";
                        }
                    ?></h5>
                </div>
            </div>
        </aside>
    </div>

<?php 
        } else {

            ?>
                <div class="error-message-container">
                    <div class="product-not-available">
                        <h3 class="text-message">Something went wrong!</h3>
                    </div>
                </div>
            <?php

        }

    } else {

        ?>
            <div class="error-message-container">
                <div class="product-not-available">
                    <h3 class="text-message">Something Went Wrong!</h3>
                </div>
            </div>
        <?php
        }
    
        require ("includes/footer.php");

?>

