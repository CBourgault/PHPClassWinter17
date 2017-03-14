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
        <title>All Categories</title>
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
        $results = viewAllCategories();
        ?>

        <h1>
            <a href="add-category.php?">Add Category</a>
            <a href="admin.php">Admin Main</a>
        </h1>    

        <table class="table-hover" border="5">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Category ID</th>
                </tr>
            </thead>

            <?php
            foreach ($results as $rows):
                // Shows a new row for every piece of array of data found in table
                ?>
                <tr>
                    <td><?php echo $rows['category']; ?></td>  
                    <td><?php echo $rows['category_id']; ?></td>                    
                    <td><a href="read-categories.php?category_id=<?php echo $rows['category_id']; ?>">Read</a></td>            
                    <td><a href="update-categories.php?category_id=<?php echo $rows['category_id']; ?>">Update</a></td>            
                    <td><a href="delete-categories.php?category_id=<?php echo $rows['category_id']; ?>">Delete</a></td>       
                </tr>
<?php endforeach; ?>
        </table>


    </body>
</html>
