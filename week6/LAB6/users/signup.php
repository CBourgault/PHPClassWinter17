<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        include './functions/dbconnect.php'; 
        include './functions/util.php';
        include './functions/users.php';
        $email = filter_input(INPUT_POST, 'email');
        
        if ( isPostRequest() ) {            
            $password = filter_input(INPUT_POST, 'pass');
            //Gets user input to variables via POST
            //Validation!!!
            
            $userExist = userExist($email);
            $errors = [];
            
            if ( $userExist ) {
                $errors[] = 'Email Already Exists.';
            }
            if ( empty ($password)) {
                $errors[] = 'Password cannot be empty';
            }
            
            //Sends to function
            
            if (count($errors) ===0 ){
                $result = signup($email,$password);           
            
            if ( $result === true ) {
                header('Location: login.php?email='.$email);
            } else {
                $errors[] = 'Could not sign up.';
            }    
        }
    }

        
        ?>
        
        <h1> Sign Up </h1>
        
        <?php include './templates/error-messages.html.php'; ?>
        <?php include './templates/users-form.html.php'; ?>
        
    </body>
</html>
