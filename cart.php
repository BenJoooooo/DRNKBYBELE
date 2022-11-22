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
                    <th class="data-cart price">Price</th>
                    <th class="data-cart quantity">Quantity</th>
                    <th class="data-cart total">Total</th>
                </tr>
            </thead>

            <tbody class="table-body-cart">

            <?php $items = getCartItems();
            foreach ($items as $item) { ?>

                <tr class="table-row-cart-items  product_data">
                    <td class="data-cart-items-img"><img src="uploadsProducts/<?= $item['image']; ?>" alt=""></td>
                    <td class="data-cart-items-prod"><?= $item['name']; ?> <?= $item['cat_name'] ?></td>

                    <td class="data-cart-items-price"> &#8369 <?= $item['selling_price'] ?></td>
                    <td class="data-cart-items-qty">
                        <div class="input-group">
                            <input type="hidden" class="prodId" value="<?= $item['prod_id'] ?>">
                            <div class="input-group-prepend">
                                <button class="input-group-text decrement-btn updateQty">-</button>
                            </div>
                                <input type="text" class="form-control input-qty" disabled value="<?= $item['prod_qty'] ?>">
                            <div class="input-group-append">
                                <button class="input-group-text increment-btn updateQty">+</button>
                            </div>
                        </div>
                    </td>
                    <td class="data-cart-items-total"><?= $item['selling_price'] ?></td>
                </tr>

            <?php 
                }
            ?>
            </tbody>
        </table>
    </main>



<?php 
    require ("includes/footer.php");
?>
