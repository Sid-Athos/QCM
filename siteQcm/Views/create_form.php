<ul>
<?php
    for($i = 0; $i < $ans; $i++){
        ?>
        <li>
        <div class="row">
            Réponse : <input type='text' name='answer[]'style="width:180px;text-align:center" 
            minlength='2' class="form-control" placeholder="Réponse..."
            pattern="^[0-9A-Za-z' \(\)\/+]{1,}[?!.]{0,}" style="width:100px" title='Veuillez saisir la réponse de la question' required>
            <select name="status[]" style="width:120px" required class="form-control">
                <option value="bonne">Correcte</option>
                <option value="fausse">Fausse</option>
                </select>
        </div>
        </li>
        <?php
    }
?>
</ul>
<br>