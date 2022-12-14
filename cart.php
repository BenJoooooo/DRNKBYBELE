<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");
    include ("includes/header.php");
?>

    <main class="menu-cart">

        <div class="main-container">
            <h1 class="title">Your Shopping Cart</h1>
        </div>

        <table class="table-cart">
            <thead class="table-head-cart">
                <tr class="table-row-cart">
                    <th class="data-cart products">Product</th>
                    <th class="data-cart"></th>
                    <th class="data-cart quantity">Quantity</th>
                    <th class="data-cart total">Total</th>
                </tr>
            </thead>

            <tbody class="table-body-cart" id="myCart">

            <?php $items = getCartItems();
            $total = 0;
            $totalPrice = 0;

            foreach ($items as $item) { 

            $totalItem = $item['selling_price'] * $item['prod_qty'];
            ?>


                <tr class="table-row-cart-items product_data">
                    <td class="data-cart-items-img">
                        <a href="drnksproductinfo.php?product=<?= $item['slug'] ?>">
                            <img src="uploadsProducts/<?= $item['image']; ?>" alt="">
                        </a>
                        
                    </td>
                    
                    <td class="data-cart-items-prod">
                        <a href="drnksproductinfo.php?product=<?= $item['slug'] ?>">
                            <p><?= $item['name']; ?></p>
                            <p><?= $item['cat_name'] ?></p>
                        </a> 
                        <button class="data-cart-remove-item deleteItem" value="<?= $item['cid']; ?>">Remove</button>
                    </td>
                    <td class="data-cart-items-qty">
                        <div class="input-group">
                            <input type="hidden" class="prodId" value="<?= $item['prod_id'] ?>">

                            <div class="buttons">
                                <button><i class="fa fa-angle-up increment-btn updateQty"></i></button>
                                <button><i class="fa fa-angle-down decrement-btn updateQty"></i></button>
                            </div>
                            <!-- <div class="input-group-prepend">
                                <button class="input-group-text decrement-btn updateQty">-</button>
                            </div> -->
                                <input type="text" class="form-control input-qty" disabled value="<?= $item['prod_qty'] ?>">
                            <!-- <div class="input-group-append">
                                <button class="input-group-text increment-btn updateQty">+</button>
                            </div> -->
                        </div>
                    </td>
                    <td class="data-cart-items-total"><p>&#8369 <?= $totalItem ?> </p> </td>
                </tr>
            <?php 
            $totalPrice += $item['selling_price'] * $item['prod_qty'];
                }
            ?>
            </tbody>
        </table>

        <form action="checkout.php" method="POST">
            <div class="lower-container">
                <div class="instructions">
                    <p>Special Instructions for the seller</p>
                    <textarea name="special-instruction" id="" placeholder="Write your message" ></textarea>
                </div>
                <div class="total">
                    <h3>Subtotal <span>&#8369</span><span><?= $totalPrice ?></span></h3>
                    <p>Tax included and shipping calculated at checkout </p>
                    <button class="" name="checkout">Checkout</button>
                </div>
            </div>
        </form>
    </main>
<?php 
    require ("includes/footer.php");
?>
