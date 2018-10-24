<body>
    <div class="row">
        <div class="col-xs-12" style="display:block;
        margin:auto;margin-top:100px;text-align:center;
        white-space:no-wrap;color:#304352;font-size:18px">
            <form name="new_qcm" method="POST" 
            action="./index.php?page=lobby">
                Nom du QCM : 
                <br>
                <input type="text" name="qc_name" class="form-control" 
                placeholder="Nom du nouveau QCM..."
                style="border:none;border-radius:5px" 
                pattern="^^[-0-9A-Za-z' \(\)\/+]{1,}$" required minlength="5">
                <br>
                Matière/chapitre lié au QCM : 
                <br>
                <div class="form-group">
                    <select name="sub_chap" class="form-control">
                        <?php 
                            for($i=0;$i<count($result);$i++)
                            {
                        ?>
                                <option class="form-control" value="<?php echo 
                                $result[$i]['nom']."-".$result[$i]['titre'];?>">
                                <?php echo $result[$i]['nom']."-".$result[$i]['titre'];?>
                                </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <br>
                Nombre de questions : <br>
                <input type="number" name="qc_amount" class='form-control'
                min="1" max="100" value="1" step="1"><br>
                <button type="submit" name="new_qcm"
                class="btn btn-secondary" 
                value="Ajouter un QCM">
                Ajouter un QCM
                </button>
            </form>
            <a href="./index.php?page=lobby" target="_self">
            Retour accueil enseignant
            </a>
        </div>
    </div>
</body>