<?php
include('includs/connection.php');
include('includs/header.php');
?>

<?php
// make the action when user click on Save Button
if(isset($_POST['submit'])){

    // get image data
    $image_name = $_FILES['product_image']['name'];
    $tmp_name   = $_FILES['product_image']['tmp_name'];
    $path       = 'img/product_image/';

  

    // move image to folder
    move_uploaded_file($tmp_name,$path.$image_name);


    // Take Data From Web Form
    // $productId   = $_POST['select'];

    $productName    = $_POST['product_name'];
    $productDesc    = $_POST['product_description'];
    $productPrice   = $_POST['product_price'];
    $categoryTag    = $_POST['category_tag'];
    $productsSale   = $_POST['products_sale'];
    
   

    $query = "insert into products( products_name, products_des, products_image,  products_price, category_tag ,products_sale)
              values('$productName', '$productDesc', '$path$image_name' , '$productPrice', $categoryTag ,  $productsSale)";
    mysqli_query($conn,$query);
   
}

 ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="col-lg-12">
                                <div class="card">
                                <div class = "card-header card-header-primary">
                                <div class="card-header"><h3>Manage Product</h3></div>
                                </div>
                                    
                                     
                                <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Create Product</h3>
                                </div>
                                <hr>
                                <form action="" method="post"  enctype="multipart/form-data">
                                    <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Fullname</label>
                                        <input type="text" name="product_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product descount</label>
                                        <input type="text" class="form-control" name="product_description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Product Image</label>
                                    <input type="file"  class="form-control" name="product_image">
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Price</label>
                                        <input type="text" class="form-control" name="product_price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Tag</label>
                                        <input type="text" class="form-control" name="category_tag">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Products Sale</label>
                                        <input type="text" class="form-control" name="products_sale">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Adress</label>
                                        <input type="text" class="form-control" name="product_image">
                                    </div>
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-primary pull-right" name= "submit">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                                   
                                    </div>
                                </div>
                            </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Simple Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                    Product Name
                                    </th>
                                    <th>
                                    Category Image
                                    </th>
                                    <th>
                                    Product Price
                                    </th>
                                    <th>
                                    Product descount
                                    </th>
                                    <th>
                                    Products Sale
                                    </th>
                                    <th>
                                    category_tag
                                    </th>
                                    <th>
                                    Edit
                                    </th>
                                    <th>
                                    Delete
                                    </th>



                                   
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                   
                                    <?php
                                            $query  = "select * from products";
                                            $result = mysqli_query($conn,$query);
                                            /*The mysqli_fetch_assoc() function accepts a result object as a parameter and,
                                            retrieves the contents of current row in the given result object,
                                            and returns them as an associative array.
                                            */
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                
                                                echo "<td>{$row['products_id']}</td>";
                                                echo "<td>{$row['products_name']}</td>";
                                                echo "<td><img src='{$row['pro_image']}' width='200' height='200'></td>";
                                                echo "<td>{$row['products_price']}</td>";
                                                
                                                echo "<td>{$row['products_des']}</td>";
                                                echo "<td>{$row['products_sale']}</td>";
                                                echo "<td>{$row['category_tag']}</td>";

                                                echo "<td>
                                                <a class='nav-link' href='href='edit_product.php?id={$row['products_id']}'>
                                                    <i class='material-icons text-success'>delete_forever</i>  
                                                </a>
                                                </td>";
                                                
                                                echo "<td><a class='nav-link href='delete_product.php?id={$row['products_id']}'>
                                                <i class='material-icons text-danger'>create</i>
                                            </a>
                                        </td>";

                                               
                                            }
                                        ?>
                                        <!-- <td>
                                        <a class="nav-link" href="./manage_category.php">
                                            <i class="material-icons badge outline-badge-danger shadow-none">delete_forever</i>  
                                        </a>
                                        </td>
                                        <td>
                                        <a class="nav-link" href="./manage_category.php">
                                            <i class="material-icons">create</i>
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