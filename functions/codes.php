<?php 

session_start();
include ('../core/dbcon.php');
include ('../functions/myfunctions.php');

    // -----------------------------------------------
    // -------------------USER PAGE-------------------
    // -----------------------------------------------

    // adds admin user  
    if(isset($_POST['admin_signup_submit'])) {

        $user_id = $_POST['user_id'];
        $signup_fullname = mysqli_real_escape_string($con, $_POST['signup_fullname']);
        $signup_email = mysqli_real_escape_string($con, $_POST['signup_email']);
        $signup_address = mysqli_real_escape_string($con, $_POST['signup_address']);
        $signup_password = mysqli_real_escape_string($con, $_POST['signup_password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['repeat_signup_password']);
        $role = $_POST['signup_radio'];

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {

            redirectFailed($_SERVER['HTTP_REFERER'], "Email already exists");

        } else {

            if(strlen($signup_password) >= 8) {
                // checks if password is the same with confirm password
                if($signup_password == $cpassword) {

                    // Insert admin data
                    $insert_query = "INSERT INTO users (fullname, email, password, role ,address)
                    VALUES ('$signup_fullname', '$signup_email', md5('$signup_password'), '$role', '$signup_address')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    if($insert_query_run) {
                        redirectSuccess("../admin/admin_admin", "Added Sucessfully");
                    } else {
                        redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");
                    }

                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Passwords do not match");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
            }

        }

    // Adds users
    } elseif(isset($_POST['users_signup_submit'])) {

        $signup_fullname = mysqli_real_escape_string($con, $_POST['signup_fullname']);
        $signup_email = mysqli_real_escape_string($con, $_POST['signup_email']);
        $signup_address = mysqli_real_escape_string($con, $_POST['signup_address']);
        $signup_password = mysqli_real_escape_string($con, $_POST['signup_password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['repeat_signup_password']);

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {
            redirectFailed($_SERVER['HTTP_REFERER'], "Email already exists");
        } else {

            if(strlen($signup_password) >= 8) {
                // checks if password is the same with confirm password
                if($signup_password == $cpassword) {

                    // Insert admin data
                    $insert_query = "INSERT INTO users (fullname, email, password ,address)
                    VALUES ('$signup_fullname', '$signup_email', md5('$signup_password'), '$signup_address')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    if($insert_query_run) {
                        redirectSuccess("../admin/admin_users", "Added successfully");
                    } else {
                        redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Passwords do not match");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
            }
        }

    // Updates admin user
    } elseif(isset($_POST['update_admin_submit'])) {

        $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
        $signup_fullname = mysqli_real_escape_string($con, $_POST['signup_fullname']);
        $signup_email = mysqli_real_escape_string($con, $_POST['signup_email']);
        $signup_address = mysqli_real_escape_string($con, $_POST['signup_address']);
        $signup_password = mysqli_real_escape_string($con, $_POST['signup_password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['repeat_signup_password']);
        $role = $_POST['signup_radio'];

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        // Fetches data from database
        $users = getById("users", $category_id);
        if(mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
        }

        // Checks if signup input is not empty
        if(!empty($signup_email)) {

            // Checks if input email is equal to the data from database
            if($data['email'] == $signup_email) {
                
                if(strlen($signup_password) >= 8) {
                    // Checks if password match with confirm
                    if($signup_password == $cpassword) {
        
                        // Update query
                        $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = md5('$signup_password'), role = '$role', address = '$signup_address'
                        WHERE id = '$category_id' ";
                        $update_query_run = mysqli_query($con, $update_query);
        
                        if($update_query_run) {
                            redirectSuccess("../admin/admin_admin", "Edited successfully");
                        } else {
                            redirectFailed("../admin/edit_admin_account?id=$category_id", "Something went wrong");
                        }
                    } else {
                        redirectFailed("../admin/edit_admin_account?id=$category_id", "Passwords do not match");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
                }

            // Checks if email input is not at the database
            } elseif(!mysqli_num_rows($check_email_query_run) > 0) {

                if(strlen($signup_password) >= 8) {
                      // Checks if password match with confirm
                    if($signup_password == $cpassword) {

                        // Update query
                        $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', role = '$role', address = '$signup_address'
                        WHERE id = '$category_id' ";
                        $update_query_run = mysqli_query($con, $update_query);

                        if($update_query_run) {
                            redirectSuccess("../admin/admin_admin", "Edit successfully");
                        } else {
                            redirectFailed("../admin/edit_admin_account?id=$category_id", "Something went wrong");
                        }

                    } else {
                        redirectFailed("../admin/edit_admin_account?id=$category_id", "Passwords do not match");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
                }

            } else {
                redirectFailed("../admin/edit_admin_account?id=$category_id", "Email already exists");
            }
            
        } else {
            redirectFailed("../admin/edit_admin_account?id=$category_id", "Email must not be empty");
        }

    // Updates user
    } elseif(isset($_POST['update_user_submit'])) {

        $category_id_user = mysqli_real_escape_string($con, $_POST['category_id_user']);
        $signup_fullname = mysqli_real_escape_string($con, $_POST['signup_fullname']);
        $signup_address = mysqli_real_escape_string($con, $_POST['signup_address']);
        $signup_password = mysqli_real_escape_string($con, $_POST['signup_password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['repeat_signup_password']);
        $signup_email = mysqli_real_escape_string($con, $_POST['signup_email']);

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        // Fetches data from database
        $users = getById("users", $category_id_user);
        if(mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
        }

        // Checks if signup input is not empty
        if(!empty($signup_email)) {

            // Checks if input email is equal to the data from database
            if($data['email'] == $signup_email) {
                
                if(strlen($signup_password) >=8 ) {
                    // Checks if password match with confirm
                    if($signup_password == $cpassword) {
        
                        // Update query
                        $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = md5('$signup_password'), address = '$signup_address'
                        WHERE id = '$category_id_user' ";
                        $update_query_run = mysqli_query($con, $update_query);
        
                        if($update_query_run) {
                            redirectSuccess("../admin/admin_users", "Edit successfully");
                        } else {
                            redirectFailed("../admin/edit_user_account?id=$category_id", "Something went wrong");
                        }
                    } else {
                        redirectFailed("../admin/edit_user_account?id=$category_id", "Passwords do not match");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
                }

            // Checks if email input is not greater than 0
            } elseif(!mysqli_num_rows($check_email_query_run) > 0) {

                if(strlen($signup_password) >=8 ) {
                    // Checks if password match with confirm
                    if($signup_password == $cpassword) {

                        // Update query
                        $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', address = '$signup_address'
                        WHERE id = '$category_id' ";
                        $update_query_run = mysqli_query($con, $update_query);

                        if($update_query_run) {
                            redirectSuccess("../admin/admin_users", "Edit successfully");
                        } else {
                            redirectFailed("../admin/edit_user_account?id=$category_id", "Something went wrong");
                        }

                    } else {
                        redirectFailed("../admin/edit_user_account?id=$category_id", "Passwords do not match");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
                }

            } else {
                redirectFailed("../admin/edit_user_account?id=$category_id", "Email already exists");
            }
            
        } else {
            redirectFailed("../admin/edit_user_account?id=$category_id", "Email must not be empty");
        }

    // Deletes user and admin
    } elseif(isset($_POST['delete_btn'])) {

        $category_id = mysqli_real_escape_string($con ,$_POST['category_id']);

        $select_query = "SELECT * FROM users WHERE id = '$category_id'";
        $select_query_run = mysqli_query($con, $select_query);
        $data = mysqli_fetch_array($select_query_run);

        if($data) {

            $id = $category_id;
            $name = mysqli_real_escape_string($con, $data['fullname']);
            $email = mysqli_real_escape_string($con, $data['email']);
            $password = mysqli_real_escape_string($con, $data['password']);
            $role = mysqli_real_escape_string($con, $data['role']);
            $country = mysqli_real_escape_string($con, $data['country']);
            $address = mysqli_real_escape_string($con, $data['address']);
            $apartment = mysqli_real_escape_string($con, $data['apartment']);
            $postal = mysqli_real_escape_string($con, $data['postal']);
            $city = mysqli_real_escape_string($con, $data['city']);
            $region = mysqli_real_escape_string($con, $data['region']);
            $phone = mysqli_real_escape_string($con, $data['phone']);

            $insert_query = "INSERT INTO archive_users (id, fullname, email, password, role, country, address, apartment, postal, city, region, phone) VALUES ('$id', '$name', '$email', '$password', '$role', '$country', '$address', '$apartment', '$postal', '$city', '$region', '$phone')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run) {
               
                $delete_query = "DELETE FROM users WHERE id = '$category_id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }
        }

    } 
    // Deletes user and admin permanently
    elseif(isset($_POST['delete_user_permanent_btn'])) {

        $category_id = mysqli_real_escape_string($con ,$_POST['category_id']);

        $delete_query = "DELETE FROM archive_users WHERE id = '$category_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {
            // redirectSuccess($_SERVER['HTTP_REFERER'], "Delete Successfully");
            echo 200;
        } else {
            // redirectFailed($_SERVER['HTTP_REFERER'], "Delete failed");
            echo 500;
        }
    }
    // Recover users data
    elseif(isset($_POST['recover_user_btn'])) {

        $user_id = mysqli_real_escape_string($con ,$_POST['user_id']);

        $select_query = "SELECT * FROM archive_users WHERE id = '$user_id'";
        $select_query_run = mysqli_query($con, $select_query);
        $data = mysqli_fetch_array($select_query_run);

        if($data) {
            
            $id = $user_id;
            $name = mysqli_real_escape_string($con, $data['fullname']);
            $email = mysqli_real_escape_string($con, $data['email']);
            $password = mysqli_real_escape_string($con, $data['password']);
            $role = mysqli_real_escape_string($con, $data['role']);
            $country = mysqli_real_escape_string($con, $data['country']);
            $address = mysqli_real_escape_string($con, $data['address']);
            $apartment = mysqli_real_escape_string($con, $data['apartment']);
            $postal = mysqli_real_escape_string($con, $data['postal']);
            $city = mysqli_real_escape_string($con, $data['city']);
            $region = mysqli_real_escape_string($con, $data['region']);
            $phone = mysqli_real_escape_string($con, $data['phone']);

            $insert_query = "INSERT INTO users (id, fullname, email, password, role, country, address, apartment, postal, city, region, phone) VALUES ('$id', '$name', '$email', '$password', '$role', '$country', '$address', '$apartment', '$postal', '$city', '$region', '$phone')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run) {
               
                $delete_query = "DELETE FROM archive_users WHERE id = '$user_id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }
        }

    }

    // -----------------------------------------------
    // -------------------COVER PAGE------------------
    // -----------------------------------------------

    // Adds Cover photo
    elseif (isset($_POST['upload_photo'])) {

        $added_by = mysqli_real_escape_string($con, $_POST['added_by']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $status = isset($_POST['status']) ? '1': '0';

        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array('jpg', 'jpeg', 'png',);

        if(in_array($fileActualExt, $allowedExt)) {

            if($imageSize < 5000000) {

                $path = "../uploads";
                $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                $filename = time(). '.' .$image_ext;
        
                $query = "INSERT INTO images (name, description, status, image, added_by) VALUES ('$name', '$description', '$status', '$filename', '$added_by')";
        
                $query_run = mysqli_query($con, $query);
        
                if($query_run) {
                    move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
                    redirectSuccess("../admin/admin_manage_home", "Uploaded Successfully");
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
                }

            } else {

                redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");

            }

        } else {

            redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");

        }

    // Edit cover photo
    } elseif (isset($_POST['update_photo'])) {

        $added_by = mysqli_real_escape_string($con, $_POST['added_by']);
        $image_id = $_POST['image_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $old_image = $_POST['oldimage'];
        $new_image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];
        $status = isset($_POST['status']) ? '1':'0';

        if($new_image != "") {

            $fileExt = explode('.', $new_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            // $update_filename = $new_image;
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). '.' .$image_ext;

        } else {

            $fileExt = explode('.', $old_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $update_filename = $old_image;
        }

        if(in_array($fileActualExt, $allowedExt)) {
            if($imageSize < 5000000) {
                $path = "../uploads";

                $query = "UPDATE images SET added_by = '$added_by', name = '$name', description = '$description', status = '$status', image = '$update_filename' WHERE id = $image_id";
        
                $query_run = mysqli_query($con, $query);
        
                if($query_run) {
                    if($_FILES['upload']['name'] != "") {
                        move_uploaded_file($_FILES['upload']['tmp_name'], $path. "/" .$update_filename);
                        if(file_exists("../uploads/".$old_image)) {
                            unlink("../uploads/".$old_image);
                        }
                    }
                    redirectSuccess("../admin/admin_manage_home", "Updated Successfully");
                } else {
                    redirectFailed("../admin/admin_edit_homepage?id=$image_id", "Something Went Wrong");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
        }

    // Delete cover photo
    } elseif (isset($_POST['deletephoto_btn'])) {

        $image_id = mysqli_real_escape_string($con,$_POST['image_id']);

        $query = "SELECT * FROM images WHERE id = '$image_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $image_id;
            $name = mysqli_real_escape_string($con, $query_data['name']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['status'];
            $image = $query_data['image'];
            $created_at = $query_data['created_at'];
            $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

            $path = "../uploadsArchive/$image";
            $curpath = "../uploads/$image";

            $insert_query = "INSERT INTO archive_cover (id, name, description, status, image, created_at, added_by) VALUES ('$id', '$name', '$description', '$status', '$image', '$created_at', '$added_by')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run) {
                
                // Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM images WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }   
        }

    // Delete cover photo permanently
    } elseif (isset($_POST['delete_permanent_photo_btn'])) {

        $id = mysqli_real_escape_string($con, $_POST['image_id']);

        $query = "SELECT * FROM archive_cover WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);
        $data = mysqli_fetch_array($query_run);
        $image = $data['image'];

        $delete_query = "DELETE FROM archive_cover WHERE id = '$id'";
        $delete_query_run = mysqli_query($con, $delete_query);
        
        if($delete_query_run) {

            if(file_exists("../uploadsArchive/".$image)) {
                unlink("../uploadsArchive/".$image);
                echo 200;
            }

        } else {
            echo 500;
        }

    // Recover cover photo from archive
    } elseif(isset($_POST['recover_photo_btn'])) {

        $image_id = mysqli_real_escape_string($con,$_POST['image_id']);

        $query = "SELECT * FROM archive_cover WHERE id = '$image_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $image_id;
            $name = mysqli_real_escape_string($con, $query_data['name']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['status'];
            $image = $query_data['image'];
            $created_at = $query_data['created_at'];
            $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

            $path = "../uploads/$image";
            $curpath = "../uploadsArchive/$image";

            $insert_query = "INSERT INTO images (id, name, description, status, image, created_at, added_by) VALUES ('$id', '$name', '$description', '$status', '$image', '$created_at', '$added_by')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run) {
                // Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM archive_cover WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }   
        }
    }

    // -----------------------------------------------
    // -----------------CATEGORY PAGE-----------------
    // -----------------------------------------------

    // Adds category
    if(isset($_POST['category_submit'])) {

        $added_by = mysqli_real_escape_string($con, $_POST['added_by']);
        $category_name = mysqli_real_escape_string($con, $_POST['name']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];
        $category_description = mysqli_real_escape_string($con, $_POST['description']);
        $status = isset($_POST['status']) ? '1':'0';

        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array('jpg', 'jpeg', 'png',);

        $check_product_size = "SELECT name FROM categories WHERE name = '$category_name'";
        $check_product_size_query = mysqli_query($con, $check_product_size);

        if(!mysqli_num_rows($check_product_size_query) > 0) {

            if(in_array($fileActualExt, $allowedExt)) {

                if($imageSize < 5000000) {
            
                    $path = "../uploadsCategories";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time(). "." .$image_ext;
    
                    $query = "INSERT INTO categories (name, description, status, image, slug, added_by) VALUES ('$category_name', '$category_description', '$status', '$filename', '$slug', '$added_by')";
    
                    $query_run = mysqli_query($con, $query);
    
                    if($query_run) {
                        move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
                        redirectSuccess("../admin/admin_categories_page", "Category Added Successfully");
                    } else {
                        redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
            }

        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Category already existed");
        }

    // Updates Category
    } elseif (isset($_POST['update_category_submit'])) {

        $category_id = $_POST['category_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $status = isset($_POST['status']) ? '1': '0';

        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];

        if($new_image != "") {

            $fileExt = explode('.', $new_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            // $update_filename = $new_image;
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). '.' .$image_ext;

        } else {

            $fileExt = explode('.', $old_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $update_filename = $old_image;
        }

        $check_category = "SELECT name FROM categories WHERE name = '$name'";
        $check_category_run = mysqli_query($con, $check_category);

        $data = getById("categories", $category_id);
        if(mysqli_num_rows($data) > 0) {
            $data_fetch = mysqli_fetch_array($data);
        }

        if($data_fetch['name'] == $name) {
            
            if(in_array($fileActualExt, $allowedExt)) {
                if($imageSize < 5000000) {
    
                    $path = "../uploadsCategories";
    
                    $query = "UPDATE categories SET name = '$name', description = '$description', status = '$status', image = '$update_filename', slug = '$slug' WHERE id = '$category_id'";
                    
                    $query_run = mysqli_query($con, $query);
    
                    if($query_run) {
                        if($_FILES['upload']['name'] != "") {
                            move_uploaded_file($_FILES['upload']['tmp_name'], $path. "/" .$update_filename);
                            if(file_exists("../uploadsCategories/".$old_image)) {
                                unlink("../uploadsCategories/".$old_image);
                            }
                        }
                        redirectSuccess("../admin/admin_categories_page", "Updated Successfully");
                    } else {
                        redirectFailed("../admin/admin_edit_categories?id=$category_id", "Something Went Wrong");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
            }

        } elseif(!mysqli_num_rows($check_category_run) > 0) {
            if(in_array($fileActualExt, $allowedExt)) {
                if($imageSize < 5000000) {
    
                    $path = "../uploadsCategories";
    
                    $query = "UPDATE categories SET name = '$name', description = '$description', status = '$status', image = '$update_filename', slug = '$slug' WHERE id = '$category_id'";
                    
                    $query_run = mysqli_query($con, $query);
    
                    if($query_run) {
                        if($_FILES['upload']['name'] != "") {
                            move_uploaded_file($_FILES['upload']['tmp_name'], $path. "/" .$update_filename);
                            if(file_exists("../uploadsCategories/".$old_image)) {
                                unlink("../uploadsCategories/".$old_image);
                            }
                        }
                        redirectSuccess("../admin/admin_categories_page", "Updated Successfully");
                    } else {
                        redirectFailed("../admin/admin_edit_categories?id=$category_id", "Something Went Wrong");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Product already exists");
        }
        
    // Deletes Category
    } elseif (isset($_POST['delete_category_btn'])) {

        $category_id = mysqli_real_escape_string($con,$_POST['category_id']);

        $query = "SELECT * FROM categories WHERE id = '$category_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $category_id;
            $name = mysqli_real_escape_string($con, $query_data['name']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['status'];
            $image = $query_data['image'];
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $created_at = $query_data['created_at'];
            $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

            $curpath = "../uploadsCategories/$image";
            $path = "../uploadsArchiveCategories/$image";

            $query = "INSERT INTO archive_categories (id, name, description, status, image, slug, created_at, added_by) VALUES ('$id', '$name', '$description', '$status', '$image', '$slug', '$created_at', '$added_by')";

            $query_run = mysqli_query($con, $query);

            if($query_run) {
                
                // Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM categories WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            } else {
                echo 500;
            }

        } else {

            echo 500;

        }
       
    // Recovers Category
    } elseif (isset($_POST['recover_category_btn'])) {

        $category_id = mysqli_real_escape_string($con,$_POST['category_id']);

        $query = "SELECT * FROM archive_categories WHERE id = '$category_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $category_id;
            $name = mysqli_real_escape_string($con, $query_data['name']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['status'];
            $image = $query_data['image'];
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $created_at = $query_data['created_at'];
            $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

            $path = "../uploadsCategories/$image";
            $curpath = "../uploadsArchiveCategories/$image";

            $query = "INSERT INTO categories (id, name, description, status, image, slug, created_at, added_by) VALUES ('$id', '$name', '$description', '$status', '$image', '$slug', '$created_at', '$added_by')";

            $query_run = mysqli_query($con, $query);

            if($query_run) {
                
                // Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM archive_categories WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            } else {
                echo 500;
            }

        } else {

            echo 500;

        }
       
    // Deletes category permanently
    } if(isset($_POST['delete_category_permanently_btn'])) {

        $id = mysqli_real_escape_string($con, $_POST['category_id']);

        $query = "SELECT * FROM archive_categories WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        $data = mysqli_fetch_array($query_run);
        $image = $data['image'];

        $delete_query = "DELETE FROM archive_categories WHERE id = '$id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsArchiveCategories/".$image)) {

                unlink("../uploadsArchiveCategories/".$image);
                echo 200;

            } else {
                echo 500;
            }

        } else {
            echo 500;
        }

    }

    // -----------------------------------------------
    // ----------------PRODUCTS PAGE------------------
    // ----------------------------------------------

    // Adds products
    if(isset($_POST['add_product_submit'])) {

        $category_id = $_POST['category_id'];
        $added_by = mysqli_real_escape_string($con, $_POST['added_by']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $size = mysqli_real_escape_string($con, $_POST['size']);
        $status = isset($_POST['status']) ? '1':'0';
        $featured = isset($_POST['featured']) ? '1':'0';
        $original_price = $_POST['original_price'];
        $selling_price = $_POST['selling_price'];

        $imageSize = $_FILES['upload']['size'];
        $image = $_FILES['upload']['name'];

        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array('jpg', 'jpeg', 'png',);

        $check_product_size = "SELECT name, size FROM products WHERE name = '$name' AND size = '$size'";
        $check_product_size_query = mysqli_query($con, $check_product_size);

        
        if(!mysqli_num_rows($check_product_size_query) > 0) {

            if(in_array($fileActualExt, $allowedExt)) {

                if($imageSize < 5000000) {

                    $path = "../uploadsProducts";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time(). '.' .$image_ext;

                        $query = "INSERT INTO products (category_id, size, added_by, name, description, status, featured, original_price, selling_price, image, slug) VALUES ('$category_id', '$size', '$added_by', '$name', '$description', '$status', '$featured', '$original_price', '$selling_price', '$filename', '$slug')";
                    
                        $query_run = mysqli_query($con, $query);
                
                        if($query_run) {
                            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
                            redirectSuccess("../admin/admin_products_page", "Products Added Successfully");
                        } else {
                            redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
                        }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Product and Size already existed");
        }

    // Edits Products
    } elseif (isset($_POST['update_product_submit'])) {

        $category_id = $_POST['category_id'];
        $product_id = $_POST['product_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $slug = $_POST['slug'];
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $size = mysqli_real_escape_string($con, $_POST['size']);
        $status = isset($_POST['status']) ? '1':'0';
        $featured = isset($_POST['featured']) ? '1':'0';
        $original_price = $_POST['original_price'];
        $selling_price = $_POST['selling_price'];

        $imageSize = $_FILES['upload']['size'];
        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];

        if($new_image != "") {

            $fileExt = explode('.', $new_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). "." .$image_ext;

        } else {

            $fileExt = explode('.', $old_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $update_filename = $old_image;
        }

        $check_product_size = "SELECT name, size FROM products WHERE name = '$name' AND size = '$size'";
        $check_product_size_query = mysqli_query($con, $check_product_size);

        $data = getProductAndCategoryById("products", "categories", $product_id);
        if(mysqli_num_rows($data) > 0) {
            $data_fetch = mysqli_fetch_array($data);
        }

        if($data_fetch['name'] == $name && $data_fetch['size'] == $size) {
            
            if(in_array($fileActualExt, $allowedExt)) {
                if($imageSize < 5000000) {

                    $path = "../uploadsProducts";

                    $query = "UPDATE products SET category_id = '$category_id', name = '$name', description = '$description', size= '$size', status = '$status', featured = '$featured', original_price = '$original_price', selling_price = '$selling_price', image = '$update_filename', slug = '$slug' WHERE id = '$product_id'";

                    $query_run = mysqli_query($con, $query);

                    if($query_run) {
                        if($_FILES['upload']['name'] != "") {
                            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$update_filename);
                            if(file_exists("../uploadsProducts/".$old_image)) {
                                unlink("../uploadsProducts/".$old_image);
                            }
                        } 
                        redirectSuccess("../admin/admin_products_page", "Product Edited Successfully");
                    } else {
                        redirectFailed("../admin/edit_products_page?id=$product_id", "Something Went Wrong");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
            }

        } elseif(!mysqli_num_rows($check_product_size_query) > 0) {
            
            if(in_array($fileActualExt, $allowedExt)) {
                if($imageSize < 5000000) {
    
                    $path = "../uploadsProducts";
    
                    $query = "UPDATE products SET category_id = '$category_id', name = '$name', description = '$description', size= '$size', status = '$status', featured = '$featured', original_price = '$original_price', selling_price = '$selling_price', image = '$update_filename', slug = '$slug' WHERE id = '$product_id'";
    
                    $query_run = mysqli_query($con, $query);
    
                    if($query_run) {
                        if($_FILES['upload']['name'] != "") {
                            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$update_filename);
                            if(file_exists("../uploadsProducts/".$old_image)) {
                                unlink("../uploadsProducts/".$old_image);
                            }
                        } 
                        redirectSuccess("../admin/admin_products_page", "Product Edited Successfully");
                    } else {
                        redirectFailed("../admin/edit_products_page?id=$product_id", "Something Went Wrong");
                    }
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
            }

        } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "Product you entered already exists!");
            }

    // Deletes products
    } elseif (isset($_POST['delete_product_btn'])) {

        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
        
        $query = "SELECT * FROM products WHERE id = '$product_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $product_id;
            $category_id = mysqli_real_escape_string($con, $query_data['category_id']);
            $name = mysqli_real_escape_string($con, $query_data['name']);
            $size = mysqli_real_escape_string($con, $query_data['size']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['status'];
            $featured = $query_data['featured'];
            $original_price = mysqli_real_escape_string($con, $query_data['original_price']);
            $selling_price = mysqli_real_escape_string($con, $query_data['selling_price']);
            $image = $query_data['image'];
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $created_at = $query_data['created_at'];
            $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

            $curpath = "../uploadsProducts/$image";
            $path = "../uploadsArchiveProducts/$image";

            $insert_query = "INSERT INTO archive_products (id, category_id, name, size, description, status, featured, original_price, selling_price, image, slug, created_at, added_by) VALUES ('$id', '$category_id', '$name', '$size', '$description', '$status', '$featured', '$original_price', '$selling_price', '$image', '$slug', '$created_at', '$added_by')";
            
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run) {

                //  Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM products WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }

            }
        }

        
    } // Deletes Product Permanently
    elseif(isset($_POST['delete_product_permanent_btn'])) {

        $id = mysqli_real_escape_string($con, $_POST['product_id']);

        $query = "SELECT * FROM archive_products WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        $data = mysqli_fetch_array($query_run);
        $image = $data['image'];

        $delete_query = "DELETE FROM archive_products WHERE id = '$id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsArchiveProducts/".$image)) {
                unlink("../uploadsArchiveProducts/".$image);
                echo 200;
            }

        } else {
            echo 500;
        }

    }   // Recover Products
    elseif(isset($_POST['recover_product_btn'])) {

        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

        $query = "SELECT * FROM archive_products WHERE id = '$product_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $product_id;
            $category_id = mysqli_real_escape_string($con, $query_data['category_id']);
            $name = mysqli_real_escape_string($con, $query_data['name']);
            $size = mysqli_real_escape_string($con, $query_data['size']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['status'];
            $featured = $query_data['featured'];
            $original_price = mysqli_real_escape_string($con, $query_data['original_price']);
            $selling_price = mysqli_real_escape_string($con, $query_data['selling_price']);
            $image = $query_data['image'];
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $created_at = $query_data['created_at'];
            $added_by = mysqli_real_escape_string($con, $query_data['added_by']);

            $path = "../uploadsProducts/$image";
            $curpath = "../uploadsArchiveProducts/$image";

            $insert_query = "INSERT INTO products (id, category_id, name, size, description, status, featured, original_price, selling_price, image, slug, created_at, added_by) VALUES ('$id', '$category_id', '$name', '$size', '$description', '$status', '$featured', '$original_price', '$selling_price', '$image', '$slug', '$created_at', '$added_by')";
            
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run) {

                //  Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM archive_products WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }

            } else {
                echo 500;
            }

        } else {
            echo 500;
        }

    }


    // -----------------------------------------------
    // ---------------ABOUT BLOGS PAGE----------------
    // -----------------------------------------------

    // Adds Blog Section
    if(isset($_POST['add_about_blog'])) {
        $author = mysqli_real_escape_string($con, $_POST['added_by']);
        $title = mysqli_real_escape_string($con, $_POST['name']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $description = mysqli_real_escape_string($con, $_POST['story']);
        $status = isset($_POST['status']) ? '1':'0';
        $image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];
        $path = "../uploadsBlogs";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_ext;

        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array('jpg', 'jpeg', 'png',);

        if(in_array($fileActualExt, $allowedExt)) {

            if($imageSize < 5000000) {

                $query = "INSERT INTO blogsabout (title, description, slug, posted, image, added_by) VALUES ('$title', '$description', '$slug', '$status', '$filename', '$author')";
                
                $query_run = mysqli_query($con, $query);

                if($query_run) {
                    move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
                    redirectSuccess("../admin/blogs_about_page", "Blog Added Successfully");
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
        }

    // Edits Blogs About
    } elseif (isset($_POST['edit_about_blog'])) {

        $blog_id = $_POST['blog_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $story = mysqli_real_escape_string($con, $_POST['story']);
        $status = isset($_POST['status']) ? '1':'0';
        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];

        if($new_image != "") {

            $fileExt = explode('.', $new_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). "." .$image_ext;

        } else {

            $update_filename = $old_image;

            $fileExt = explode('.', $old_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

        }

        if(in_array($fileActualExt, $allowedExt)) {
            if($imageSize < 5000000) {

                $path = "../uploadsBlogs";

                $query = "UPDATE blogsabout SET title = '$name', description = '$story', posted = '$status', image = '$update_filename', slug = '$slug' WHERE id = '$blog_id'";

                $query_run = mysqli_query($con, $query);

                if($query_run) {
                    if($_FILES['upload']['name'] != "") {
                        move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$update_filename);
                        if(file_exists("../uploadsBlogs/".$old_image)) {
                            unlink("../uploadsBlogs/".$old_image);
                        }
                    } 
                    redirectSuccess("../admin/blogs_about_page", "Blog Edited Successfully");
                } else {
                    redirectFailed("../admin/blogs_about_page?id=$product_id", "Something Went Wrong");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
        }

    // Deletes Blogs About
    } elseif (isset($_POST['delete_blogs_about'])) {
        $blog_id = mysqli_real_escape_string($con, $_POST['about_blog_id']);
        
        $query = "SELECT * FROM blogsabout WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $blog_id;
            $author = mysqli_real_escape_string($con, $query_data['added_by']);
            $title = mysqli_real_escape_string($con, $query_data['title']);
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['posted'] ? '1':'0';
            $image = $query_data['image'];
            $created_at = $query_data['created_at'];

            $curpath = "../uploadsBlogs/$image";
            $path = "../uploadsArchiveBlogs/$image";

            $query = "INSERT INTO archive_blogsabout (id, title, description, slug, posted, image, created_at, added_by) VALUES ('$id', '$title', '$description', '$slug', '$status', '$image', '$created_at', '$author')";
            $query_run = mysqli_query($con, $query);

            if($query_run) {
               
                // Moves file to another directory
                rename($curpath, $path);
                $delete_query = "DELETE FROM blogsabout WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }
        }

    // Recover Blogs About
    } elseif (isset($_POST['recover_aboutblogs_btn'])) {

        $blog_id = mysqli_real_escape_string($con, $_POST['about_blog_id']);
        
        $query = "SELECT * FROM archive_blogsabout WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $blog_id;
            $author = mysqli_real_escape_string($con, $query_data['added_by']);
            $title = mysqli_real_escape_string($con, $query_data['title']);
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['posted'] ? '1':'0';
            $image = $query_data['image'];
            $created_at = $query_data['created_at'];

            $curpath = "../uploadsArchiveBlogs/$image";
            $path = "../uploadsBlogs/$image";

            $query = "INSERT INTO blogsabout (id, title, description, slug, posted, image, created_at, added_by) VALUES ('$id', '$title', '$description', '$slug', '$status', '$image', '$created_at', '$author')";
            $query_run = mysqli_query($con, $query);

            if($query_run) {
               
                // Moves file to another directory
                rename($curpath, $path);
                $delete_query = "DELETE FROM archive_blogsabout WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }
        }
    // Deletes blog about Permanently
    } elseif(isset($_POST['delete_permanent_aboutblogs_btn'])) {

        $blog_id = mysqli_real_escape_string($con, $_POST['about_blog_id']);
        
        $query = "SELECT * FROM archive_blogsabout WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $image = $query_data['image'];

        $delete_query = "DELETE FROM archive_blogsabout WHERE id = '$blog_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsArchiveBlogs/".$image)) {
                unlink("../uploadsArchiveBlogs/".$image);
                echo 200;
            } else {
                echo 500;
            }

        } else {
            echo 500;
        }

} 

    // -----------------------------------------------
    // -------------INDUSTRY BLOGS PAGE---------------
    // -----------------------------------------------

    // Adds Blog Industry
    if(isset($_POST['add_industry_blog'])) {
        $author = mysqli_real_escape_string($con, $_POST['added_by']);
        $title = mysqli_real_escape_string($con, $_POST['name']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $description = mysqli_real_escape_string($con, $_POST['story']);
        $status = isset($_POST['status']) ? '1':'0';
        $image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];

        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array('jpg', 'jpeg', 'png',);

        if(in_array($fileActualExt, $allowedExt)) {

            if($imageSize < 5000000) {

                $path = "../uploadsBlogs";
                $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                $filename = time(). '.' .$image_ext;

                $query = "INSERT INTO blogsindustry (title, description, slug, posted, image, added_by) VALUES ('$title', '$description', '$slug', '$status', '$filename', '$author')";
                
                $query_run = mysqli_query($con, $query);

                if($query_run) {
                    move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
                    redirectSuccess("../admin/blogs_industry_page", "Blog Added Successfully");
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
        }
    
    // Edits Blog Industry
    } elseif (isset($_POST['edit_industry_blog'])) {

        $blog_id = $_POST['blog_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $slug = mysqli_real_escape_string($con, $_POST['slug']);
        $story = mysqli_real_escape_string($con, $_POST['story']);
        $status = isset($_POST['status']) ? '1':'0';

        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];
        $imageSize = $_FILES['upload']['size'];

        if($new_image != "") {

            $fileExt = explode('.', $new_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). "." .$image_ext;

        } else {

            $fileExt = explode('.', $old_image);
            $fileActualExt = strtolower(end($fileExt));
            $allowedExt = array('jpg', 'jpeg', 'png',);

            $update_filename = $old_image;
        }

        if(in_array($fileActualExt, $allowedExt)) {
            if($imageSize < 5000000) {

                $path = "../uploadsBlogs";

                $query = "UPDATE blogsindustry SET title = '$name', description = '$story', posted = '$status', image = '$update_filename', slug = '$slug' WHERE id = '$blog_id'";

                $query_run = mysqli_query($con, $query);

                if($query_run) {
                    if($_FILES['upload']['name'] != "") {
                        move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$update_filename);
                        if(file_exists("../uploadsBlogs/".$old_image)) {
                            unlink("../uploadsBlogs/".$old_image);
                        }
                    } 
                    redirectSuccess("../admin/blogs_industry_page", "Blog Edited Successfully");
                } else {
                    redirectFailed("../admin/blogs_industry_page?id=$product_id", "Something Went Wrong");
                }
            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "File can only be less than 50 mb");
            }
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "File type is not supported for upload");
        }

    // Deletes Blog Industry
    } elseif (isset($_POST['delete_blogs_industry'])) {

        $blog_id = mysqli_real_escape_string($con, $_POST['industry_blog_id']);
        
        $query = "SELECT * FROM blogsindustry WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $blog_id;
            $author = mysqli_real_escape_string($con, $query_data['added_by']);
            $name = mysqli_real_escape_string($con, $query_data['title']);
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['posted'] ? '1':'0';
            $image = $query_data['image'];
            $created_at = $query_data['created_at'];

            $curpath = "../uploadsBlogs/$image";
            $path = "../uploadsArchiveBlogs/$image";

            $query = "INSERT INTO archive_blogsindustry (id, title, description, slug, posted, image, added_by, created_at) VALUES ('$id', '$name', '$description', '$slug', '$status', '$image', '$author', '$created_at')";
            $query_run = mysqli_query($con, $query);

            if($query_run) {

                // Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM blogsindustry WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
            }
        }

    // Recovers Blog Industry
    } elseif (isset($_POST['recover_industryblogs_btn'])) {

        $blog_id = mysqli_real_escape_string($con, $_POST['industry_blog_id']);
        
        $query = "SELECT * FROM archive_blogsindustry WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);

        if($query_data) {

            $id = $blog_id;
            $author = mysqli_real_escape_string($con, $query_data['added_by']);
            $name = mysqli_real_escape_string($con, $query_data['title']);
            $slug = mysqli_real_escape_string($con, $query_data['slug']);
            $description = mysqli_real_escape_string($con, $query_data['description']);
            $status = $query_data['posted'] ? '1':'0';
            $image = $query_data['image'];
            $created_at = $query_data['created_at'];

            $curpath = "../uploadsArchiveBlogs/$image";
            $path = "../uploadsBlogs/$image";

            $query = "INSERT INTO blogsindustry (id, title, description, slug, posted, image, added_by, created_at) VALUES ('$id', '$name', '$description', '$slug', '$status', '$image', '$author', '$created_at')";
            $query_run = mysqli_query($con, $query);

            if($query_run) {

                // Moves file to another directory
                rename($curpath, $path);

                $delete_query = "DELETE FROM archive_blogsindustry WHERE id = '$id'";
                $delete_query_run = mysqli_query($con, $delete_query);

                if($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }

            }
        }

    // Deletes blog Industry Permanently
    } elseif(isset($_POST['delete_permanent_industryblogs_btn'])) {

        $blog_id = mysqli_real_escape_string($con, $_POST['industry_blog_id']);
        
        $query = "SELECT * FROM archive_blogsindustry WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $image = $query_data['image'];

        $delete_query = "DELETE FROM archive_blogsindustry WHERE id = '$blog_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsArchiveBlogs/".$image)) {
                unlink("../uploadsArchiveBlogs/".$image);
                echo 200;
            } else {
                echo 500;
            }

        } else {
            echo 500;
        }

    } 

