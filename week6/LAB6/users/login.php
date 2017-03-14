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
        <title>Login</title>
    </head>
    <body background="../access/uploads/subtle.png">
        <?php
        session_start();
        include './functions/dbconnect.php';
        include './functions/users.php'; 
        include './functions/util.php'; 
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'pass');
        $errors = array();
        if( isPostRequest() ){ 
            if (empty($email)) {
                $errors[] = 'Email is blank';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Check your email";
            }
            if (empty($password)) {
                $errors[] = 'Password cannot be empty';
            }
            if (count($errors) === 0) {
            $result = login($email, $password);
            
            if ($result != 0) {
                $_SESSION['userid'] = $result;
                header('Location: ../access/admin.php');    
                } else {
                    $errors[] = 'Could not log in.';
                }
            }         
        }        
        ?>
        
        <h2><a href='../cart/main.php?'>View Store</a></h2>
        <h1> Login </h1>
        
    <?php include './templates/error-messages.html.php'; ?>
    <?php include './templates/users-form.html.php'; ?>
        
    </body>
</html>

  