    <div class="row">
        <div class="col-xs-12" 
        style="position:relative;margin:auto;margin-top:100px;text-align:center">
            <form method="POST">
            <?php
                if(isset($res))
                {
                    for($i = 0;$i < count($res);$i++)
                    {
                        ?>
                            <input type="text" name="question[]" class="form-control" style="display:inline"
                            pattern="^[0-9A-Za-z' \(\)\/+]{1,}[?!.]{0,}" 
                            value="<?php echo  $res[$i]['reponse'];?>" readonly>
                            <input type="radio" name="<?= $i ?>" value="<?php echo $res[$i]['id'];?>"
                            style="display:inline">Supprimer la réponse</input><br>
                        <?php
                    }
                }
            ?>
            <input type="submit" name="kill_a" 
            class="btn btn-secondary" value="Supprimer"
            style="width:350px">
            </form>
            <a href="./index.php?page=lobby">Retour accueil enseignant</a>
        </div>
    </div>
</body>
