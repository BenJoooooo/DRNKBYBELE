<?php 
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");
    include ("includes/header.php");
?>

    <main class="menu-cart">

        <div class="main-container">
            <h1 class="title">Your Purchase</h1>
        </div>

        <table class="table-cart">
            <thead class="table-head-cart">
                <tr class="table-row-cart">
                    <th class="data-cart">Order Id</th>
                    <th class="data-cart">Tracking No</th>
                    <th class="data-cart">Price</th>
                    <th class="data-cart">Status</th>
                    <th class="data-cart">Action</th>

                </tr>
            </thead>

            <tbody class="table-body-cart">

            <?php 
               $data = getOrders("orders");

               if(mysqli_num_rows($data) > 0) {
                   foreach($data as $item) {
            ?>

                <tr class="table-row-cart-items product_data">
                    <td class="data-cart-items-img"><?= $item['id']; ?></td>
                    <td class="data-cart-items-prod"><?= $item['tracking_no']; ?></td>
                    <td class="data-cart-items-prod"><?= $item['total_price']; ?></td>
                    <td class="data-cart-items-prod"><?= $item['status'] == 0 ? "Pending":""; ?></td>
                    <td>
                        <a href="view_order?id=<?= $item['tracking_no']; ?>" class="btn btn-success">View</a>
                    </td>
                </tr>

            <?php 
                   }
                }
            ?>

            </tbody>
        </table>
    </main>

<?php 
    include ("includes/footer.php");
?>