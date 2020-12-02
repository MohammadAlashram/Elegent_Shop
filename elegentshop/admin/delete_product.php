<?php
include('connection.php');

$query = "delete from products where products_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_product.php");


?>