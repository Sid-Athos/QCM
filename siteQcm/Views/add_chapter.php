<div class="row">
    <div class="col-xs-12" style="display:block;margin:auto;margin-top:90px">
        <form method="POST">
            <input type="text" name="chap_name" value="" class="form-control" placeholder="Nom du chapitre..." pattern="^[0-9a-z-A-Zéèàçù&]{0,}[ ]{0,1}[0-9a-z-A-Zéèàçù&]{0,}[ ]{0,1}[0-9a-z-A-Zéèàçù&]{0,}$" required minlength="3">
                <br>
                Matiére à lier : 
                <select name="s_link" class="form-control">
                    <?php
                        if(isset($result)){
                            for($i = 0;$i < count($result);$i++){
                                ?>
                                    <option value="<?php echo $result[$i]["id"];?>"> <?php echo $result[$i]["nom"];?></option>
                                <?php
                            }
                        }
                    ?>
                </select><br>
            <button class="btn btn-secondary" type="submit" name="add_chap" value="Enregistrer">
            Enregistrer
            </button>
        </form>
    </div>
</div>