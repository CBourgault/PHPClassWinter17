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
        <title>Store</title>
    </head>
    <body background="../access/uploads/subtle.png">
        <?php
        include '../users/functions/dbconnect.php';
        include './functions/cart.php';           
            
            session_start();
                        
            /* php processing variables */
            $action = filter_input(INPUT_POST, 'action');
            $product_id = filter_input(INPUT_POST, 'product_id');
            $category_id = filter_input(INPUT_GET, 'category_id');
            
            if ( $action === 'Buy' ) {
                addToCart($product_id);
            }
            
            if ( $action === 'Empty cart' ) {
                emptyCart();
            }                           
            
            /* View variables */
            startCart();
            $items = viewAllProducts();            
            $cartCount = cartCount();
            $allCategories = viewAllCategories();            
            
            if ( !is_null($category_id) ) {
                $items = getItemsByCategory($category_id);
            } else {
                $items = viewAllProducts();
            }
        ?>    
        
        <h2>
        <a href='../users/signup.php'>Sign Up</a>    
        <a href='../users/login.php'>Login</a>    
        </h2>   
            
        <?php    
            include './templates/categories.html.php';
            include './templates/cart-count.html.php';
            include './templates/clear-cart.html.php';
        ?>
        <p><a href="checkout.php">Checkout</a></p>
        <?php
            include './templates/catalog.html.php';
        ?>
        
        <p><a href="checkout.php">Checkout</a></p>
    </body>
</html>
