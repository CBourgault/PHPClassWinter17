<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Corporation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>    
    <body>
        
        <h1><a href="view-action.php?id=<?php echo $row['id']; ?>">Home Page</a></h1>
        
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
                // Tells the user whether record was updated or not
                
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
        
        <form class="form-inline" method="post" action="#">   
            <div class="form-group">
                <label for="corp"> Corporation</label>
            <input type="text" class ="form-control" value="<?php echo $corp; ?>" name="corp" />
            </div>
            <br>           
            
            <div class="form-group">
                <label for="email"> Email Address</label>
            <input type="text" class ="form-control" value="<?php echo $email; ?>" name="email" />
            </div>
            <br>
           
            <div class="form-group">
                <label for="zipcode"> Zip Code</label>
            <input type="text" class ="form-control" value="<?php echo $zipcode; ?>" name="zipcode" />
            </div>
            <br>
                       
            <div class="form-group">
                <label for="owner"> Owner</label>
            <input type="text" class ="form-control" value="<?php echo $owner; ?>" name="owner" />
            </div>
            <br>
            
            <div class="form-group">
                <label for="phone"> Phone Number</label>
            <input type="text" class ="form-control" value="<?php echo $phone;
            
            // Bootstrap form used to add organization and visual appeal
            
            ?>" name="phone" />
            </div>
            <br>
            
            
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="hidden" value="<?php echo $incorp_dt; ?>" name="incorp_dt" /> 
            <button type="submit" class="btn btn-primary"> Update </button>
        </form>
              
    </body>
</html>
