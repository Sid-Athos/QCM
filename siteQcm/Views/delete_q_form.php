<div class="row">
    <div class="col-xs-12" style="position:relative;margin:auto;margin-top:100px;text-align:center">
        <form method="POST">
        Questions :
            <ul>
            <?php
                if(!empty($res)){
                    $compteur = 0;
                    for($i = 0; $i < count($res);$i++)
                    {
                        ?>
                            <li>
                                <input type="text" class="form-control" readonly
                                style="width:50px;display:inline" name="question[]" 
                                value="<?php echo $res[$i]['id']; ?>">
                                <span><?php echo $res[$i]['question']; ?></span>
                                <input type="checkbox" name="kill[]" value="<?php echo $res[$i]['id'];?>"> Supprimer la question</input>
                            </li>
                            
                        <?php
                        $compteur++;
                    }
                }
            ?>
            </ul>
            <input type="checkbox" name="check" value="yes"> Confirmez la suppression </input><br>
            <input type="submit" class="btn btn-secondary" 
            name="kill_q" value="Supprimer les questions">
        </form>
        <a href="./index.php?page=lobby">Retour accueil enseignant</a>
    </div>
</div>
