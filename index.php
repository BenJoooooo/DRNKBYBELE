<?php
    session_start();

    include ("core/dbcon.php");

    // fetches all data from the table
    function getImage($table) {

        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);
    }
    
    require ("includes/header.php");
    
?>
        <main>

            <section>
                <!-- <div class="carousel-frame">
                    
                    <button class="carousel-button prev"><i class="fa fa-angle-left"></i></button>
                    <button class="carousel-button next"><i class="fa fa-angle-right"></i></button>

                    <div class="slide-images">
                        <div class="background">
                            <img src="img/backgroundOne.jpg" alt="">
                        </div>
                        <div class="background">
                            <img src="img/backgroundOne.jpg" alt="">
                        </div>
                    </div>
                </div> -->
                    
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <section>
                <div class="card-pictures-container">
                    
                    <h1 class="featured-products">Featured Products</h1>

                    <div class="card-pictures">
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/DSC_0438.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/edit-2.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/edit-3.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                        <div class="product-container">
                            <img src="img/sample.jpg" alt="">
                            <h3>Passion Fruit Tea</h3>
                            <small>from 90.00</small>
                        </div>
                    </div>

                    <div class="card-arrows">
                        
                    </div>
                </div>
            </section>

        </main>

    <?php 
        require ("includes/footer.php");
    ?>
