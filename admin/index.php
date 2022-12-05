<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('includes/header.php');

    $adminCount = getAdmin("users");
    $getAdminCount = mysqli_num_rows($adminCount);

    $userCount = getUsers("users");
    $getUserCount = mysqli_num_rows($userCount);

    $categoriesCount = getAll("categories");
    $getCategoriesCount = mysqli_num_rows($categoriesCount);

    $productsCount = getAll("products");
    $getProductsCount = mysqli_num_rows($productsCount);

?>
    <div class="wrapper">
        <?php include ('includes/sidebar.php'); ?>

        <div class="body-wrapper">
            <header class="header-admin">
                <div class="navigation-container-admin">
                    <div class="main-logo-container">
                        <a href=""><img src="../img/drnklogo.png" alt="" class="main-logo-picture"></a>
                    </div>

                    <nav>
                        <?php if(isset($_SESSION['auth'])) { ?>
                            <?php if(($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) { ?>
                                <div class="nav-admin">
                                    <a href="admin/index.php">Admin</a>
                                </div>
                                <?php }?>
                        <?php } ?>
                        <div class="nav-home">
                            <a href="index.php">Home</a>
                        </div>
                        <div class="nav-menu">
                            <a href="menu.php">Menu</a>
                        </div>
                        <div class="nav-about">
                            <a href="about.php">About</a>
                            <!-- Continue -->
                            <div class="dropdown-contact">
                                <a href="" class="dropdown-drnkbybele">DRNK by BELE</a>
                                <a href="" class="dropdown-ourhistory">Our History</a>
                            </div>
                        </div>
                        <div class="nav-contact">
                            <a href="contact.php">Contact</a>
                        </div>
                        <div class="nav-blog">
                            <a href="blog.php">Blog</a>
                        </div>
                    </nav>

                    <div class="search-bar-container">

                        <!-- <form action="" class="search-bar">
                            <input class="search-bar-input" type="text" placeholder="Looking for?" spellcheck="false">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form> -->

                        <?php if(!isset($_SESSION['auth'])): ?>

                        <div class="svg-container"> 
                            <a href="cart.php">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bag" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 319.987 319.987" style="enable-background:new 0 0 319.987 319.987;" xml:space="preserve"><g><g><path d="M314.49,301.082l-39.829-189.186c-1.461-6.94-7.584-11.909-14.678-11.909h-25V75c0-41.354-33.645-75-75-75    s-75,33.646-75,75v24.986h-25c-7.094,0-13.217,4.969-14.678,11.909l-40,190c-0.931,4.424,0.182,9.032,3.03,12.543    c2.849,3.511,7.128,5.549,11.648,5.549h280c0.006,0,0.014,0,0.02,0c8.285,0,15-6.716,15-15    C315.003,303.636,314.825,302.328,314.49,301.082z M114.983,75c0-24.813,20.187-45,45-45c24.814,0,45,20.187,45,45v24.986h-90V75z     M243.628,129.986c-7.141,39.684-42.056,70-83.645,70c-41.587,0-76.503-30.317-83.644-70H243.628z M38.47,289.986l23.997-113.984    c4.661,7.421,10.201,14.36,16.577,20.678c18.084,17.919,41.091,29.114,65.939,32.335v15.972c0,8.284,6.716,15,15,15    s15-6.716,15-15v-15.972c24.849-3.221,47.855-14.416,65.939-32.335c6.376-6.317,11.916-13.258,16.577-20.679l23.997,113.985H38.47    z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            </a>
                            <a href="login.php">
                                <svg xmlns="http://www.w3.org/2000/svg" class="user" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 490.1 490.1" style="enable-background:new 0 0 490.1 490.1;" xml:space="preserve"><g><g><path d="M245,261.75c71.9,0,131.4-57.3,131.4-130.3S316.9,0.05,245,0.05s-131.4,57.3-131.4,130.3S173.1,261.75,245,261.75z     M245,40.75c50,0,90.7,40.7,90.7,89.7s-40.7,89.6-90.7,89.6s-90.7-40.7-90.7-89.7S195,40.75,245,40.75z"/><path d="M333.6,274.25c-8.3-2.1-16.7,0-21.9,6.3l-66.7,76.1l-66.7-76.1c-5.2-6.3-14.6-8.3-21.9-6.3C61.5,305.55,0,382.65,0,469.15    c0,11.5,9.4,20.9,20.9,20.9h448.3c11.5,0,20.9-9.4,20.9-20.9C490,382.65,428.5,305.55,333.6,274.25z M42.7,449.35    c8.4-57.3,50.1-106.3,114.7-131.3l73,83.4c7.3,9.4,22.9,9.4,30.2,0l73-83.4c63.6,25,106.4,75,114.7,131.3H42.7z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            </a>
                        </div>

                        <?php  else : ?>
                            
                        <div class="svg-container"> 
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION['auth_user']['fullname']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">my purchase</a></li>
                                    <li><a class="dropdown-item" href="">order history</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div> 
                            
                        <?php endif; ?>

                    </div>
                </div>
                
            </header>

            <div class="admin-main-content">
                
                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>
            
                <div class="admin-page-header">
                    <div class="admin-page-greet">
                        <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                    </div>
                    <div class="admin-page-title">
                        <h3>Dashboard</h3>
                    </div>
                </div>

                <div class="admin-card-container">
                    <a href="admin_admin.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getAdminCount); ?></h4>
                                <h5>Admin</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_users.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getUserCount); ?></h4>
                                <h5>Users</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_categories_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getCategoriesCount); ?></h4>
                                <h5>Categories</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-th"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_products_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getProductsCount); ?></h4>
                                <h5>Products</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-glass-whiskey"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4>Dummy</h4>
                                <h5>Income</h5>
                            </div>
                            <div class="icon">
                                <i class="	fas fa-money-check"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4>Dummy</h4>
                                <h5>Orders</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_admin.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getAdminCount); ?></h4>
                                <h5>Admin</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_users.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getUserCount); ?></h4>
                                <h5>Users</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_categories_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getCategoriesCount); ?></h4>
                                <h5>Categories</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-th"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_products_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getProductsCount); ?></h4>
                                <h5>Products</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-glass-whiskey"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4>Dummy</h4>
                                <h5>Income</h5>
                            </div>
                            <div class="icon">
                                <i class="	fas fa-money-check"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4>Dummy</h4>
                                <h5>Orders</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_admin.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getAdminCount); ?></h4>
                                <h5>Admin</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_users.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getUserCount); ?></h4>
                                <h5>Users</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_categories_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getCategoriesCount); ?></h4>
                                <h5>Categories</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-th"></i>
                            </div>
                        </div>
                    </a>

                    <a href="admin_products_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4><?php print_r($getProductsCount); ?></h4>
                                <h5>Products</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-glass-whiskey"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4>Dummy</h4>
                                <h5>Income</h5>
                            </div>
                            <div class="icon">
                                <i class="	fas fa-money-check"></i>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="details">
                                <h4>Dummy</h4>
                                <h5>Orders</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
    include ('includes/footer.php');
?>