<div class="row">
    <div class="col-xs-12" style="display:block;margin:auto;margin-top:60px">
        <form method="POST">
        <div class="container-fluid" style="white-space:no-wrap">
            <center>Veuillez choisir un QCM à passer. <br>N'oubliez pas que tout QCM passé moins d'un mois avant la fin du semestre sera considéré comme non rendu.<br> Bon courage :</center>
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