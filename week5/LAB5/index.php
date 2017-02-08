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
            include './functions/dbconnect.php';
            include './functions/util.php';
            
            $site = filter_input (INPUT_POST, 'site');
            $error = array();
            
            if (isPostRequest())
        {
            
            if ( filter_var ($site, FILTER_VALIDATE_URL) === false )
            {
                $errors[] = 'Site URL is not valid';
            }
        
            if (count($errors) === 0) {
            //save data
            }
        }
        ?>
        
        <?php include './templates/error-messages.php'; ?>
        
        <form action='#' method="post">
            
        Site: <input type ="text" name="site" value="<?php echo $site;?>" />      
        <br />
        <input type ="submit" value="Submit" />
          
        </form>
        
    </body>
</html>
