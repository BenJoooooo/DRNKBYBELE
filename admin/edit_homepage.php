<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ("../functions/accessMiddleWare.php");
    include ('includes/header.php');

?>

    <div class="wrapper">
        <?php include('includes/sidebar.php'); ?>

        <div class="body-wrapper">
            <div class="admin-main-content-add-page">
                <div class="admin-page-header">
                    <div class="admin-page-greet">
                        <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                    </div>
                    <div class="admin-page-title">
                        <h3>Home Page Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <?php if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $getImage = getById("images", $id);

                            if(mysqli_num_rows($getImage) > 0) {
                                $data = mysqli_fetch_array($getImage);  
                        ?>

                        <div class="card-header">
                            <h3>Edit Cover Photo</h3>
                            <a href="admin_manage_home" class="btn px-4 btn-light float-end">Back</a>

                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                                <div class="signup fullname">
                                    <input type="hidden" name="created_at" value="<?= $data['created_at']; ?>">
                                    <input type="hidden" name="image_id" value="<?= $data['id']; ?>">
                                    <input type="hidden" name="added_by" value="<?= $SESSION['auth_user']['fullname']; ?>">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="<?= $data['name'] ?>" class="signup-input" required placeholder="Enter Full Name">
                                </div>    
                                <div class="signup email">
                                    <label for="">Description</label>
                                    <input type="text" name="description" value="<?= $data['description'] ?>" class="signup-input" placeholder="Enter description">
                                </div>
                                <div class="signup fullname">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="upload" class="signup-input" multiple placeholder="Upload an image">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="oldimage" value="<?= $data['image']; ?>">
                                    <img src="../uploads/<?= $data['image']; ?>" alt="<?= $data['name']; ?>">
                                </div>

                                <div class="signup-role">
                                    <div class="signup admin-role">
                                        <label for="">Hide</label>
                                        <input type="checkbox" <?= $data['status'] == '0' ? '':'checked' ?> name="status" class="signup-input">
                                    </div>
                                </div>

                                <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                                
                                <button class="signup-submit" name="update_photo">Update Photo</button>
                            </form>
                        </div>
                        
                        <?php 
                            } else {
                                echo "No data found";
                            }
                        } else {
                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        <div class="body-wrapper">

    </div>

    <script src="../functions/passwordIcon.js"></script>
    <script src="../functions/repeat-password.js"></script>

<?php

    
    include ('includes/footer.php');

?>