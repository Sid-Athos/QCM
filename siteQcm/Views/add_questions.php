        <div class="row">
            <div class="col-xs-12" style="display:block;margin:auto;margin-top:90px;text-align:cente;white-space:no-wrap">
            <h4> La première réponse doit être correcte, vous pourrez ajouter des mauvaises réponses plus tard</h4>
                <form method="POST" action ="./index.php?page=lobby" class="form-inline">
                    <div style="margin:auto;margin-top:90px;width:700px">
                    <?php
                        if(isset($amount)){
                            for($i = 0; $i < $amount;$i++){
                                ?>
                                Question <?php echo $i+1;?> : 
                                <input type='text'class='form-control' minlength='12' style="max-width:200px"
                                pattern="^[0-9A-Za-z' \(\)\/+]{1,}[?.]+" name='question[]' id='question[]'
                                placeholder="Intitulé de la question.." required>
                                Réponse : <input type='text' name='answer[]' class='form-control' minlength='2' 
                                pattern="[-0-9A-Za-z' \(\)\/+]{1,}[!?.]{0,}$" style="max-width:150px"
                                placeholder="Réponse..."
                                title='Veuillez saisir la réponse de la question' required>
                                <br>
                            <?php
                            }

                        }
                    ?>

                <input type="submit" name="Enregistrer" class="btn btn-secondary"  value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>