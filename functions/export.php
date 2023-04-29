<?php

session_start();
include("../core/dbcon.php");

    if(isset($_POST['export_csv'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, FORMAT(SUM(total_price),2) AS total_price FROM orders WHERE status = '3' AND DATE_FORMAT(created_at, '%y/%m/%d') = CURRENT_DATE() ORDER BY status ASC, id DESC";

        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Error';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['export_day_sales'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=day-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Days (Day / Month / Year', 'Total Sales'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y'), FORMAT(SUM(total_price),2) AS total_price FROM orders WHERE status = '3' GROUP BY DATE(created_at) ORDER BY DATE(created_at) DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Error';

            $line = array($row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['export_week_sales'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=week-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Weekly Sales (Sunday to Saturday)', 'Total Sales'));

        $query = "SELECT *, FORMAT(SUM(total_price),2) AS total_price FROM orders WHERE status = '3' GROUP BY YEARWEEK(created_at) ORDER BY YEARWEEK(created_at) DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Error';

            $line = array($row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['export_month_sales'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=month-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Monthly Sales', 'Total Sales'));

        $query = "SELECT *, MONTHNAME(created_at) AS created_at, FORMAT(SUM(total_price),2) AS total_price FROM orders WHERE status = '3' GROUP BY MONTH(created_at) ORDER BY MONTH(created_at) DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Error';

            $line = array($row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['export_year_sales'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=year-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Yearly Sales', 'Total Sales'));

        $query = "SELECT *, YEAR(created_at) AS created_at, FORMAT(SUM(total_price),2) AS total_price FROM orders WHERE status = '3' GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Error';

            $line = array($row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['export_all_sales'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=all-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '3' ORDER BY status ASC, id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Error';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['export_assumed_sales'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=assumed-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '3' || status = '2' || status = '4' ORDER BY created_at DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Processing';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['day_sales'])) {

        $data = $_POST['day_sales'];

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=daily-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '3' AND DATE_FORMAT(created_at, '%m%e%y') = $data ORDER BY id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Processing';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['week_sales'])) {

        $data = $_POST['week_sales'];

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=weekly-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '3' AND WEEK(created_at) = $data ORDER BY id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Processing';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['month_sales'])) {

        $data = $_POST['month_sales'];

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=monthly-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '3' AND DATE_FORMAT(created_at, '%m%y') = $data ORDER BY id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Processing';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['year_sales'])) {

        $data = $_POST['year_sales'];

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=yearly-sales.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '3' AND YEAR(created_at) = $data ORDER BY id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 3) ? 'Completed':'Processing';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } elseif(isset($_POST['failed_sales_day'])) {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=failed_sales_day.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Order ID', 'Tracking Number', 'Status', 'Date Created', 'Price'));

        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e %Y | %h:%i %p') AS created_at, FORMAT(total_price, 2) AS total_price FROM orders WHERE status = '5' ORDER BY id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {

            $status = ($row['status'] == 5) ? 'Failed Transaction':'Error';

            $line = array($row['id'], $row['tracking_no'], $status, $row['created_at'], $row['total_price']);

            fputcsv($output, $line);
        }

        fclose($output);

    } 
?>