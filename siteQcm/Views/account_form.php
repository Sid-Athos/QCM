<div class="row">
    <div class="col-xs-12" style="margin:auto">
        <form method="POST" id="post"  enctype="multipart/form-data" 
        style="margin-bottom:25px">
            <center>
            <span style=
            <?php 
                if($_SESSION['status'] === "s") 
                { ?>
                "color:#FFFFFF"
                <?php 
                    } else 
                    {
                ?> 
                "color:#333333" 
                <?php 
                    }
                ?>>
            <h4>
            Ici, vous pouvez modifiez vos informations personnelles
            </h4>
            </span>
            </br>
            Mon pseudo : </center><br>
                <input  class="form-control" type="text" name="pseudo" value="<?php echo $results['pseudo'];?>">
                <center>
                <input type="checkbox"name="mod_ps" value="yes"> Modifier mon pseudonyme </input>
                </center>
            <br>
                <center>
                Mon email : 
                </center><br>
                <input type="email"  class="form-control" name="email" value="<?php echo $results['email'];?>">
                <center>
                    <input type="checkbox" name="mod_mail" style="border-radius:3px;border:none" value="yes"> Modifier mon email </input>
                </center>
                
            <br>
            <center>Mon mot de passe : </center><br>
                <input type="password"   class="form-control" name="password" id ="pw0" value="<?php echo $results['pw'];?>">
                <center>
                    <input type="checkbox" name="mod_pw" onclick="setPw(event)" value="yes"> Modifier mon mot de passe </input>
                </center>
            <br>
                <input type="password" class="form-control" style="display:none" pattern="^[a-zA-Z0-9\_\-]{0,}$" name="new_pw" id ="pw1" minlength="3" value="" placeholder="Nouveau mot de passe..." >
                <input type="password" class="form-control" style="display:none" name="c_pw" id ="pw2" value="" placeholder="Confirmation du mot de passe...">
                <center>
                    <input type="checkbox" onclick="showHide(event)"  name="lol" value="test"> Afficher le mot de passe </input><br>
                </center>
            <div>
            <h4 style="color:#66666">
            <center>Avatar
            </center>
            </h4> 
            <br>
            <center>
                <button id="pic" class="btn btn-secondary" style="z-index:99">
                Sélectionner une photo de profil...
                </button>
                <input type = "FILE" id="file" style="border:none;opacity:0;position:absolute;z-index:1;left:0" name ="img_up" onchange="readURL(this)">
                <input type="checkbox" name="add_pic" value="yes"> Ajouter une photo </input>
            </center>
            <br>
                        <center>
                            <img id="blah" style="width:300px;height:300px;border-radius:50%;opacity: 0.75;filter: alpha(opacity=50)" alt="Preview">
                        </center>
                    </div>
                <br>
            <button type="submit" style="width:600px" name="mod_account" class="btn btn-secondary" onclick="check_pw(event)" value="submit">Modifier</button>
        </form>
    </div>
</div>
</body>
<script>
    function showHide(){
        for(let i = 0; i< 3; i++){
            check = document.getElementById('pw'+ i);
            if(check.type === "password"){
                check.type="text";
            } else {
                check.type = "password";
            }
        }
    }
</script>
<script>
function check_pw(event){
    check1 = document.getElementById('pw1');
    check2 = document.getElementById('pw2');   
    if(check1.value !== check2.value){
        event.preventDefault();
    }
}
</script>
<script>
function setPw(){
    check1 = document.getElementById('pw1');
    check2 = document.getElementById('pw2');
    if(check1.style.display === "none"){
        check1.style.display = "block";
        check1.required = true;
        check2.required = true;
        check2.style.display = "block";
    } else {
        check1.style.display = "none";
        check1.required = false;
        check2.required = false;
        check2.style.display = "none";
    }
}
</script>
<script>
function readURL(input) {
    /* Là on regarde si il y a un fichier dans un input type file */
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            /* On récupère la preview une fois que c'est préupload mamène */
            $('#blah')
                .attr('src', e.target.result);
        };
        /* Le petit outil qui permet de lire l'image sans reload */
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script>
    $("#pic").click(function(event){
        event.preventDefault();
        $("#file").click();
    });
    $("#file").change(function(event){
        console.log(document.getElementById("file"));
        document.getElementById("pic").textContent = document.getElementById("file").value;
    });
</script>