<h1>Catalog</h1>
<table class="table-hover" border="5">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($items as $item): ?>
        <tr>
          <td><?php echo htmlspecialchars($item['product'], ENT_QUOTES, 'UTF-8'); ?></td>
          
          <td>
            $<?php echo number_format($item['price'], 2); ?>
          </td>
          <td>
            <?php if(!empty($item['image'])): ?>
                <img src="<?php echo '../access/uploads/'.$item['image']; ?>" width="100px"/>
                <?php else: ?>
                    <img src="../access/default-image/default_product.jpg" width="100px"/>
            <?php endif; ?>           
          </td>
          <td>
            <form action="" method="post">
              <div style="border: 1px solid black" >
                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                <input type="submit" name="action" value="Buy" class="btn btn-default btn-lg btn-block">
              </div>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
</table>
