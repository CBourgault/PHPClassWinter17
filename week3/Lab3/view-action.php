<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Corporations </title>
    </head>
    <body>
        <?php
       
        include './dbconnect.php';
        include './functions.php';
        $results = viewAllFromCorps();
        
        ?>

        <h1><a href="add.php?id=<?php echo $row['id']; ?>">Add Corporation</a></h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */            
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>           
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                    <td><a href="read-one.php?id=<?php echo $row['id']; ?>">Read</a></td>            
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
