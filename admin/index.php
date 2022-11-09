<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('includes/header.php');
    include ('includes/sidebar.php');

?>

        <div class="admin-main-content">

            <div class="signup_message">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <bold>Hey! </bold><?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['message']); } ?>
            </div>

            <div class="admin-page-header">
                <div class="admin-page-greet">
                    <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                </div>
                <div class="admin-page-title">
                    <h3>Dashboard</h3>
                </div>
            </div>

            <div class="admin-card-container">
                <div class="admin-card">
                    <div class="details">
                        <h4>3</h4>
                        <h5>Admin</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
                <div class="admin-card">
                    <div class="details">
                        <h4>39</h4>
                        <h5>Users</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
                <div class="admin-card">
                    <div class="details">
                        <h4>4,60</h4>
                        <h5>Income</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
                <div class="admin-card">
                    <div class="details">
                        <h4>14</h4>
                        <h5>Orders</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
            </div>
            
            <div class="admin-page-orders">
                <div class="orders-container">
                    <div class="card">
                        <h3>Recent Orders</h3>
                        <button>See all</button>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Product Name</td>
                                    <td>Add ons</td>
                                    <td>Status</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Wintermelon</td>
                                    <td>Tapioca Pearls</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php

    include ('includes/footer.php');

?>