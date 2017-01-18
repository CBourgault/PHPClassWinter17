<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Corporation</title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            
            $result = '';
            if (isPostRequest()) {
                // Updates Record if possible
                
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');                                                
                
                
                $updated = updateCorpsRow($id, $corp, $email, $zipcode, $owner, $phone);
                if ( $updated )
                {
                    $result = 'Record updated';
                }
                else 
                {
                    $result = 'Record NOT updated';
                }
                
            } else {
                // Show whats in database already if id is found
                $id = filter_input(INPUT_GET, 'id');
                
                if ( !isset($id) ) {
                    
                    exit('Record not found');
                }
                
                $results = viewOneFromCorps($id);
                $corp = $results['corp'];
                $incorp_dt = $results['incorp_dt'];
                $email = $results['email'];
                $zipcode = $results['zipcode'];
                $owner = $results['owner'];
                $phone = $results['phone'];
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Corporation Name: <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Incorporated Date: <?php echo $incorp_dt; ?>
            <br />  
            Email Address: <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip Code: <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />  
            Owner: <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone Number: <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />  
            
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="hidden" value="<?php echo $incorp_dt; ?>" name="incorp_dt" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
