<form action="#" method="post">
    <fieldset>
        <legend>Form 1</legend>
        
        <label>ASC</label>  
        <input type="radio" name="order" value="ASC" 
        <?php if ($order === "ASC"): ?>
            checked="checked"
        <?php endif; ?>
               />
        <label></label>
        <input type="radio" name="order" value="DESC" 
        <?php if ($order === "DESC"): ?>
            checked="checked"
        <?php endif; ?>
               />

        <label>DESC</label>  
        <select name="column">
            
            <option value="dataone" <?php if ($column === "dataone"): ?> selected = "selected"  <?php endif; ?>>Data One

            </option>
            
            <option value="datatwo" <?php if ($column === "datatwo"): ?> selected = "selected"  <?php endif; ?>>Data Two
            
            </option>
        </select>
        <input type="hidden" name="action" value="Submit1" />
        <input type="submit" value="Submit1" 
               
               
               />
        
        
    </fieldset>    
</form>
