<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
    </head>
    <body>
        <?php
        //Includes neccessary functions
        include_once './dbconnect.php';
        include_once './functions.php';
        //defines variables and uses HTTP GET 
        $results = viewAllFromCorps();
        $orderColumn = filter_input(INPUT_GET, 'orderColumn');
        $searchColumn = filter_input(INPUT_GET, 'searchColumn');
        $action = filter_input(INPUT_GET, 'action');
        $search = filter_input(INPUT_GET, 'search');
        $order = filter_input(INPUT_GET, 'order');
        // IF statement which triggers custom function using defined variables
        if ($action === 'sort') {
            $results = orderCorps($orderColumn, $order);
        }
        // IF statement which triggers custom function using defined variables
        if ($action === 'search') {
            $results = searchCorps($searchColumn, $search);
        }
        ?>

        <?php include './form1.php'; ?>
        <?php include './form2.php'; ?>
        <p>Showing <?php echo count($results); ?>
        <?php include './results.html.php'; ?>       

    </body>
</html>
