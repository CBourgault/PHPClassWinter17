<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
            
           $results = getAllTestData();
           $column = 'datatwo';           
           $dataone = filter_input(INPUT_POST, 'dataone');
           $datatwo = filter_input(INPUT_POST, 'datatwo');
           $action = filter_input(INPUT_POST, 'action');
           
           
           if ( $action === 'Submit1' ) {  
           }
           
           if ( $action === 'Submit2' ) {
              $results = searchTest($column, $dataone);
               
           }       
           
           
        ?>
    

        <?php include './includes/form1.php';   ?>
        <?php include './includes/form2.php';   ?>
        <p>Showing <?php echo count($results); ?>
        <?php include './includes/show-test-results.html.php'; ?>
       
           
    </body>
</html>
