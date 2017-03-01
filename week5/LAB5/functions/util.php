<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

/**
 * A method to curl a url and return the html.
 *    
 * @return string
 */
function getPageContent($url) {
    //Create curl resource
    $curl = curl_init();
    // set url 
    curl_setopt($curl, CURLOPT_URL, $url);
    //return the transfer as a string 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // $output contains the output string 
    $output = curl_exec($curl);
    // close curl resource to free up system resources 
    curl_close($curl);
    return $output;
}

/**
 * A method to collect all the links from a html string.
 *    
 * @return Array
 */
function getLinkMatches($html) {
    $linkRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';

    preg_match_all($linkRegex, $html, $linkMatches);
    $removeDuplicateLinks = array_unique($linkMatches[0]);

    return $removeDuplicateLinks;
}
/**
 * A method to create an SQL INSERT which links sites table and sitelinks table using site_id.
 *    
 * @return Boolean
 */
function saveSiteData($site, $siteLinks) {
    // By default, boolean set to false
    $result = false;
    //Calls datebase to be used
    $db = dbconnect();
    //Prepare statement to insert into site column with key of site
    $stmt = $db->prepare('INSERT INTO sites SET date = now(), site = :site');
    // Binds an array of site key to site variable
    $binds = array(":site" => $site);
    // If statement to see if one or more binds executed
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        //Sets site_id to the next avaiable insertID
        $site_id = $db->lastInsertId();
        //Prepare statement to insert into sitelinks with primary key as site_id and all curled links under foreign key link
        $stmt = $db->prepare('INSERT INTO sitelinks SET site_id = :site_id, link = :link');
        //Foreach statement, each Sitelink referenced as link 
        foreach ($siteLinks as $link) {
            //Binds an array of site_id and link
            $binds = array("site_id" => $site_id, ":link" => $link);
            //Executes the binds array
            $stmt->execute($binds);
        }
        //If Binds array executes, returns true boolean
        $result = true;
    }
    //Returns the result
    return $result;
}
/**
 * A method to query the SQL datebase to see if a site record already exists
 *    
 * @return Boolean
 */
function urlExists($site) {
    //Boolean set to false by default
    $results = false;
    //Calls the database to be used
    $db = dbconnect();
    //Prepare statement to select all from sites table where site column is equal to site key
    $stmt = $db->prepare("SELECT * FROM sites WHERE site = :site");
    //Calls binds variable as an array, binds site key to site variable
    $binds = array
        (
        ":site" => $site,
    );
    // If statement executes and returns one or more rows, the boolean is set to true
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    //Returns the results
    return $results;
}

function viewOneFromSites($site_id) {
    //Calls the database to be used
    $db = dbconnect();
    //Prepare statement to select all from sites table where column site_id is equal to primary key site_id
    $stmt = $db->prepare("SELECT * FROM sites where site_id = :site_id");
    //Calls binds variable as an array binds site_id primary key to site_id variable
    $binds = array("site_id" => $site_id);
    //Deisplays results as an array
    $results = array();
    // If statement which if the binds executes and returns one or more records rows from array
    if
    // function used to pull one particular record from table
    ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Returns the associated results from the array if possible
    return $results;
}
