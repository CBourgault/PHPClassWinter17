<html>
    <head>




    </head>
    <body>

        <?php
        require './functions/dbconnect.php';
        require './functions/util.php';

        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM sites ORDER BY site DESC");
        $sites = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $site_id = '';
        if (isPostRequest()) {


            $stmt = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
            $site_id = filter_input(INPUT_POST, 'site_id');
            $binds = array(
                ":site_id" => $site_id
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $error = 'No Results found';
            }
        }
        ?>
        <?php include './header.html.php'; ?>
        
        <form style="padding-left: 30px;" method="post" action="#">
            <label>Look-up:</label><br>

            <select style="width: 400px; height: 26px; font-size:18px;" name="site_id">
                <?php foreach ($sites as $row): ?>
                    <option style="font-size:18px;"
                        value="<?php echo $row['site_id']; ?>"
                        <?php if (intval($site_id) === $row['site_id']) : ?>
                            selected="selected"
                        <?php endif; ?>
                        >
                            <?php echo $row['site']; ?>
                        
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Results" style="background-color: #4CAF50; color: white; font-size: 18px; padding: 6px 20px;"/>
        </form>
        
         <?php if (isset($results) && count($results) > 0): ?>
        <?php $result = viewOneFromSites( $site_id )
        ?>
         
         <table border="3px">
            <thead style="background-color:#4CAF50; color: white;">
                <tr>
                    <th> Web Site</th>
                    <th> Date Added</th>
                </tr>
            </thead>
               
                <tr>
                    <td><?php echo $result['site']; ?></td>    
                    <td><?php echo date("m/d/Y",strtotime($result['date'])); ?></td>                                                              
                </tr>

        </table>

        <br><hr>

        
            <h3 style="padding-left: 30px;"><?php echo count($results); ?> Results found:</h3>
            <table>        
                <tbody>
                    <ol>
                    <?php foreach ($results as $row):?>                                              
                            <li><a href="<?php echo $row['link'];?>"target="popup" style="font-size:18px;"><?php echo $row['link'];?></a></li>                                                                                   
                    <?php endforeach; ?>
                    </ol>
                </tbody>
            </table>

        <?php elseif (isset($results) && count($row) == 0): ?>                   
                    <h3>No Data Curled From Site</h3>
                    
         <?php else: ?>
                     <h3>Search a Web Site</h3>
        <?php endif; ?><br>

    </body>  
</html>