<?php 

    session_start();
    include ("../core/dbcon.php");
    include ("../functions/userFunctions.php");

    if(isset($_SESSION['auth'])) {

        // if(isset($_POST['scope'])) {
        //     $scope = $_POST['scope'];

        //     switch($scope) {
        //         case "add":
        //             $title = $_POST['title'];
        //             $name = $_POST['name'];
        //             $article = $_POST['article'];
        //             $image = $_FILES['image']['name'];
        //             $user_id = $_SESSION['auth_user']['fullname'];

        //             $path = "../uploadsEspresso";
        //             $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        //             $filename = time(). '.' .$image_ext;

        //             $insert_query = "INSERT INTO espressyourself (title, name, article, image, added_by) VALUES ('$title', '$name', '$article', '$filename', '$user_id')";
        //             $insert_query_run = mysqli_query($con, $insert_query);

        //             if($insert_query_run) {
        //                 echo 201;
        //                 move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);

        //             } else {
        //                 echo 500;
        //             }
        //         break;
        //     }
        // }
        $title = $_POST['title'];
        $name = $_POST['name'];
        $article = $_POST['article'];
        $image = $_FILES['image']['name'];
        $user_id = $_SESSION['auth_user']['fullname'];

        $path = "../uploadsEspresso";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_ext;

        $insert_query = "INSERT INTO espressyourself (title, name, article, image, added_by) VALUES ('$title', '$name', '$article', '$filename', '$user_id')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);
            redirectSuccess($_SERVER['HTTP_REFERER'], "Added Successfully");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");
        }


    }


?>