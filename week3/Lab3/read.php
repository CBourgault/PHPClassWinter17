<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Corporation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <h1><a href="view-action.php?id=">Home Page</a></h1>
        
        <?php
        include './dbconnect.php';
        include './functions.php';  
    
            $id = filter_input(INPUT_GET, 'id'); 
            $results = viewOneFromCorps($id);
        ?>
        
        <table class ="table table-striped">
            <thead>
                <tr>
                    <th> ID</th>
                    <th> Corporation Name</th>
                    <th> Incorporated Date</th>
                    <th> Email Address</th>
                    <th> Zip Code</th>
                    <th> Owner</th>
                    <th> Phone Number</th>
                </tr>
            </thead>
               
                <tr>
                    <td><?php echo $results['id']; ?></td>
                    <td><?php echo $results['corp']; ?></td>    
                    <td><?php echo  date("F j, Y, g:i a",strtotime($results['incorp_dt'])); ?></td>
                    <td><?php echo $results['email']; ?></td>            
                    <td><?php echo $results['zipcode']; ?></td>            
                    <td><?php echo $results['owner']; ?></td>            
                    <td><?php echo $results['phone']; ?></td>     
                   
                    <td><a href="update.php?id=<?php echo $results['id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $results['id']; ?>">Delete</a></td>                       
                </tr>

        </table>
                     
    </body>
</html>
