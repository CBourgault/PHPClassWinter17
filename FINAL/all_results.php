
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>All Results</title>
    </head>
    <body>
        <?php
        include './functions/dbconnect.php';
        include './functions/functions.php';
        $results = viewAllFromAccount();
        ?>
        <h1><a href="Webform.php">Add to Mailing List</a></h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Heard</th>
                    <th>Contact</th>
                    <th>Comments</th>
                </tr>
            </thead>
        <?php
foreach ($results as $rows):
    // Shows a new row for every piece of array of data found in table
    ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['email']; ?></td>           
                    <td><?php echo $rows['phone']; ?></td>           
                    <td><?php echo $rows['heard']; ?></td>           
                    <td><?php echo $rows['contact']; ?></td>           
                    <td><?php echo $rows['comments']; ?></td>   
                    <td><a href="read.php?id=<?php echo $rows['id']; ?>">Read</a></td> 
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
