        <div>
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </div>
        <div class="row">
            <div class="col-xs-12" style="margin:auto;margin-top:90px;text-align:center">
                <form name="change_answers"  action="./index.php?page=lobby" style="width:900px" method="POST">
                    <?php
                    if(!empty($res))
                    {
                        $id = intval($res[0]['ID']);
                        $compteur_id = 0;
                        $compteur = 0;
                        $ans = 1;
                        for($i = 0; $i < count($res);$i++)
                        {
                            if($id !== intval($res[$i]['ID']))
                            {
                                $id = intval($res[$i]['ID']);
                                $compteur_id = 0;
                                $compteur++;
                            }
                            foreach($res[$i] as $key => $value)
                            {
                                if($compteur_id === 0)
                                {
                                    if($key === "question")
                                    {
                                        ?>
                                        <div class="inline-form" style="width:900px">
                                        Question : <input type ='text' name='q_id[]' value='<?= $res[$i]['ID']?>' 
                                        class="form-control" style='display:inline;max-width:50px'  readonly>
                                        <input type='text' readonly title ='Intitulé de la question'  name='question[]' 
                                        class="form-control" required pattern="^[a-zA-Z0-9\s,-]{0,}[?.]+$" value='<?= $value?>'
                                        style='display:inline;max-width:290px'>
                                        <input type="checkbox" name="add[<?=$compteur?>][]" value="add"> AJouter </input>
                                        <ul id='question<?= $compteur+1?>'>
                                        <?php
                                    } 
                                    else if ($key ==='reponse')
                                    {
                                        
                                        ?><li> <input type ='text' name='<?php  echo "a_id[$compteur][]";?>' value='<?= $res[$i]['rep_id']?>' 
                                        class="form-control" style='display:inline;width:50px' readonly> 
                                        Réponse <?= $ans?>: <input type='text' readonly name='<?php echo "answer[$compteur][]?>";?>' 
                                        class="form-control"  value='<?=$value?>' style="width:140px;display:inline">
                                        <select name='<?php echo "a_status[$compteur][]";?>' class="form-control" title='statut de la réponse'
                                        style="width:100px;display:inline" readonly>
                                            <option value='<?= $res[$i]['statut'] ?>'><?=$res[$i]['statut']?></option>
                                        </select>
                                        </li>
                                        <?php
                                        $ans++;
                                    }
                                    else if($key === "statut"){
                                        $compteur_id++;
                                    } 
                                    if ($ans-1 === intval($res[$i]['answersAmount']))
                                    {
                                        echo '</ul>';
                                        echo "</div>";
                                        $ans=1;
                                    }
                                } else {
                                    if($key === 'reponse')
                                    {
                                        ?><li> <input type ='text' name='<?php  echo "a_id[$compteur][]";?>' 
                                        class="form-control" value='<?= $res[$i]['rep_id']?>' style='width:50px;display:inline' readonly>
                                        Réponse <?=$ans?> :<input type='text' name='<?php echo "answer[$compteur][]";?>' 
                                        class="form-control" readonly value='<?= $value?>' style="width:140px;display:inline">
                                        <select name='<?php echo "a_status[$compteur][]";?>' class="form-control"
                                        title='statut de la réponse' style="width:100px;display:inline" readonly>
                                            <option value='<?= $res[$i]['statut'] ?>'><?=$res[$i]['statut']?></option>
                                        </select>
                                        </li>
                                        <?php
                                        $ans++;
                                    }
                                    if($key === "statut" && $ans === intval($res[$i]['answersAmount'])+1){
                                        $compteur_id++;
                                        ?>
                                        </ul>
                    </div>
                    </br>
                                        <?php
                                        $ans= 1;
                                    }
                                }
                            }
                        }

                    }
                    unset($compteur,$compteur_id,$ans,$id);
                    ?>
                    <input type="submit" class="btn btn-secondary" name="q_to_link" value="Lier">
                </form>
            </div>
        </div>
    </body>
</html>