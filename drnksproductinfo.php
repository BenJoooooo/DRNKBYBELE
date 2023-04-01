<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php");
    
    if(isset($_GET['product'])) {

        $product_slug = $_GET['product'];
        $product_data = getTablesOnSlug("products","categories", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if($product) { 
            ?>

                 <main class="menu">

                    <div class="product-container product_data">
                        <div class="product-image-container">
                            <img src="uploadsProducts/<?= $product['image']; ?>" alt="">
                        </div>

                        <div class="product-content-container">
                            <div class="product-description">
                                <h3><?= $product['product_name']; ?></h3>
                                <h5><?= $product['category_name']; ?></h5>
                                <p><?= $product['description']; ?></p>
                            </div>
                            <div class="product-info-order">
                                <div class="product-price">
                                    <div class="price-container">
                                        <p class="price"><span>Price: </span> &#8369 <?=  $product['selling_price']; ?></p>
                                        <p class="small">Tax included</p>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="input-group-text decrement-btn">-</button>
                                        </div>
                                        <input type="text" class="form-control input-qty" disabled value="1">
                                        <div class="input-group-append">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="add-to-cart addToCartBtn" value="<?= $product['id']; ?>">Add to cart</button>
                                    <button class="buy-now buyNowBtn" value="<?= $product['id']; ?>">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            <?php
        } else {
            ?>
                <div class="error-message-container">
                    <div class="product-not-available">
                        <h3 class="text-message">Product Not Found!</h3>
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