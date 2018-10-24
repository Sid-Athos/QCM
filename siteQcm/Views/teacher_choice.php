<div class="container" style="width:300px;position:absolute;right:15px;top:52px">
    <form action="./index.php?page=lobby" method="POST" style="width:300px">
        <div class="dropdown" >
            <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ajouter
            </button>
                <div class="dropdown-menu" style="background-color:transparent;margin-right:-13px;margin-top:-8px;border:none" aria-labelledby="dropdownMenuButton">
                    <button class="btn btn-secondary" type="submit" title="ajuetr un qcm" data-toggle="tooltip" data-placement="bottom" 
                    name="choice" value="add">Ajouter un QCM</button><br>
                    <button class="btn btn-secondary" type="submit" name ="choice" value="s_add">Ajouter une matière</button><br>
                    <button class="btn btn-secondary" type="submit" name ="choice" value="c_add">Ajouter un chapitre</button><br>
                    <button class="btn btn-secondary" type="submit" name ="choice" value="q_add">Ajouter des questions à un QCM</button><br>
                    <button class="btn btn-secondary" type="submit" name="choice" value="a_add">Ajouter des réponses à une question</button><br>
                </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Modifier
            </button>
                <div class="dropdown-menu" style="background-color:transparent;margin-right:-13px;margin-top:-8px;border:none" aria-labelledby="dropdownMenuButton">
                    <button class="btn btn-secondary" type="submit" name ="choice" value="a_mod">Modifier des questions ou des réponses</button><br>
                    <button class="btn btn-secondary" type="submit" name="choice" value="unlink_a">Délier les réponses d'une question</button><br>
                    <button class="btn btn-secondary" type="submit" name="choice" value="mod">Délier des questions à un QCM</button><br>
                </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Supprimer
            </button>
                <div class="dropdown-menu" style="background-color:transparent;margin-right:-13px;margin-top:-8px;border:none" aria-labelledby="dropdownMenuButton">
                    <button class="btn btn-secondary" type="submit" name="choice" value="a_del">Supprimer des réponses</button><br>
                    <button class="btn btn-secondary" type="submit" name ="choice" value="q_del">Supprimer des questions</button><br>
                    <button class="btn btn-secondary" type="submit" name="choice" value="qcm_del">Supprimer un QCM</button><br>
                </div>
        </div>
    </form>
</div>
</body>


