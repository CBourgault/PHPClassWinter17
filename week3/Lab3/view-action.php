<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> All Corporations </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?php
       // Home page 
        include './dbconnect.php';
        include './functions.php';
        $results = viewAllFromCorps();
        
        ?>

        <h1><a href="add.php?id=<?php echo $row['id']; ?>">Add Corporation</a></h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            
            <?php foreach ($results as $row): 
                // Shows a new row for every piece of array of data found in table
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>           
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                    <td><a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>       
                    
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
