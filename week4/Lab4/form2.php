<form action="#" method="GET">
    <fieldset>
        <legend>Search</legend>


        <select name="searchColumn" >

            <option value="id" <?php if ($searchColumn == "id"): ?>  
                    selected="selected"
                    <?php endif; ?>>ID
            </option>

            <option value="corp" <?php if ($searchColumn == "corp"): ?> selected = "selected"  <?php endif; ?>>Corporation           
            </option>

            <option value="incorp_dt" <?php if ($searchColumn == "incorp_dt"): ?> selected = "selected"  <?php endif; ?>>Inc. Date           
            </option>

            <option value="email" <?php if ($searchColumn == "email"): ?> selected = "selected"  <?php endif; ?>>Email           
            </option>

            <option value="zipcode" <?php if ($searchColumn == "zipcode"): ?> selected = "selected"  <?php endif; ?>>Zip code           
            </option>

            <option value="owner" <?php if ($searchColumn == "owner"): ?> selected = "selected"  <?php endif; ?>>Owner           
            </option>

            <option value="phone" <?php if ($searchColumn == "phone"): ?> selected = "selected"  <?php endif; ?>>Phone           
            </option>

        </select>
        <input name="search" type="search" placeholder="Search...." />

        <input type="hidden" name = "action" value="search"/>
        <input type="submit" value="Submit"/>   
        <input type="reset" value="Reset"/>

    </fieldset>            
</form> 
