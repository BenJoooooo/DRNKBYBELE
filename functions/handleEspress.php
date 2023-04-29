<?php 

    session_start();
    include ("../core/dbcon.php");
    include ("../functions/myfunctions.php");

    if(isset($_SESSION['auth'])) {

        // Adds espressyourself post from a client
        if(isset($_POST['addPost'])) {

            $title = mysqli_real_escape_string($con, $_POST['title']);
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $article = mysqli_real_escape_string($con, $_POST['article']);
            $image = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $user_id = mysqli_real_escape_string($con, $_SESSION['auth_user']['fullname']);

            $fileExt = explode('.', $image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            if(in_array($fileActualExt, $allowedExt)) {
                
                if($imageSize < 3000000) {

                    $path = "../uploadsEspresso";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time(). '.' .$image_ext;

                    $insert_query = "INSERT INTO espressyourself (title, name, article, image, added_by) VALUES ('$title', '$name', '$article', '$filename', '$user_id')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    if($insert_query_run) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);
                        redirectSuccess($_SERVER['HTTP_REFERER'], "Added Successfully!");
                    } else {
                        redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong!");
                    }

                } else {

                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");

                }

            } else {
                
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");

            }

        // Deletes espressyourself post from admin
        } elseif (isset($_POST['delete_espress'])) {
            $espress_id = mysqli_real_escape_string($con, $_POST['espress_id']);
            
            $query = "SELECT * FROM espressyourself WHERE id = '$espress_id'";
            $query_run = mysqli_query($con, $query);
            $query_data = mysqli_fetch_array($query_run);

            if($query_data) {

                $id = $espress_id;
                $title = mysqli_real_escape_string($con, $query_data['title']);
                $name = mysqli_real_escape_string($con, $query_data['name']);
                $article = mysqli_real_escape_string($con, $query_data['article']);
                $image = $query_data['image'];
                $created_at = $query_data['created_at'];
                $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

                $curpath = "../uploadsEspresso/$image";
                $path = "../uploadsArchiveEspresso/$image";

                $insert_query = "INSERT INTO archive_espressyourself (id, title, name, article, image, created_at, added_by) VALUES ('$id', '$title', '$name', '$article', '$image', '$created_at', '$added_by')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run) {

                    // Moves file to another directory
                    rename($curpath, $path);
                    $delete_query = "DELETE FROM espressyourself WHERE id = '$id'";
                    $delete_query_run = mysqli_query($con, $delete_query);

                    if($delete_query_run) {
                        echo 200;
                    } else {
                        echo 500;
                    }

                }
            }

        // Deletes espressyourself post permanently from admin
        } elseif (isset($_POST['delete_permanent_espress_btn'])) {

            $espress_id = mysqli_real_escape_string($con, $_POST['espress_id']);

            $query = "SELECT * FROM archive_espressyourself WHERE id = '$espress_id'";
            $query_run = mysqli_query($con, $query);

            $data = mysqli_fetch_array($query_run);
            $image = $data['image'];

            $delete_query = "DELETE FROM archive_espressyourself WHERE id = '$espress_id'";
            $delete_query_run = mysqli_query($con, $delete_query);

            if($delete_query_run) {

                if(file_exists("../uploadsArchiveEspresso/".$image)) {
                    unlink("../uploadsArchiveEspresso/".$image);
                    echo 200;
                }

            } else {
                echo 500;
            }

        } elseif(isset($_POST['recover_espress_btn'])) {

            $image_id = mysqli_real_escape_string($con, $_POST['image_id']);

            $query = "SELECT * FROM archive_espressyourself WHERE id='$image_id'";
            $query_run = mysqli_query($con, $query);

            $data = mysqli_fetch_array($query_run);

            if($data) {

                $id = $image_id;
                $title = mysqli_real_escape_string($con, $data['title']);
                $name = mysqli_real_escape_string($con, $data['name']);
                $article = mysqli_real_escape_string($con, $data['article']);
                $image = $data['image'];
                $user_id = mysqli_real_escape_string($con, $data['added_by']);
                $created_at = $data['created_at'];

                $curpath = "../uploadsArchiveEspresso/$image";
                $path = "../uploadsEspresso/$image";

                $insert_query = "INSERT INTO espressyourself (id, title, name, article, image, added_by, created_at) VALUES ('$id', '$title', '$name', '$article', '$image', '$user_id', '$created_at')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run) {

                    // Moves file to anothe directory
                    rename($curpath, $path);

                    $delete_query = "DELETE FROM archive_espressyourself WHERE id = '$id'";
                    $delete_query_run = mysqli_query($con, $delete_query);

                    if($delete_query_run) {
                        echo 200;
                    } else {
                        echo 500;
                    }
                }
            }

        }
    } 
?>