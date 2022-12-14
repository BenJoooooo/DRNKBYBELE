<?php 

    session_start();
    include ("../core/dbcon.php");

    if(isset($_SESSION['auth'])) {

        if(isset($_POST['addPost'])) {
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
                header("Location: " . $_SERVER['HTTP_REFERER']);
                $_SESSION['message'] = "Added Successfully!";
            } else {
                // redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");
                header("Location: " . $_SERVER['HTTP_REFERER']);
                $_SESSION['message'] = "Something went wrong!";
            }

        } elseif (isset($_POST['delete_espress'])) {
            $espress_id = mysqli_real_escape_string($con, $_POST['espress_id']);
            
            $query = "SELECT * FROM espressyourself WHERE id = '$espress_id'";
            $query_run = mysqli_query($con, $query);
            $query_data = mysqli_fetch_array($query_run);
            $fetch_image = $query_data['image'];
            
            $delete_query = "DELETE FROM espressyourself WHERE id = '$espress_id'";
            $delete_query_run = mysqli_query($con, $delete_query);
    
            if($delete_query_run) {
    
                if(file_exists("../uploadsEspresso/" . $fetch_image)) {
                    unlink ("../uploadsEspresso/" . $fetch_image);
                }
    
                echo 200;
    
            } else {
                echo 500;
            }
        }
    


    } 
?>