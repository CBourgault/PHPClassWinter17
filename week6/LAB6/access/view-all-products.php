<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>All Products</title>
    </head>
    <body background="../access/uploads/subtle.png"></body>
        <?php
        session_start();
        include '../users/functions/dbconnect.php';
        include '../users/functions/util.php';
        include_once '../access/header.php';
        include_once './checkstatus.php';
        if (!isLoggedIn()) {
            die('Access not allowed');
        }
        $results = viewAllProducts();
        $category = viewAllCategories();
        ?>

        <h1>
            <a href="create-products.php">Add Product</a>
            <a href="admin.php">Admin Main</a>
        </h1>   

        <table class=" table-hover" border="1"> 
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>

            <?php foreach ($results as $rows): ?>
                <tr>
                    <td><?php echo $rows['product_id']; ?></td>
                    <td><?php echo $rows['category']; ?></td>
                    <td><?php echo $rows['product']; ?></td>           
                    <td>$<?php echo number_format($rows['price'], 2); ?></td>            
                    <td> <?php if (!empty($rows['image'])): ?>
                            <img src="<?php echo 'uploads/' . $rows['image']; ?>" width="100px"/>
                        <?php else: ?>
                            <img src="default-image/default_product.jpg" width="100px"/>
                        <?php endif; ?>
                    </td>

                    <td><a href="read-products.php?product_id=<?php echo $rows['product_id']; ?>">Read</a></td>            
                    <td><a href="update-products.php?product_id=<?php echo $rows['product_id']; ?>">Update</a></td>            
                    <td><a href="delete-products.php?product_id=<?php echo $rows['product_id']; ?>">Delete</a></td>       
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
