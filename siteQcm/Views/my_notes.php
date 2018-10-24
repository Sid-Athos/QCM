<div class="row">
    <div class="col-xs-12" style="position:relative;margin:auto;margin-top:100px">
    <center><h4 style="color:#decba4">Tableau récapitulatif de vos notes :</h4></center>
        <?php
            if(!empty($res)){
        ?>
            <table class="table" style="width:650px;border:0.5px solid #decba4;background-color:#FFFFFF;border-radius:5px">
            <thead style="border-radius:5px">
                <tr style="border-radius:5px">
                <th style="width:250px">QCM</th>
                <th>Matière</th>
                <th>Chapitre</th>
                <th>Note</th>
                <th style="border-radius:5px">Date de passage</th>
                </tr>
            </thead>
            <tbody style="border-radius:5px">
        <?php
            for($i = 0;$i < count($res);$i++){
                ?>
                    <tr>
                    <th><?php echo $res[$i]['QCM']; ?></th>
                    <td><?php echo $res[$i]['nom']; ?></td>
                    <td><?php echo $res[$i]['titre']; ?></td>
                    <td><?php echo $res[$i]['note']; ?></td>
                    <td style="border-radius:5px"><?php echo $res[$i]['dtPassage']; ?></td>
                    </tr>
            <?php
            }?>
            </tbody>
            </table>
            <?php
        } else {
            echo "Vous n'avez pas encore passer de qcm!";
        }
        ?>
    </div>
</div>