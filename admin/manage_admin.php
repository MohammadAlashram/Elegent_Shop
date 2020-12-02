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

    $query = "insert into admin(admin_email,admin_password,admin_name,admin_image,admin_role)
              values('$email','$password','$fullname','$path$image_name','$role')";
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
            <!-- CEO START -->
            <?php
            $query  = "SELECT * FROM admin WHERE admin_role='SuperAdmin';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-12">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="img/admin_image/<?php echo $row['admin_image']; ?>" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category">CEO / CO-Founder</h6>
                            <h4 class="card-title"><?php echo $row['admin_name']; ?></h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-primary btn-round">Edit CEO Profile</a>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>
            <!-- Form Start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add new Admin</h4>
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
            <!-- Table Start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Admin Table</h4>
                        <p class="card-category"> Here is a Admins for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query  = "SELECT * FROM admin WHERE admin_role='admin';";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$row['admin_id']}</td>";
                                            echo "<td>{$row['admin_name']}</td>";
                                            echo "<td>{$row['admin_email']}</td>";
                                            echo "<td>{$row['admin_role']}</td>";
                                            echo "<td><img src='{$row['admin_image']}' width='80px' height='80px'></td>";
                                            echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='nav-link btn btn-primary'><i class='material-icons'>create</i></a></td>";
                                            echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='nav-link btn btn-danger'><i class='material-icons'>delete_forever</i></a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                        <!-- <td>
                                            <a class="nav-link btn btn-primary" href="./manage_admin.php">
                                                <i class="material-icons ">create</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="nav-link btn btn-danger" href="./manage_admin.php">
                                                <i class="material-icons ">delete_forever</i>
                                            </a>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includs/footer.php');
?>