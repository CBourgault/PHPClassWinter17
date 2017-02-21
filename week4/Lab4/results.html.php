
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<?php if (isset($results) && is_array($results) && count($results) > 0): ?>

    <table class = "table table-striped" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Corporation</th>
                <th>Inc. Date</th>
                <th>Email</th>
                <th>Zip code</th>
                <th>Owner</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row):
                //IF results variable is set and returns at least one record, display each result as a column row
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("m/d/Y", strtotime($row['incorp_dt'])); ?></td> 
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td> 
                    <td><?php echo $row['phone']; ?></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No data to display</p>
<?php endif; 

