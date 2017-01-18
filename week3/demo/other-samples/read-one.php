<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';  
    
    $id = filter_input(INPUT_GET, 'id');  
    $results = viewOneFromTest($id);
    
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['dataone']; ?></td>
                    <td><?php echo $row['datatwo']; ?></td>            
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>                       
                </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>
