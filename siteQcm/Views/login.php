    <div class="row">
        <div class="col-xs-12" 
        style="color:#0083B0;display:block;margin:auto;margin-top:90px;text-align:cente;white-space:no-wrap">
        Bienvenue sur QCM fest, la plateforme de passage de QCM de l'école in'Tech
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="display:block;margin:auto;margin-top:90px;text-align:cente;white-space:no-wrap">
            <form id="test" method="POST" class="inline-form" action="./index.php?page=login">     
                <div class="form-group" style="text-align:center">
                    <label for="mail" style="font-size:18px;color:#355C7D;text-align:center">Email address</label>
                    <input type="text" class="form-control" pattern="^[0-9a-zA-Z]{3,25}@{1}[a-z]{2,5}.[a-z]{2,4}$" 
                    name="mail" required minlength="5" id="mail" placeholder="Email..."
                    title="Veuillez saisir votre adresse mail">
                </div>
                <div class="form-group" style="text-align:center">
                    <label for="pw"style="font-size:18px;color:#355C7D;text-align:center">Password</label>
                    <input type="password" required minlength="6" id="pw"  placeholder="Password..."
                    title="Veuillez saisir votre mot de passe" name="pw" class="form-control">
                <div>
                <div class="form-check">
                <input type="checkbox" onclick="showHide(event)" id="check1" name="lol" value="test"
                class="form-check-input"><label class="form-check-label" for="check1"> Afficher le mot de passe</label>
                </div>
                <br>
                <button class="btn btn-secondary" type="submit" id="send" name="login" style="position:relative;width:250px" value="login">Se connecter</button>
            </form>
        </div>
    </div>
</body>

<script>
    function showHide(){
        check = document.getElementById('pw');
        if(check.type === "password"){
            check.type="text";
        } else {
            check.type = "password";
        }
    }
</script>