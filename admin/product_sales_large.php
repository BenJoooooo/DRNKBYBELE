<?php

    session_start();
    
    include ('../functions/accessMiddleWareRider.php');
    include ('includes/header.php');

    // $assumed_sales = getAssumedSales("orders");
    // $totalSales = getTotalSalesComplete("orders");
    // $totalSalesToday = getTotalSalesToday("orders");
    // $monthSales = getMonthSale("orders");
    // $weekSales = getTotalOfWeek("orders");
    // $dayTotal = getTotalOfDay("orders");
    // $yearSales = getYearSale("orders");
    // $failedTrans = checkFailedtrans("orders");

?>
    <div class="wrapper">
        <?php include ('includes/sidebar.php'); ?>

        <div class="body-wrapper">
            
            <div class="admin-main-content">
                
                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>
            
                <div class="admin-page-header">
                    <div class="admin-page-greet">
                        <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                    </div>
                    <div class="admin-page-title">
                        <h3>Sales Page</h3>
                    </div>
                </div>

                <div class="admin-card-container">
                    
                </div>

                <!-- Chart JS -->
                <?php 

                    $chartMonth = getProductChartLargeSize();
                    foreach($chartMonth AS $data) {
                        $product[] = $data['products_name'];
                        $amount[] = $data['amount'];
                    }

                ?>

                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </div>
    </div>

    <script>
        // === include 'setup' then 'config' above ===
        const labels = <?php echo json_encode($product) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'LARGE PRODUCTS SALES',
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
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'TOTAL AMOUNT IN PESOS',
                }
                },
                x: {
                title: {
                    display: true,
                    text: 'PRODUCT NAME',
                }
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
    include ('includes/footer.php');
?>