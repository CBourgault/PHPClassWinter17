
<body background="../access/uploads/subtle.png">
<?php
session_start();
include '../users/functions/dbconnect.php';
include '../users/functions/util.php';
include_once '../access/header.php';
include_once './checkstatus.php';
if (!isLoggedIn()) {
    die('Access not allowed');
}
$category = filter_input(INPUT_POST, 'category');
$errors = array();

if (isPostRequest()) {
    if (empty($category)) {
        $errors[] = "Category Blank";
    }
    if (count($errors) === 0) {
        $confirm = createCategory($category);
        $results = "Category Created";
    } else {
        $errors[] = 'Category NOT Added';
    }
}
?>
<head>
    <title>Add Category</title>
</head>
<h1><a href='view-all-categories.php'>Categories</a></h1> 
<?php if (isset($results)) : ?>
    <h2> <?php echo $results; ?></h2>
    <h3> <?php echo "$category has been added"; ?></h3>
<?php endif; ?>
<?php include '../users/templates/error-messages.html.php'; ?>

<form class="form-inline" method="post" action="#">   
    <div class="form-group">
        <label for="category"> Category</label>
        <input type="text" class ="form-control" value="" name="category" placeholder="Computers"/>
    </div>         

    <input type="hidden" value="<?php echo $category_id; ?>" name="category_id" /> 

    <button type="submit" class="btn btn-default"> Create </button>
</form>
</body>




