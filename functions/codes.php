<?php 

session_start();
include ('../core/dbcon.php');
include ('../functions/myfunctions.php');

    // adds admin user  
    if(isset($_POST['admin_signup_submit'])) {

        $user_id = $_POST['user_id'];
        $signup_fullname = $_POST['signup_fullname'];
        $signup_email = $_POST['signup_email'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);
        $role = $_POST['signup_radio'];

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {

            redirectFailed($_SERVER['HTTP_REFERER'], "Email already exists");

        } else {

            // checks if password is the same with confirm password
            if($signup_password == $cpassword) {

                // Insert admin data
                $insert_query = "INSERT INTO users (fullname, email, password, role ,address)
                VALUES ('$signup_fullname', '$signup_email', '$signup_password', '$role ', '$signup_address')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run) {

                    redirectSuccess("../admin/admin_admin.php", "Added Sucessfully");

                } else {

                    redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");

                }
            } else {

                redirect($_SERVER['HTTP_REFERER'], "Passwords do not match");

            }
        }

    // Adds users
    } elseif(isset($_POST['users_signup_submit'])) {

        $signup_fullname = $_POST['signup_fullname'];
        $signup_email = $_POST['signup_email'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {

            redirectFailed($_SERVER['HTTP_REFERER'], "Email already exists");

        } else {

            // checks if password is the same with confirm password
            if($signup_password == $cpassword) {

                // Insert admin data
                $insert_query = "INSERT INTO users (fullname, email, password ,address)
                VALUES ('$signup_fullname', '$signup_email', '$signup_password', '$signup_address')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run) {

                    redirectSuccess("../admin/admin_users.php", "Added successfully");


                } else {

                    redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");

                }
            } else {

                redirect($_SERVER['HTTP_REFERER'], "Passwords do not match");

            }
        }

    // Updates admin user
    } elseif(isset($_POST['update_admin_submit'])) {

        $category_id = $_POST['category_id'];
        $signup_fullname = $_POST['signup_fullname'];
        $signup_email = $_POST['signup_email'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);
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
            
                // Checks if password match with confirm
                if($signup_password == $cpassword) {
    
                    // Update query
                    $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', role = '$role', address = '$signup_address'
                    WHERE id = '$category_id' ";
                    $update_query_run = mysqli_query($con, $update_query);
    
                    if($update_query_run) {
                        redirectSuccess("../admin/admin_admin.php", "Edit successfully");
                    } else {
                        redirectFailed("../admin/edit_admin_account.php?id=$category_id", "Something went wrong");
                    }
                } else {
                    redirect("../admin/edit_admin_account.php?id=$category_id", "Passwords do not match");
                }

            // Checks if email input is not greater than 0
            } elseif(!mysqli_num_rows($check_email_query_run) > 0) {

                // Checks if password match with confirm
                if($signup_password == $cpassword) {

                    // Update query
                    $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', role = '$role', address = '$signup_address'
                    WHERE id = '$category_id' ";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        redirectSuccess("../admin/admin_admin.php", "Edit successfully");
                    } else {
                        redirectFailed("../admin/edit_admin_account.php?id=$category_id", "Something went wrong");
                    }

                } else {
                    redirect("../admin/edit_admin_account.php?id=$category_id", "Passwords do not match");
                }

            } else {
                redirectFailed("../admin/edit_admin_account.php?id=$category_id", "Email already exists");
            }
            
        } else {
            redirect("../admin/edit_admin_account.php?id=$category_id", "Email must not be empty");
        }

    // Updates user
    } elseif(isset($_POST['update_user_submit'])) {

        $category_id_user = $_POST['category_id_user'];
        $signup_fullname = $_POST['signup_fullname'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);
        $signup_email = $_POST['signup_email'];

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
            
                // Checks if password match with confirm
                if($signup_password == $cpassword) {
    
                    // Update query
                    $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', address = '$signup_address'
                    WHERE id = '$category_id' ";
                    $update_query_run = mysqli_query($con, $update_query);
    
                    if($update_query_run) {
                        redirectSuccess("../admin/admin_users.php", "Edit successfully");
                    } else {
                        redirectFailed("../admin/edit_user_account.php?id=$category_id", "Something went wrong");
                    }
                } else {
                    redirect("../admin/edit_user_account.php?id=$category_id", "Passwords do not match");
                }

            // Checks if email input is not greater than 0
            } elseif(!mysqli_num_rows($check_email_query_run) > 0) {

                // Checks if password match with confirm
                if($signup_password == $cpassword) {

                    // Update query
                    $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', address = '$signup_address'
                    WHERE id = '$category_id' ";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        redirectSuccess("../admin/admin_users.php", "Edit successfully");
                    } else {
                        redirectFailed("../admin/edit_user_account.php?id=$category_id", "Something went wrong");
                    }

                } else {
                    redirect("../admin/edit_user_account.php?id=$category_id", "Passwords do not match");
                }

            } else {
                redirectFailed("../admin/edit_user_account.php?id=$category_id", "Email already exists");
            }
            
        } else {
            redirect("../admin/edit_user_account.php?id=$category_id", "Email must not be empty");
        }

    // Deletes user and admin
    } elseif(isset($_POST['delete_btn'])) {

        $category_id = mysqli_real_escape_string($con ,$_POST['category_id']);
        $delete_query = "DELETE FROM users WHERE id = '$category_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {
            // redirectSuccess($_SERVER['HTTP_REFERER'], "Delete Successfully");
            echo 200;
        } else {
            // redirectFailed($_SERVER['HTTP_REFERER'], "Delete failed");
            echo 500;
        }
    }

    // Adds Cover photo
    if (isset($_POST['upload_photo'])) {

        $added_by = $_POST['added_by'];
        $name = $_POST['name'];
        $image = $_FILES['upload']['name'];
        $description = $_POST['description'];
        $status = isset($_POST['status']) ? '1': '0';

        $path = "../uploads";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_ext;

        $query = "INSERT INTO images (name, description, status, image, added_by) VALUES ('$name', '$description', '$status', '$filename', '$added_by')";

        $query_run = mysqli_query($con, $query);

        if($query_run) {
            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
            redirectSuccess("../admin/admin_manage_home.php", "Uploaded Successfully");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
        }

    // Edit cover photo
    } elseif (isset($_POST['update_photo'])) {

        $added_by = $_POST['added_by'];
        $image_id = $_POST['image_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $old_image = $_POST['oldimage'];
        $new_image = $_FILES['upload']['name'];
        $status = isset($_POST['status']) ? '1':'0';

        if($new_image != "") {
            // $update_filename = $new_image;
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). '.' .$image_ext;
        } else {
            $update_filename = $old_image;
        }

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
            redirectSuccess("../admin/admin_manage_home.php", "Updated Successfully");
        } else {
            redirectFailed("../admin/admin_edit_homepage?id=$image_id", "Something Went Wrong");
        }

    // Delete cover photo
    } elseif (isset($_POST['deletephoto_btn'])) {

        $image_id = mysqli_real_escape_string($con,$_POST['image_id']);

        $query = "SELECT * FROM images WHERE id = '$image_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $fetch_image = $query_data['image'];

        $delete_query = "DELETE FROM images WHERE id = '$image_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploads/".$fetch_image)) {
                unlink("../uploads/".$fetch_image);
            }

            // redirectSuccess("../admin/admin_manage_home.php", "Deleted Successfully");
            echo 200;
        } else {
            // redirectFailed("../admin/admin_manage_home.php", "Delete Failed");
            echo 500;
        }
    }

    // Adds category
    if(isset($_POST['category_submit'])) {

        $added_by = $_POST['added_by'];
        $category_name = $_POST['name'];
        $slug = $_POST['slug'];
        $image = $_FILES['upload']['name'];
        $category_description = $_POST['description'];
        $status = isset($_POST['status']) ? '1':'0';
        
        $path = "../uploadsCategories";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). "." .$image_ext;

        $query = "INSERT INTO categories (name, description, status, image, slug, added_by) VALUES ('$category_name', '$category_description', '$status', '$filename', '$slug', '$added_by')";

        $query_run = mysqli_query($con, $query);

        if($query_run) {
            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
            redirectSuccess("../admin/admin_categories_page.php", "Category Added Successfully");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
        }

    // Updates Category
    } elseif (isset($_POST['update_category_submit'])) {

        $category_id = $_POST['category_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $slug = $_POST['slug'];
        $status = isset($_POST['status']) ? '1': '0';

        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];

        if($new_image != "") {
            // $update_filename = $new_image;
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). '.' .$image_ext;
        } else {
            $update_filename = $old_image;
        }

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
            redirectSuccess("../admin/admin_categories_page.php", "Updated Successfully");
        } else {
            redirectFailed("../admin/admin_edit_categories?id=$category_id", "Something Went Wrong");
        }
    // Deletes Category
    } elseif (isset($_POST['delete_category_btn'])) {

        $category_id = mysqli_real_escape_string($con,$_POST['category_id']);

        $query = "SELECT * FROM categories WHERE id = '$category_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $fetch_image = $query_data['image'];

        $delete_query = "DELETE FROM categories WHERE id = '$category_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsCategories/".$fetch_image)) {
                unlink("../uploadsCategories/".$fetch_image);
            }

            // redirectSuccess("../admin/admin_categories_page.php", "Deleted Successfully");
            echo 200;
        } else {
            // redirectFailed("../admin/admin_categories_page.php", "Delete Failed");
            echo 500;
        } 
    }

    // Adds products
    if(isset($_POST['add_product_submit'])) {

        $category_id = $_POST['category_id'];
        $added_by = $_POST['added_by'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $status = isset($_POST['status']) ? '1':'0';
        $featured = isset($_POST['featured']) ? '1':'0';
        $original_price = ($_POST['original_price']);
        $selling_price = ($_POST['selling_price']);

        $image = $_FILES['upload']['name'];
        $path = "../uploadsProducts";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_ext;

        $query = "INSERT INTO products (category_id, added_by, name, description, status, featured, original_price, selling_price, image, slug) VALUES ('$category_id', '$added_by', '$name', '$description', '$status', '$featured', '$original_price', '$selling_price', '$filename', '$slug')";
        
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
            redirectSuccess("../admin/admin_products_page.php", "Products Added Successfully");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
        }
    // Edits Products
    } elseif (isset($_POST['update_product_submit'])) {

        $category_id = $_POST['category_id'];
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $status = isset($_POST['status']) ? '1':'0';
        $featured = isset($_POST['featured']) ? '1':'0';
        $original_price = $_POST['original_price'];
        $selling_price = $_POST['selling_price'];

        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];

        if($new_image != "") {
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). "." .$image_ext;
        } else {
            $update_filename = $old_image;
        }

        $path = "../uploadsProducts";

        $query = "UPDATE products SET category_id = '$category_id', name = '$name', description = '$description', status = '$status', featured = '$featured', original_price = '$original_price', selling_price = '$selling_price', image = '$update_filename', slug = '$slug' WHERE id = '$product_id'";

        $query_run = mysqli_query($con, $query);

        if($query_run) {
            if($_FILES['upload']['name'] != "") {
                move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$update_filename);
                if(file_exists("../uploadsProducts/".$old_image)) {
                    unlink("../uploadsProducts/".$old_image);
                }
            } 
            redirectSuccess("../admin/admin_products_page.php", "Product Edited Successfully");
        } else {
            redirectFailed("../admin/edit_products_page.php?id=$product_id", "Something Went Wrong");
        }
    // Deletes products
    } elseif (isset($_POST['delete_product_btn'])) {

        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
        
        $query = "SELECT * FROM products WHERE id = '$product_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $fetch_image = $query_data['image'];

        $delete_query = "DELETE FROM products WHERE id = '$product_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsProducts/".$fetch_image)) {
                unlink("../uploadsProducts/".$fetch_image);
            }

            // redirectSuccess("../admin/admin_products_page.php", "Deleted Successfully");
            echo 200;
        } else {
            // redirectFailed("../admin/admin_products_page.php", "Delete Failed");
            echo 500;
        }
    }

    // Adds Blog Section
    if(isset($_POST['add_about_blog'])) {
        $author = $_POST['added_by'];
        $title = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['story'];
        $status = isset($_POST['status']) ? '1':'0';
        
        $image = $_FILES['upload']['name'];
        $path = "../uploadsBlogs";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_ext;

        $query = "INSERT INTO blogsabout (title, description, slug, posted, image, added_by) VALUES ('$title', '$description', '$slug', '$status', '$filename', '$author')";
        
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
            redirectSuccess("../admin/blogs_about_page.php", "Products Added Successfully");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
        }

    // Edits Blogs
    } elseif (isset($_POST['edit_about_blog'])) {

        $blog_id = $_POST['blog_id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $story = $_POST['story'];
        $status = isset($_POST['status']) ? '1':'0';

        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];

        if($new_image != "") {
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). "." .$image_ext;
        } else {
            $update_filename = $old_image;
        }

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
            redirectSuccess("../admin/blogs_about_page.php", "Product Edited Successfully");
        } else {
            redirectFailed("../admin/blogs_about_page.php?id=$product_id", "Something Went Wrong");
        }

    // Deletes Blogs
    } elseif (isset($_POST['delete_blogs_about'])) {
        $blog_id = mysqli_real_escape_string($con, $_POST['about_blog_id']);
        
        $query = "SELECT * FROM blogsabout WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $fetch_image = $query_data['image'];
        
        $delete_query = "DELETE FROM blogsabout WHERE id = '$blog_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsBlogs" . $fetch_image)) {
                unlink ("../uploadsBlogs" . $fetch_image);
            }

            echo 200;

        } else {
            echo 500;
        }
    }

    // Adds Blog Industry
    if(isset($_POST['add_industry_blog'])) {
        $author = $_POST['added_by'];
        $title = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['story'];
        $status = isset($_POST['status']) ? '1':'0';
        
        $image = $_FILES['upload']['name'];
        $path = "../uploadsBlogs";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time(). '.' .$image_ext;

        $query = "INSERT INTO blogsindustry (title, description, slug, posted, image, added_by) VALUES ('$title', '$description', '$slug', '$status', '$filename', '$author')";
        
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            move_uploaded_file($_FILES['upload']['tmp_name'], $path. '/' .$filename);
            redirectSuccess("../admin/blogs_industry_page.php", "Products Added Successfully");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Something Went Wrong");
        }
    
    // Edits Blog Industry
    } elseif (isset($_POST['edit_industry_blog'])) {

        $blog_id = $_POST['blog_id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $story = $_POST['story'];
        $status = isset($_POST['status']) ? '1':'0';

        $old_image = $_POST['old_image'];
        $new_image = $_FILES['upload']['name'];

        if($new_image != "") {
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $update_filename = time(). "." .$image_ext;
        } else {
            $update_filename = $old_image;
        }

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
            redirectSuccess("../admin/blogs_industry_page.php", "Product Edited Successfully");
        } else {
            redirectFailed("../admin/blogs_industry_page.php?id=$product_id", "Something Went Wrong");
        }

    // Deletes Blog Industry
    } elseif (isset($_POST['delete_blogs_industry'])) {
        $blog_id = mysqli_real_escape_string($con, $_POST['industry_blog_id']);
        
        $query = "SELECT * FROM blogsindustry WHERE id = '$blog_id'";
        $query_run = mysqli_query($con, $query);
        $query_data = mysqli_fetch_array($query_run);
        $fetch_image = $query_data['image'];
        
        $delete_query = "DELETE FROM blogsindustry WHERE id = '$blog_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if($delete_query_run) {

            if(file_exists("../uploadsBlogs" . $fetch_image)) {
                unlink ("../uploadsBlogs" . $fetch_image);
            }

            echo 200;

        } else {
            echo 500;
        }
    }