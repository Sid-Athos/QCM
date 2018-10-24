<div class="row">
    <div class="col-xs-12" style="display:block;margin:auto;margin-top:60px">
        <form method="POST">
        <div class="container-fluid" style="white-space:no-wrap;font-size:20px">
            <center>Veuillez choisir un QCM à passer. <br>N'oubliez pas que tout QCM passé moins d'un mois avant la fin du semestre sera considéré comme non rendu.<br> Vous avez 
            <span style="color:#6D6027;font-weight:600"><i>5 mins</i></span>
            à compter du choix d'un QCM pour le terminer sous peine d'être sanctionné d'un 0. <br>Bon courage :</center>
        </div>
        <br>
        <center>
            <select name="choose_qcm" class="form-control" style="width:250px">
                <?php if(!empty($result)){
                    for($i = 0;$i <count($result); $i++)
                    {

                        ?>
                            <option name="qcm" value="<?php echo $result[$i]['ID'];?>">
                            <?php echo $result[$i]['QCM']; ?>
                            </option>
                        <?php
                    }
                }
                ?>
            </select>
            <br>
            <input type="Submit" class="btn btn-secondary" style="width:250px"
            name="go" value="C'est parti!">
        </center>
        </form>
    </div>
</div>