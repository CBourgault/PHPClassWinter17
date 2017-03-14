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
        <title>Checkout</title>
    </head>
    <body background="../access/uploads/subtle.png">
        <?php
        include '../users/functions/dbconnect.php';
        include './functions/cart.php';
        session_start();
        
        /* php processing variables */
        $action = filter_input(INPUT_POST, 'action');                      

        if ( $action === 'Empty cart' ) {
            emptyCart();
        }

        /* View variables */
        startCart();
        $cartCount = cartCount();
        $cart = getCart();       
        $total = getCartTotal();

        include './templates/cart-items.html.php';
        include './templates/cart-count.html.php';
        include './templates/clear-cart.html.php';

        ?>
    </body>
</html>
