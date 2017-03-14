<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Create Account</title>
    </head>
    <body background="../access/uploads/subtle.png">
        
        <?php
        session_start();
        include './functions/dbconnect.php';
        include './functions/util.php';
        include './functions/users.php';
        $email = filter_input(INPUT_POST, 'email');
        $userExist = userExist($email);
        $password = filter_input(INPUT_POST, 'pass');
        $errors = array();

        if (isPostRequest()) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email Validation Error";
            }
            if (empty($password)) {
                $errors[] = 'Password cannot be empty';
            }
            if ($userExist == true) {
                $errors[] = 'Email Already Exists.';
            }

            if (count($errors) === 0) {
                $result = signup($email, $password);
                if ($result === true) {
                    header('Location: login.php?email=' . $email);
                } else {
                    $errors[] = 'Could not sign up.';
                }
            }
        }
        ?>
        
        <h2><a href='../cart/main.php?'>View Store</a></h2>
        <h1> Sign Up </h1>        

        <?php include './templates/error-messages.html.php'; ?>
        <?php include './templates/users-form.html.php'; ?>

    </body>
</html>
