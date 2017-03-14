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
        <title>Delete Category</title>
    </head>
    <body background="../access/uploads/subtle.png">
        <?php
    session_start();
    include '../users/functions/dbconnect.php';
    include '../users/functions/util.php';
    include_once '../access/header.php';
    include_once './checkstatus.php';          
    if ( !isLoggedIn() ) {
        die('Access not allowed');
    }
        $category_id = filter_input(INPUT_GET, 'category_id');
        $isDeleted = deleteCategory($category_id);
        ?>
        
        <h1><a href='view-all-categories.php'>Categories</a></h1>
        
        <h1> Record <?php echo $category_id; ?>
        <?php if ( !$isDeleted ): ?> 
        Not
        <?php endif; ?>
        Deleted</h1>
    </body>
</html>

