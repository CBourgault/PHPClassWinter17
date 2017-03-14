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
 * A method to create an SQL SELECT which pulls all data from categories table.
 *    
 * @return Array
 */
function viewAllCategories()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories");
    
    $results = array();
        if 
            // Function used to pull all records from Table
            ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $results;
} 

/**
 * A method to create an SQL SELECT which pulls all data from categories table using a specific category_id.
 *    
 * @return Array
 */
function viewOneCategory( $category_id )
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories where category_id = :category_id");
    
    $binds = array ( "category_id" => $category_id);
    
    $results = array();
    
        if 
            // function used to pull one particular record from table
            ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    return $results;
}

/**
 * A method to create an SQL UPDATE which sets category using category_id in categories table.
 *    
 * @return Boolean
 */
function updateCategoryRow($category_id, $category)
{
    $result = false;
    
    $db = dbconnect();
        
    $stmt = $db->prepare("UPDATE categories set category = :category where category_id = :category_id");
    
    $binds = array(
        // Used to replace all array information of one particular ID
            ":category_id" => $category_id,
            ":category" => $category
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            // If executed properly, results in success
           $result = true;
        }

        return $result;
}

/**
 * A method to create an SQL DELETE query which deletes category_id from categories table.
 *    
 * @return Boolean
 */
function deleteCategory( $category_id )
{
    $isDeleted = false;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("DELETE FROM categories where category_id = :category_id");
    
    $binds = array ( ":category_id" => $category_id );
    
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        // if entire array of data is deleted from that id, outputs success 
        {
            $isDeleted = true;
        }

    return $isDeleted; 
}

/**
 * A method to create an SQL INSERT which inserts category into categories table.
 *    
 * @return Boolean
 */
function createCategory($category)
{
    $results = false;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO categories SET category = :category");
    
    $binds = array(
        // Used to place new array information under a new ID in Categories table
                ":category" => $category,
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $results = true;
            }
            
    return $results;   
}

/**
 * A method to create an SQL SELECT which pulls all data from products table and JOINS categories table where category_id is equal to category_id.
 *    
 * @return Array
 */
function viewAllProducts()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM products JOIN categories WHERE products.category_id = categories.category_id");
    
    $results = array();
        if 
            // Function used to pull all records from Table
            ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $results;
} 

/**
 * A method to create an SQL INSERT which inserts into products table category_id, product_id, price, and image.
 *    
 * @return Boolean
 */
function createProduct($category_id, $product, $price, $image)
{
    $productResults = false;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image");
    
    $binds = array(
        // Used to place new array information under a new ID in Corps table
                ":category_id" => $category_id,
                ":product" => $product,
                ":price" => $price,
                ":image" => $image
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $productResults = true;
            }
            
    return $productResults;
    
}

/**
 * A method to create an SQL INSERT which pulls all data from products table using a specific product_id.
 *    
 * @return Array
 */
function viewOneProduct( $product_id )
{
    $db = dbconnect();
   
    $stmt = $db->prepare("SELECT * FROM products where product_id = :product_id");

    $binds = array ( "product_id" => $product_id);
    
    $singleResult = array();
    
        if 
            // function used to pull one particular record from table
            ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $singleResult = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    return $singleResult;
}

/**
 * A method to create an SQL UPDATE which sets category_id, product, price, and image using product_id in the products table.
 *    
 * @return Boolean
 */
function updateProductData($product_id, $category_id, $product, $price, $image)
{
    $updateResult = false;
    
    $db = dbconnect();
        
    $stmt = $db->prepare("UPDATE products set category_id = :category_id, product = :product, price = :price, image = :image where product_id = :product_id");
    
    $binds = array(
        // Used to replace all array information of one particular ID
            ":product_id" => $product_id,
            ":category_id" => $category_id,
            ":product" => $product,
            ":price" => $price,
            ":image" => $image
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            // If executed properly, results in success
           $updateResult = true;
        }

        return $updateResult;
}

/**
 * A method to create an SQL DELETE which deletes product_id from products table.
 *    
 * @return Boolean
 */
function deleteProduct( $product_id )
{
    $isDeleted = false;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("DELETE FROM products where product_id = :product_id");
    
    $binds = array ( ":product_id" => $product_id );
    
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        // if entire array of data is deleted from that id, outputs success 
        {
            $isDeleted = true;
        }

    return $isDeleted; 
}

// Parses a field name and inserts into uploads folder then creates a new uploaded file called filename.
function uploadImage($fieldName){
       
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if ( !isset($_FILES[$fieldName]['error']) || is_array($_FILES[$fieldName]['error']) ) {       
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES[$fieldName]['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
     
    // You should also check filesize here. 
    if ($_FILES[$fieldName]['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $validExts = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                );    
    $ext = array_search( $finfo->file($_FILES[$fieldName]['tmp_name']), $validExts, true );
    
    
    if ( false === $ext ) {
        throw new RuntimeException('Invalid file format.');
    }
    
     /* Alternative to getting file extention 
    $name = $_FILES["upfile"]["name"];
    $ext = strtolower(end((explode(".", $name))));
    if (preg_match("/^(jpeg|jpg|png|gif)$/", $ext) == false) {
        throw new RuntimeException('Invalid file format.');
    }
     Alternative END */

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    
    $fileName =  sha1_file($_FILES[$fieldName]['tmp_name']); 
    $location = sprintf('./uploads/%s.%s', $fileName, $ext); 
    
    if (!is_dir('./uploads')) {
        mkdir('./uploads');
    }
        
    if ( !move_uploaded_file( $_FILES[$fieldName]['tmp_name'], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    /* return the file name uploaded */
    return $fileName.'.'.$ext;
}
