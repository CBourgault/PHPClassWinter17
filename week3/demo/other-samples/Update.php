<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $dataone = filter_input(INPUT_POST, 'dataone');
                $datatwo = filter_input(INPUT_POST, 'datatwo');
                      
                $updated = updateTestRow($id, $dataone, $datatwo);
                if ( $updated )
                {
                    $result = 'Record updated';
                }
                else 
                {
                    $result = 'Record NOT updated';
                }
                
            } else {
                $id = filter_input(INPUT_GET, 'id');
                
                if ( !isset($id) ) {
                    exit('Record not found');
                }
                $results = viewOneFromTest($id);
                $dataone = $results['dataone'];
                $datatwo = $results['datatwo'];
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Data one <input type="text" value="<?php echo $dataone; ?>" name="dataone" />
            <br />
            Data two <input type="text" value="<?php echo $datatwo; ?>" name="datatwo" />
            <br />  
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
