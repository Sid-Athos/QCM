<div class="row">
    <div class="col-xs-12" style="display:block;margin:auto;margin-top:90px;text-align:center">
        <h1> Ajout de Réponses</h1>
        QCM à modifier: <br>
        <form name="mod_qcm" method="POST" action="./index.php?page=lobby">
            <select name="qcm_choice" id="qcm_c" required class="form-control">
                <?php 
                    for($i=0;$i<count($results);$i++){
                        ?><option value='<?php echo $results[$i]['nom']; ?>'><?php echo $results[$i]['nom']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <br>
            <div id="answer1">
                Choisissez une question à modifier :<br>
                <select id="check" name="question" class="form-control"> 
                    <?php
                        if(!empty($res)){
                            for($i = 0;$i < count($res);$i++)
                            {
                                ?>
                    <?php  
                            ?>
                            <option value="<?php echo $res[$i]['id']?>"><?= $res[$i]['question']?></option>
                            <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div>
            Combien de réponse souhaitez-vous ajouter? <br>
            <input type="number" min="0"  class="form-control" autocomplete="off"   id="ans" value="0" name="ans_amount">
            </div>
            <div id="answer2">
            </div>
            <button class="btn btn-secondary" type="submit" name="new_a" id="choice" value="Ajouter">
            Ajouter
            </button>
            <br>
        </form>
        <a href="./index.php?page=lobby">Retour accueil enseignant</a>
    </div>
</div>
</body>

<script>
$('#qcm_c').change(function(event){
  query = $.post({
      url : './Controllers/questions_ajax.php',
      data : {'QCM': $('#qcm_c').val()},
  });
  query.done(function(response){
      $('#answer1').html(response);
  });
});

$('#ans').change(function(event){
        query = $.post({
            url : './Controllers/answers_ajax.php',
            data : {'amount': $('#ans').val()},
        });
        query.done(function(response){
            $('#answer2').html(response);
        });
});
</script>