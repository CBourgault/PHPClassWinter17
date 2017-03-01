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

        $site = filter_input(INPUT_POST, 'site');
        $checkURL = urlExists($site);
        $errors = array();
        

        if (isPostRequest()) {

            if (filter_var($site, FILTER_VALIDATE_URL) === false) {
                $errors[] = 'Site URL is not valid';
            }

            if ($checkURL === true) {
                $errors[] = 'Site already exists';
            }

            if (count($errors) === 0) {

                $html = getPageContent($site);

                if (!empty($html)) {

                    $sitelinks = getLinkMatches($html);
                    $linkList = saveSiteData($site, $sitelinks);                   

                    if ($linkList === true) {
                        $result = 'Operation Success!';
                        $displaySite = $site;
                        //$linking = postSiteLinks($site_id, $postLinks);
                        
                    } else {
                        $errors[] = 'Operation Failure';
                    }
                    //save data
                }
            }
        }
        ?>
        <?php if (isset($result)) : ?>
            <h2> <?php echo $result; ?></h2>
            <h3> <?php echo "$displaySite has been added"; ?></h3>
            <h4> <?php echo count($sitelinks); ?> Results found:</h4>
                <ol>
                <?php foreach ($sitelinks as $row): ?>           
                   <?php echo "<li>".$row."</li>"; ?>
                <?php endforeach; ?>
                </ol> 
        <?php endif; ?>

<?php include './header.html.php'; ?>
<?php include './templates/error-messages.php'; ?>

        <form action='#' method="post">

            <h2> Site: <input type ="text" name="site" value="<?php echo $site; ?>" style="font-size:20px;"/>                 
            <input type="submit" value="Submit" style="background-color: #4CAF50; color: white; font-size: 14px; padding: 6px 20px;"/></h2>

        </form>

    </body>
</html>
