<?php
    if(!empty($res)){
        ?>
Choisissez une question à modifier :<br>
<select id="check" class="form-control" name="question"> 
<?php    
    for($i = 0; $i < count($res);$i++)
    {
        ?>
        <option value="<?php echo $res[$i]['id']?>"><?= $res[$i]['question']?></option>
        <?php
        }
        ?>
        </select>
        <?php
    } else {
        $message ="<h1>Il n'existe aucune question pour ce qcm</h1>";
    }
?>