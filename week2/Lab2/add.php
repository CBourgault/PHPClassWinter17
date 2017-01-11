<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        include './crud.php';

        $results = '';

        if (isPostRequest()) 
            {
            
            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');
            $confirm = createLabData($firstname, $lastname, $dob, $height);
            
            
             if ( empty ($firstname) )
            {
                $confirm = false;
            }
            if ($confirm === true )
            {
            $results = 'Data Added';
            } else 
                {
                $results = 'Data NOT Added';
                }
            
        }
        ?>


        <h1> Actor Database </h1>
        <p>
        <a href="add.php">Add Page</a> 
        <a href="view.php">View Page</a> 
        </p>
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name: <input type="text" value="" name="firstname" />
            <br />
            Last Name: <input type="text" value="" name="lastname" />
            <br />
            Date of birth: <input type="date" value="" name="dob" />
            <br />
            Height: <input type="text" value="" name="height" />
            <br />
            <input class="btn btn-primary" type="submit" value="Submit" />
        </form>
    </body>
</html>
