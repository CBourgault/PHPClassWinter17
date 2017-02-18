<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        
        include_once '../users/functions/users.php';
        include_once '../access/header.php';
        include_once './checkstatus.php';
        
        if ( !isLoggedIn() ) {
            die('Access not allowed');
        }
              
        ?>
        
        <h1>Admin Page</h1>
        <h2> Show View All Items and View All Categories</h2>
        <h2> Include Logout Button</h2>
        <h2> From View Items/View Categories Create/Edit/Delete</h2>
    </body>
</html>
