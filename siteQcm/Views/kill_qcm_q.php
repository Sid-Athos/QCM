<?php
    if(!empty($res)){
        ?>
Choisissez une question à modifier :<br>
<?php    
    for($i = 0; $i < count($res);$i++)
    {
        ?>
        <input type="checkbox" name="unlink[]" value="<?php echo $res[$i]['id']?>"> <?= $res[$i]['question']?><br>
        <?php
        }
    
    } else {
        echo "<h3>Il n'existe aucune question pour ce qcm</h3>";
    }
?>