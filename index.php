<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php");
    
?>

        <main>

        <!-- ----------------------------------------- -->
        <!-- Image Carousel for background cover photo -->
        <!-- ----------------------------------------- -->
            <section>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php 
                        $feth_data = getImage("images"); 
                        if(mysqli_num_rows($feth_data) > 0) {
                            foreach ($feth_data as $data) { ?>
                                <div class="carousel-item active">
                                    <img src="uploads/<?= $data['image']; ?>" class="d-block w-100" alt="...">
                                </div>
                        <?php
                            }
                        } ?>
                        
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </section>

            <!-- ------------------------------------ -->
            <!-- Image carousel for featured products -->
            <!-- ------------------------------------ -->
            <section class="section-wrapper">

                <h1 class="featured-products">Featured Products</h1>

                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">

                            <div class="card-container swiper-slide">
                                <div class="card-overlay"></div>

                                <div class="card-image">
                                    <img src="img/DSC_0438.jpg" alt="" class="card-img">
                                    <span class="card-price"></span>
                                </div>

                                <div class="card-content">
                                    <div class="card-texts">
                                        <h4 class="card-flavor">Wintermelon</h4>
                                        <h5 class="card-category">Milktea</h5>
                                    </div>

                                    <div class="card-rate-orders">
                                        <div class="card-rates">
                                            <span><i class="fas fa-star-half-alt"></i></span>
                                            <small class="rate">4.8</small>
                                        </div>
                                        <div class="drink-sizes">
                                            <span class="small"><i class='fas fa-glass-whiskey'></i></i></span>
                                            <span class="medium"><i class='fas fa-glass-whiskey'></i></i></span>
                                            <span class="large"><i class='fas fa-glass-whiskey'></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn btn-primary">Add to cart</div>
                            </div>

                            <div class="card-container swiper-slide">
                                <div class="card-overlay"></div>

                                <div class="card-image">
                                    <img src="img/DSC_0438.jpg" alt="" class="card-img">
                                    <span class="card-price"></span>
                                </div>

                                <div class="card-content">
                                    <div class="card-texts">
                                        <h4 class="card-flavor">Wintermelon</h4>
                                        <h5 class="card-category">Milktea</h5>
                                    </div>

                                    <div class="card-rate-orders">
                                        <div class="card-rates">
                                            <span><i class="fas fa-star-half-alt"></i></span>
                                            <small class="rate">4.8</small>
                                        </div>
                                        <div class="drink-sizes">
                                            <span class="small"><i class='fas fa-glass-whiskey'></i></i></span>
                                            <span class="medium"><i class='fas fa-glass-whiskey'></i></i></span>
                                            <span class="large"><i class='fas fa-glass-whiskey'></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn btn-primary">Add to cart</div>
                            </div>

                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </section>
        </main>
    
    
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/script.js"></script>
    <?php 
        require ("includes/footer.php");
    ?>
