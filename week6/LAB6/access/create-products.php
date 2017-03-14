
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Add Product</title>
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

        $category_id = filter_input(INPUT_POST, 'category_id');
        $product = filter_input(INPUT_POST, 'product');
        $price = filter_input(INPUT_POST, 'price');
        $filename = '';
        $errors = array();
        $category = viewAllCategories();

        if (isPostRequest()) {
            if (empty($category_id)) {
                $errors[] = "Category ID Error";
            }

            if (empty($product)) {
                $errors[] = "Product Error";
            }
            if (empty($price)) {
                $errors[] = "Price Error";
            }

            if (count($errors) === 0) {
                if (count($_FILES)) {
                    try {
                        $filename = uploadImage('newimage');
                    } catch (RuntimeException $e) {
                    }
                }
                $confirm = createProduct($category_id, $product, $price, $filename);
                $productResults = "Product Added";
            }
        }
        ?>

        <?php if (isset($productResults)) : ?>
            <h2> <?php echo $productResults; ?></h2>
        <?php endif; ?>

        <?php include '../users/templates/error-messages.html.php'; ?>    

        <h1><a href='view-all-products.php'>Products</a></h1> 


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
                <input type="text" class ="form-control" value="" name="product" placeholder="Dual Monitors"/>
            </div>
            <br>

            <div class="form-group">
                <label for="price"> Price</label>
                <input type="text" class ="form-control" value="" name="price" placeholder="100.00"/>
            </div>
            <br>

            <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" /> 

            Send this file: <input name="newimage" type="file" />        

            <input type="submit" value="Submit Product" />
            <br>       
        </form>
    </body>
</html>

