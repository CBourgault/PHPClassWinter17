<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Administration</title>
    </head>
    <body background="../access/uploads/subtle.png">
        <?php
        session_start();        
        include_once '../users/functions/users.php';
        include_once '../access/header.php';
        include_once './checkstatus.php';        
        if ( !isLoggedIn() ) {
            die('Access not allowed');
        }             
        ?>
        
        <h2><a href='../cart/main.php?'>View Store</a></h2>
        <hr>
        <h2>
            <a href='view-all-categories.php'>View All Categories</a>
            <a href='view-all-products.php'>View All Items</a>
        </h2>
        <h1> Welcome To The Admin Page</h1>
    </body>
</html>
