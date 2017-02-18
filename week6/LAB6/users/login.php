<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        include './functions/dbconnect.php';
        include './functions/users.php'; 
        include './functions/util.php'; 
        $email = filter_input(INPUT_POST, 'email');
        $emailGET = filter_input(INPUT_GET, 'email');
        if(!is_null($emailGET)){
            $email = $emailGET;
        }
        
        if( isPostRequest() ){           
            $password = filter_input(INPUT_POST, 'pass');
            
            $result = login($email, $password);
            
            if ( $result != 0 ){
                $_SESSION['userid'] = $result;
                
                 header('Location: ../access/admin.php');
            }   else {
                echo 'incorrect passcode';
            }
            
        }
        
        ?>
        
        <h1> Login </h1>
        
        <?php include './templates/users-form.html.php'; ?>
        
    </body>
</html>
