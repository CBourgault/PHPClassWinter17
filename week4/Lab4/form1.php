<form action="#" method="GET">
    <fieldset>
        <legend>Order</legend>

        <label>ASC</label>  
        <input type="radio" name="order" value="ASC" 
        <?php if ($order === "ASC"): ?>
                   checked="checked"
               <?php endif; ?>
               />

        <label>DESC</label>
        <input type="radio" name="order" value="DESC" 
        <?php if ($order === "DESC"): ?>
                   checked="checked"
               <?php endif; ?>
               />

        <label></label>  
        <select name="orderColumn">

            <option value="id" <?php if ($orderColumn === "id"): ?> selected = "selected"  <?php endif; ?>>ID
            </option>

            <option value="corp" <?php if ($orderColumn === "corp"): ?> selected = "selected"  <?php endif; ?>>Corporation           
            </option>

            <option value="incorp_dt" <?php if ($orderColumn === "incorp_dt"): ?> selected = "selected"  <?php endif; ?>>Inc. Date           
            </option>

            <option value="email" <?php if ($orderColumn === "email"): ?> selected = "selected"  <?php endif; ?>>Email           
            </option>

            <option value="zipcode" <?php if ($orderColumn === "zipcode"): ?> selected = "selected"  <?php endif; ?>>Zip code           
            </option>

            <option value="owner" <?php if ($orderColumn === "owner"): ?> selected = "selected"  <?php endif; ?>>Owner           
            </option>

            <option value="phone" <?php if ($orderColumn === "phone"): ?> selected = "selected"  <?php endif; ?>>Phone           
            </option>

        </select>


        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Order" />
        <input type="reset" value="Reset" />                 



    </fieldset>    
</form>
