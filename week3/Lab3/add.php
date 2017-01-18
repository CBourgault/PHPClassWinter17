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

        $results = '';

        if (isPostRequest()) {

            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            $confirm = createCorpData($corp, $email, $zipcode, $owner, $phone);

            //Check this below
            if ($confirm === true) {
                $results = 'Corporation Added';
            } else {
                $results = 'Corportation NOT Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Corporation Name: <input type="text" value="" name="corp" />
            <br />
            Email Address: <input type="text" value="" name="email" />
            <br />
            Zip code: <input type="text" value="" name="zipcode" />
            <br />
            Owner: <input type="text" value="" name="owner" />
            <br />
            Phone Number: <input type="text" value="" name="phone" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
