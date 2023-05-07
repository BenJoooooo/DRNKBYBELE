<?php
    session_start();

    // include ("../functions/middleware.php");
    include ('../functions/accessMiddleWareManager.php');
    include ("includes/header.php");

?>  

    <div class="wrapper">
            <?php include ('includes/sidebar.php'); ?>

            <div class="body-wrapper">
                <div class="admin-main-content">
                    <div class="admin-page-header">
                        <div class="admin-page-greet">
                            <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                        </div>
                        <div class="admin-page-title">
                            <h3>Sales Page</h3>
                        </div>
                    </div>
                    
                    <div class="admin-page-table">
                        <div class="table-container">

                            <!-- Session Message -->
                            <?php include('../functions/sessionmessage.php'); ?>

                            <div class="card-header">
                                <h3>Sales Page</h3>

                                <form action="../functions/export.php" method="POST">
                                    <button type="submit" value="CSV" name="export_month_sales" class="btn btn-success">Export CSV</button>
                                </form>
                                
                                <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                            </div>

                            <div class="card-body" id="coverphotos_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Month</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $data = getMonthlySales("orders");
                                            if(mysqli_num_rows($data) > 0) {

                                                foreach ($data as $item) { ?>

                                                    <tr>
                                                        <td><?= $item['created_at']; ?></td>
                                                        <td><?= $item['total_price']; ?></td>
                                                        <td class="td-justify">
                                                            <a href="monthly_sales?month=<?= $item['created_at'];?>"  class="btn btn-success">View</a>

                                                            <form action="../functions/export.php" method="POST">
                                                                <button type="submit" value="<?= $item['created_at']; ?>" name="month_sales" class="btn btn-success">Export CSV</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                        <?php
                                                }

                                                $total = getTotalOfMonth("orders");
                                                if(mysqli_num_rows($total) > 0) {
                                                    foreach($total as $total_price) {
                                        ?>

                                                    <tr>
                                                        <td>Total Sales</td>
                                                        <td><?= $total_price['total_price'] ?></td>
                                                    </tr>

                                        <?php 
                                                    }
                                                }   
                                            } else {
                                                // $_SESSION['message'] = "No records found";
                                        ?>
                                                <div class="error-message-container">
                                                    <div class="product-not-available">
                                                        <h3 class="text-message">Sorry, this section is empty!</h3>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Chart JS -->

                            <?php 

                                $chartMonth = getMonthChart("orders");
                                foreach($chartMonth AS $data) {
                                    $month[] = $data['monthname'];
                                    $amount[] = $data['amount'];
                                }

                            ?>

                            <div class="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart JS -->
    <script>
        // === include 'setup' then 'config' above ===
        const labels = <?php echo json_encode($month) ?>;
        const data = {
            labels: labels,
            datasets: [{
            label: 'Monthly Sales',
            data: <?php echo json_encode($amount) ?>,
            backgroundColor: [
                'rgba(167, 199, 231, 0.3)',
                'rgba(255, 105, 97, 0.3)',
                'rgba(193, 225, 193, 0.3)',
                'rgba(250, 200, 152, 0.3)',
                'rgba(195, 177, 225, 0.3)',
                'rgba(255, 250, 160, 0.3)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(167, 199, 231)',
                'rgb(255, 105, 97)',
                'rgb(193, 225, 193)',
                'rgb(250, 200, 152)',
                'rgb(195, 177, 225)',
                'rgb(255, 250, 160)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


<?php

    require ('includes/footer.php');

?>