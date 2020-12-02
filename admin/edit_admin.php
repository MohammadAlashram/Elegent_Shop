<?php
include('includs/connection.php');
// make the action when user click on Save Button
if (isset($_POST['submit'])) {

    // get image data
    $image_name = $_FILES['admin_image']['name'];
    $tmp_name   = $_FILES['admin_image']['tmp_name'];
    $path       = 'img/admin_image/';


    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);

    // Take Data From Web Form 
    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_name'];
    $role = "admin";

    $query = "update admin set 
    admin_email      = '$email',
    admin_password   = '$password',
    admin_name       = '$fullname',
    admin_image      = '$path$image_name',
    admin_role       = '$role'
    where admin_id = {$_GET['id']}";


            //   $query = "update admin set 
            //   admin_email    = '$email',
            //   admin_password = '$password',
            //   fullname       = '$fullname',
            //   image          = '$path$image_name'
            //   where admin_id = {$_GET['id']}";

    mysqli_query($conn, $query);
    header("location:manage_admin.php");
}
?>
<?php
include('includs/header.php');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Form Start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Admin</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Full Name</label>
                                        <input type="text" name="admin_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" name="admin_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" name="admin_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <label for="img"></label>
                            <input class="btn btn-primary col-md-6" name="admin_image" type="file" id="img" name="img" accept="image/*">
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Create Admin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includs/footer.php');
?>












<?php
include('includes/connection.php');

// make the action when user click on Save Button
if (isset($_POST['submit'])) {
    // Take Data From Web Form 
    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_fullname'];

    // get image data
    $image_name = $_FILES['admin_image']['name'];
    $tmp_name   = $_FILES['admin_image']['tmp_name'];
    $path       = 'images/admin_image/';

    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);

    $query = "update admin set admin_email    = '$email',
                               admin_password = '$password',
                               fullname       = '$fullname',
                               image          = '$path$image_name'
              where admin_id = {$_GET['id']}";

    mysqli_query($conn, $query);
    header("location:manage_admin.php");
}

// Fetch Old Data 
$query = "select * from admin where admin_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);

?>
<?php include('includes/admin_header.php'); ?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                    <input id="cc-pament" name="admin_email" type="text" class="form-control" value="<?php echo $row['admin_email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                    <input id="cc-pament" name="admin_password" type="password" class="form-control" value="<?php echo $row['admin_password'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Fullname</label>
                                    <input id="cc-pament" name="admin_fullname" type="text" class="form-control" value="<?php echo $row['fullname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">New Image</label>
                                    <input id="cc-pament" name="admin_image" type="file" class="form-control">
                                </div>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit" style="background-color:#4FBFA8;">
                                <span id="payment-button-amount">Update</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End MAIN CONTENT-->
<?php
include('includs/footer.php');
?>