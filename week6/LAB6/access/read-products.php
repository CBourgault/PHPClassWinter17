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
        <title>View Product</title>
    </head>
    <body background="../access/uploads/subtle.png">
        <?php
        session_start();
        include '../users/functions/dbconnect.php';
        include '../users/functions/util.php';
        include_once '../access/header.php';
        include_once './checkstatus.php';
        if (!isLoggedIn()) {
            die('Access not allowed');
        }
        $product_id = filter_input(INPUT_GET, 'product_id');
        $singleResult = viewOneProduct($product_id);
        $filename = $singleResult['image'];
        ?>

        <h1><a href='view-all-products.php'>Products</a></h1>

        <table class=" table-hover" border="1"> 
            <thead>
                <tr>
                    <th> Product ID</th>
                    <th> Category ID</th>
                    <th> Product</th>
                    <th> Price</th>
                    <th> Image</th>
                </tr>
            </thead>

            <tr>
                <td><?php echo $singleResult['category_id']; ?></td>
                <td><?php echo $singleResult['category_id']; ?></td>      
                <td><?php echo $singleResult['product']; ?></td>      
                <td>$<?php echo $singleResult['price']; ?></td>      
                <td><?php if (!empty($filename)): ?>
                        <img src="<?php echo '../access/uploads/' . $filename; ?>" width="100px"/>
                    <?php else: ?>
                        <img src="../access/default-image/default_product.jpg" width="100px"/>
                    <?php endif; ?></td>      
                <td><a href="update-products.php?product_id=<?php echo $product_id; ?>">Update</a></td>            
                <td><a href="delete-products.php?product_id=<?php echo $product_id; ?>">Delete</a></td>                          
            </tr>
        </table>
    </body>
</html>
