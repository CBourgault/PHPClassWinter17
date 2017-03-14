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
        <title>Update Category</title>
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
        $category_id = filter_input(INPUT_GET, 'category_id');
        $errors = array();
        if (!isset($category_id)) {
            exit('Record not found');
        } else {
            $results = viewOneCategory($category_id);
            $category = $results['category'];
            if (isPostRequest()) {
                $category = filter_input(INPUT_POST, 'category');
                if (empty($category)) {
                    $errors[] = "Category Blank";
                }
                if (count($errors) === 0) {
                    $updated = updateCategoryRow($category_id, $category);
                    $category_id = filter_input(INPUT_POST, 'category_id');
                    $category = filter_input(INPUT_POST, 'category');
                    $result = "Category Updated";
                }
            }
        }
        ?>
        <h1><a href='view-all-categories.php'>Categories</a></h1>
        <?php include '../users/templates/error-messages.html.php'; ?>  
        <?php if (isset($result)) : ?>
            <h2> <?php echo $result; ?></h2>
            <h3> <?php echo "$category has been updated"; ?></h3>
        <?php endif; ?>

        <form class="form-inline" method="post" action="#">   
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" value="<?php echo $category; ?>" name="category" />
            </div>

            <input type="hidden" value="<?php echo $category_id; ?>" name="category_id" /> 
            <button type="submit" class="btn btn-primary"> Update </button>
        </form>
    </body>
</html>
