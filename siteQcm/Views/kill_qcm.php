    <div class="row">
        <div class="col-xs-12" style="position:relative;margin:auto;margin-top:10px;text-align:center">
            <form method="POST">
                <p style="color:#333333;font-size:18px">Sélectionnez un QCM à supprimer :</p>
                <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                <?php
                    if(!empty($results)){
                        for($i = 0; $i < count($results);$i++)
                        {
                            ?>
                                <li class="list-group-item">
                                    <p style="color:#6D6027;font-size:19px;font-weight:550">
                                    <?php echo $results[$i]['nom']; ?></p>
                                    <input type="checkbox" style="font-size:15px" name="qcm_kill[]" value="<?php echo $results[$i]['id'];?>"> Supprimer le QCM
                                </li>
                                
                            <?php
                        }
                    }
                ?>
                                <li class="list-group-item">
                <input type="checkbox" name="check" value="yes"> Confirmez la suppression </input></li>
                </ul>
                </div>
                <input type="submit" class="btn btn-secondary" name="kill_qcm" value="Supprimer les QCM">
            </form>
            <a href="./index.php?page=lobby">Retour accueil enseignant</a>
        </div>
    </div>
</body>

</html>