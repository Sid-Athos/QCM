<div id="answer"></div>
<div id="txt">
<?php
    if(isset($message)){
        echo $message;
    }
    ?>
</div>
    <div id="time" style="font-weight:800;color:#525252;font-size:24px;position:absolute;right:10px;top:0"></div>
<div class="row">
    <div class="col-xs-12" style="display:block;margin:auto;margin-top:90px;text-align:center">
        <form name="change_answers" action="./index.php?page=lobby" method="POST">
        <?php
        if(!empty($res))
        {   
            $id = $res[0]['ID'];
            $compteur_id = 0;
            $compteur = 0;
            $ans = 1;
            ?>
            <div class="form-group">
            <input type="text" style="width:50px;text-align:center;position:absolute;left:40%" name="qcm" readonly class="form-control"
            value="<?php echo $res[0]['qc_id'];?>"><span>
            QCM <?php echo $res[0]['qc_name'];?></span></div><br>
            <?php
            for($i = 0; $i < count($res);$i++)
            {
                foreach($res[$i] as $key => $value)
                {
                    if($compteur_id == 0)
                    {   
                        if(isset($res[($i+1)])){
                            if($id !== $res[($i+1)]['ID'])
                                    {
                                        $id = $res[$i]['ID'];
                                    }
                        }
                        if($key === "question" && $compteur_id ==0)
                        {
                            ?>
            <div class="form-inline">

                            <label style="font-weight:600"><i>Question : </label>
                            <input type="text" name="question[]" style="width:50px;text-align:center" 
                            class="form-control"
                            readonly value="<?= $res[$i]['ID']?>">
                            <span><?= $value?></span></i>
                            </div>
                            <?php
                        } 
                        if ($key ==='reponse' && $res[$i]['statut'] === 'bonne')
                        {
                            ?>
                        <bold style="font-weight:520">Réponse <?= $ans?> :</bold>
                            <input type="radio" name="<?php echo "question$compteur";?>" value="correct"> <?= $value;?> </input>
                            <?php
                        }
                        else if ($key ==='reponse' && $res[$i]['statut'] === 'fausse')
                        {
                            ?>
                            <bold style="font-weight:520">Réponse <?= $ans?> :</bold>
                            <input type="radio" name="<?php echo "question$compteur";?>" value="false"><?= $value;?></input>
                            <?php
                        }
                        if($key === 'answersAmount')
                        {
                            $ans++;
                            if(isset($res[($i+1)]['ID'])){

                                if($id !== $res[($i+1)]['ID'])
                                {
                                    $id = $res[$i]['ID'];
                                    $compteur_id = 0;
                                    echo "<br>";
                                    $compteur++;
                                } else if($id === $res[($i+1)]['ID']){
                                    $compteur_id++;
                                }
                            } else {
                                $compteur_id++;
                                echo "<br>";
                            }
                        }
                    } else {
                        if($key === 'reponse' && $res[$i]['statut'] === 'fausse')
                        {
                            ?>
                            <bold style="font-weight:520">Réponse <?= $ans?> :</bold>
                            <input type="radio" name="<?php echo "question$compteur";?>" value="false"><?= $value;?></input>
                            <?php
                        } 
                        else if ($key ==='reponse' && $res[$i]['statut'] === 'bonne'){
                            ?>
                            <bold style="font-weight:520">Réponse <?= $ans?> :</bold> 
                            <input type="radio" name="<?php echo "question$compteur";?>" value="correct"><?= $value;?></input>
                            <?php
                        }
                        if($key === 'answersAmount')                
                        {
                            $ans++;
                            if(isset($res[($i+1)]['ID'])){
                                if($id !== $res[($i+1)]['ID'])
                                {
                                    $id = $res[$i]['ID'];
                                    $compteur_id = 0;
                                    echo "</br>";
                                    $compteur++;
                                } else if($id == $res[($i+1)]['ID']){
                                    $compteur_id++;
                                }
                            } else {
                                $compteur_id++;
                                echo "<br>";
                            }
                        }
                    }
                }
                
            }
        }
        unset($compteur,$compteur_id,$ans,$id);
        ?>
        <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['ID'];?>">
        <input type="checkbox" name="val" value="yes">  Valider mes réponses</input><br>
        <input type="submit" name="validate" value="Done!">
        </form>
    </div>
</div>
</body>
<script>
    var compteur = 120;
    var letsPlay = document.getElementsByTagName('input');
    function hurryUp(){
        compteur--;
        if(compteur >= 0){
            if(compteur < 60){
                document.getElementById('time').style.color = "#b20a2c";
            }
            document.getElementById('time').textContent = compteur;
            console.log(compteur);
            setTimeout(hurryUp,1000);
        } else {
            for(i = 0; i < letsPlay.length;i++){
                if(letsPlay[i].type === "radio" || letsPlay[i].type === "checkbox" || letsPlay[i].type === "submit"){
                    letsPlay[i].setAttribute('disabled','true');
                }
            }
        query = $.post({
            url : './Controllers/you_dead.php',
            data : {'qcm': $('input[name=qcm]').val(), 'user': $('#user').val()},
        });
        query.done(function(response){
            $('#answer').html(response);
        });
        }
    }
</script>