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
        <title>Single Result</title>
    </head>
    <body>
        <?php
        include './functions/dbconnect.php';
        include './functions/functions.php';

        $id = filter_input(INPUT_GET, 'id');
        $singleResult = viewOneFromAccount($id);
        ?>
        <h1><a href="all_results.php">All Results</a></h1>       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th> ID </th>
                    <td><?php echo $singleResult['id']; ?></td>  
                </tr>
                <tr>
                    <th> Email Address </th>
                    <td><?php echo $singleResult['email']; ?></td>
                </tr>
                <tr>
                    <th> Phone </th>
                    <td><?php echo $singleResult['phone']; ?></td>
                </tr>
                <tr>
                    <th> Hear From </th>
                    <td><?php echo $singleResult['heard']; ?></td>
                </tr>
                <tr>
                    <th> Contact </th>
                    <td><?php echo $singleResult['contact']; ?></td>
                </tr>
                <tr>
                    <th> Comments </th>
                    <td><?php echo $singleResult['comments']; ?></td>
                </tr>   
            </thead>
        </table>
    </body>
</html>
