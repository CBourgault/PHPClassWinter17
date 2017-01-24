<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Corporation</title>
    </head>
    <body>
        
        <h1><a href="view-action.php?id=<?php echo $row['id']; ?>">Home Page</a></h1>
        
        <?php
        
            include './dbconnect.php';
            include './functions.php';

                // Pulls ID and deletes it from Table
            $id = filter_input(INPUT_GET, 'id');
            $isDeleted = deleteFromCorps($id);
                    // Displays whether ID was deleted
        ?>
            

            <h1> Record <?php echo $id; ?>
            <?php if ( !$isDeleted ): ?> 
            Not
            <?php endif; ?>
            Deleted</h1>
        
    </body>
</html>
