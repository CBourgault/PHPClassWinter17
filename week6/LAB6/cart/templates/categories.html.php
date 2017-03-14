<?php if ( isset($allCategories) && is_array($allCategories)) : ?>
<ul> 
    <li><a href="?">All</a> </li>    
    <?php foreach ($allCategories as $category): ?>
        <li>
            <a href="?category_id=<?php echo $category['category_id']; ?>">
                <?php echo $category['category']; ?>
            </a>
        </li>    
    <?php endforeach; ?> 
</ul>
<?php endif;
// USE TEMPLATE FOR ITEMS ALSO?>
