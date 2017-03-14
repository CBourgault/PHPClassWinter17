
<h1><a href='main.php'>Go Back</a></h1> 
<h1>Your Shopping Cart</h1>
<?php if ( count($cart) > 0): ?>
    <table class=" table-hover" border="5">
      <thead>
        <tr>
          <th>Item Description</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
            <td>
                <strong>Total:</strong>
            </td>
            <td>
                <strong>$<?php echo number_format($total, 2); ?></strong>
            </td>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($cart as $item): ?>
          <tr>
            <td>
                <?php echo htmlspecialchars($item['product'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            <td>
              $<?php echo number_format($item['price'], 2); ?>
            </td>
            <td>
            <?php if(!empty($item['image'])): ?>
                <img src="<?php echo '../access/uploads/' . $item['image']; ?>" width="100px"/>
                <?php else: ?>
                <img src="../access/default-image/default_product.jpg" width="100px"/>
                <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
           <tr>
            <td></td>
            <td></td>
          </tr>
      </tbody>
    </table>
<?php else: ?>
    <p>Your cart is empty!</p>
<?php endif; ?>