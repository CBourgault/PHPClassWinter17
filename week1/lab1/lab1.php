<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <table border="1">
        
        <?php for($tr = 1; $tr <= 10; $tr++):?>
            <tr> 
            <?php for($td = 1; $td <= 10; $td++): /* these are the dimensions of the table */?>
                <?php
                $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); 
                /* this is the random color generator */
                 ?>
                <td style="background-color: <?php echo $randColor; ?>"> 
                    <?php echo $randColor; 
                    /* this sets the random color to the background */?>
                <span style="color:#ffffff "> 
    <?php echo $randColor; /* this sets a second copy of the random hex number to white */
                    ?> </span>
                </td>
                
            <?php endfor; /* ends the for loop */ ?>                
            </tr>
        <?php endfor; ?>
        </table>
        
    </body>
</html>

