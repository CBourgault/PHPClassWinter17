<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Corporation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <h1><a href="view-action.php?id=<?php echo $row['id']; ?>">Home Page</a></h1>
        
        <?php
        include './dbconnect.php';
        include './functions.php';        
        
        $results = '';

        if (isPostRequest()) {

            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            $confirm = createCorpData($corp, $email, $zipcode, $owner, $phone);

            //Check this below
            
                if ( empty ($corp || $email || $zipcode || $owner || $phone) )
            {
                $confirm = false;
            }
            if ($confirm === true )
            {
            $results = 'Corportation Added';
            } else 
                {
                // Still creates a database entry...
                $results = 'Corportation NOT Added';               
                }                                                         
        }
        ?>


        <h1><?php echo $results; ?></h1>

      <form class="form-inline" method="post" action="#">   
            <div class="form-group">
                <label for="corp"> Corporation</label>
            <input type="text" class ="form-control" value="" name="corp" placeholder="Example Inc"/>
            </div>
            <br>          
            
            <div class="form-group">
                <label for="email"> Email Address</label>
            <input type="text" class ="form-control" value="" name="email" placeholder="Example@gmail.com"/>
            </div>
            <br>
           
            <div class="form-group">
                <label for="zipcode"> Zip Code</label>
            <input type="text" class ="form-control" value="" name="zipcode" placeholder="00000"/>
            </div>
            <br>
                       
            <div class="form-group">
                <label for="owner"> Owner</label>
            <input type="text" class ="form-control" value="" name="owner" placeholder="John Smith"/>
            </div>
            <br>
            
            <div class="form-group">
                <label for="phone"> Phone Number</label>
            <input type="text" class ="form-control" value="" name="phone" placeholder="### ### ####"/>
            </div>
            <br>
            
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="hidden" value="<?php echo $incorp_dt; ?>" name="incorp_dt" /> 
            <button type="submit" class="btn btn-default"> Update </button>
        </form>
    </body>
</html>
