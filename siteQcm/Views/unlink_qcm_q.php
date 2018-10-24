    <div class="row">
        <div class="col-xs-12" style="position:relative;margin:auto;margin-top:100px">
            <form method="POST">
            <div class="form-group">
                Sélectionnez un qcm à modifier :<br>
                    <select name="qcm_choice" id="qcm_c" class="form-control" style="max-width:300px" required>
                        <option>Veulliez sélectionner un QCM
                        </option>
                            <?php 
                                for($i=0;$i<count($results);$i++){
                                    ?><option value='<?php echo $results[$i]['nom']; ?>'><?php echo $results[$i]['nom']; ?></option>
                                    <?php
                                }
                            ?>
                    </select>
                <div id="answer1">
                    Choisissez une question à modifier :<br>
                        <div id="check" name="question"> 
                        <?php
                            if(!empty($res)){
                                for($i = 0;$i < count($res);$i++)
                                {
                                    ?>
                        <?php  
                                ?>
                                <input type="radio" name="unlink[]" value="<?php echo $res[$i]['id']?>"><p> <?= $res[$i]['question']?></p></br>
                                <?php
                                }
                            }
                        ?>
                        </div>
                </div>
                <input type="submit" class="btn btn-secondary" style="position:relative;margin:auto;min-width:300px;width:auto" ame="q_unlink" value="Délier">
            </div>
            </form>
        </div>
    </div>
</body>
<script>
$('#qcm_c').change(function(event){
  query = $.post({
      url : './Controllers/unlink_questions_ajax.php',
      data : {'QCM': $('#qcm_c').val()},
  });
  query.done(function(response){
      $('#answer1').html(response);
  });
});
</script>