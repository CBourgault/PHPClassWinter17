<?php

/**
 * A method to create an SQL SELECT which pulls all data from products table.
 *    
 * @return Array
 */
function viewAllProducts()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM products");
    
    $items = array();
        if 
            // Function used to pull all records from Table
            ($stmt->execute() && $stmt->rowCount() > 0) {
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $items;
} 

/**
 * A method to create an SQL SELECT which pulls all data from categories table.
 *    
 * @return Array
 */
function viewAllCategories()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories ORDER BY category_id ASC");
    
    $results = array();
        if 
            // Function used to pull all records from Table
            ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $results;
} 

/**
 * A method to create an SQL SELECT which pulls all data from categories table using category_id and inserts each item into cart array if category_id array is equal to category_id variable.
 *    
 * @return Array
 */
function getItemsByCategory($category_id) {
    $items = viewAllProducts();
    $cart = [];
    foreach ($items as $product) {
      if ( $product['category_id'] == $category_id ) {
        $cart[] = $product;        
      }
    }    
    return $cart;
}

// Clears session 'cart'
function emptyCart() {
    unset($_SESSION['cart']);
}

// If no cart session is already set, creates a cart session
function startCart() {
    if ( !isset($_SESSION['cart']) ) {
      $_SESSION['cart'] = array();
    }
}

// Returns cart session that exists
function getCart() {    
    return $_SESSION['cart']; 
}

// counts array and returns int value
function cartCount() {
    return count(getCart());
}

// function to add to cart from products table where product_id is equal to product_id
function addToCart($product_id) {
    $items = viewAllProducts();
// DO a query search
    foreach ($items as $product) {
      if ( $product['product_id'] == $product_id ) {
        $_SESSION['cart'][] = $product;
        break;
      }
    }         
}

// Function that calls the cart array and accumulates price using total variable from product array price.
function getCartTotal(){
    $items = getCart();
    $total = 0;
    foreach ($items as $product) {      
        $total += $product['price'];
    }   
    return $total;
}
