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
        <title>Update Product</title>
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
        $category_id = filter_input(INPUT_GET, 'category_id');
        $category = viewAllCategories();
        $errors = array();
        if (!isset($product_id)) {
            exit('Record not found');
        } else {
           

            if (isPostRequest()) {
                $category_id = filter_input(INPUT_POST, 'category_id');              
                $product = filter_input(INPUT_POST, 'product');
                $price = filter_input(INPUT_POST, 'price');
                $filename = filter_input(INPUT_POST, 'image');
                if (empty($category_id)) {
                    $errors[] = "Category ID Error, Refresh Product";
                }
                if (empty($product)) {
                    $errors[] = "Product Error, Refresh Product";
                }
                if (empty($price)) {
                    $errors[] = "Price Error, Refresh Product";
                }
                if (count($errors) === 0) {
                    if (count($_FILES)) {
                        try {
                            $filename = uploadImage('newimage');
                        } catch (RuntimeException $e) {
                            
                        }
                    }
                    $updated = updateProductData($product_id, $category_id, $product, $price, $filename);                   
                    $updateResults = "Product Updated";
                }
            }
            
            $singleResult = viewOneProduct($product_id);
            $product_id = $singleResult['product_id'];
            $category_id = $singleResult['category_id'];
            $product = $singleResult['product'];
            $price = $singleResult['price'];
            $filename = $singleResult['image'];
        }
        ?>
        <?php if (isset($updateResults)) : ?>
            <h2> <?php echo $updateResults; ?></h2>
        <?php endif; ?>

        <?php include '../users/templates/error-messages.html.php'; ?>    

        <h1><a href='view-all-products.php'>Products</a></h1>
        <h5><a href="update-products.php?product_id=<?php echo $singleResult['product_id']; ?>">Refresh Product</a></h5>

        <form class="form-inline" enctype="multipart/form-data" method="post" action="#">          

            <div class="form-group">
                <label for="category"> Category</label>
                <select class ="form-control" name="category_id"> 
                    <?php foreach ($category as $row): ?>
                        <option
                            value="<?php echo $row['category_id']; ?>"
                            <?php if (intval($category_id) === $row['category_id']) : ?>
                                selected="selected"
                            <?php endif; ?>
                            >
                                <?php echo $row['category']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>

            <div class="form-group">
                <label for="product"> Product</label>
                <input type="text" class ="form-control" value="<?php echo $product; ?>" name="product"/>
            </div>
            <br>

            <div class="form-group">
                <label for="price"> Price</label>
                <input type="text" class ="form-control" value="<?php echo $price; ?>" name="price"/>
            </div>
            <br>

            <div class="form-group">
                <?php if (!empty($filename)): ?>
                    <img src="<?php echo '../access/uploads/' . $filename; ?>" width="100px"/>
                <?php else: ?>
                    <img src="../access/default-image/default_product.jpg" width="100px"/>
                <?php endif; ?>
            </div>

            <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" /> 

            <input name="newimage" type="file" />        
            <input type="submit" value="Update Product" />
            <br>       
        </form>
    </body>
</html>
