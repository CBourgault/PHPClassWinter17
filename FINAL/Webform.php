<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Mailing List</title> 
    </head>
    <body>

        <?php
        //Chace Bourgault FINAL EXAM
        include './functions/dbconnect.php';
        include './functions/functions.php';


        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $heard = filter_input(INPUT_POST, 'heard_from');
        $contact = filter_input(INPUT_POST, 'contact_via');
        $comments = filter_input(INPUT_POST, 'comments');
        $errors = array();

        if (isPostRequest()) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email Validation Error";
            }
            if (empty($phone)) {
                $errors[] = "Phone Validation Error";
            }
            if (!isset($heard)) {
                $errors[] = "Heard From Validation Error";
            }
            if (!isset($contact)) {
                $errors[] = "Contact Validation Error";
            }
            if (empty($comments)) {
                $comments = "EMPTY";
            }
            if (count($errors) === 0) {

                $result = signup($email, $phone, $heard, $contact, $comments);

                $results = "Data Submitted";
                if ($result === true) {
                    ?>                     
                    <h5> <?php echo "$email"; ?></h5>
                    <h5> <?php echo "$phone"; ?></h5>
                    <h5> <?php echo "$heard"; ?></h5>
                    <h5> <?php echo "$contact"; ?></h5>
                    <h5> <?php echo "$comments"; ?></h5>
                    <?php
                } else {
                    $errors[] = 'Could not sign up.';
                }
            }
        }
        ?>
        <h1><a href="all_results.php">All Results</a></h1>
        <?php if (isset($results)) : ?>
            <h2> <?php echo $results; ?></h2>
        <?php endif; ?>

        <?php
        include './templates/error-messages.php';
        include './templates/users-form.php';
        ?>


    </body>
</html>
