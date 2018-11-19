<div class="row">
<div class="col-xs-4">
  <div class ="container-fluid" 
  style="border:0.5px solid black;width:700px;background-color:#FFFFFF;position:fixed;left:0;white-space:no-wrap">
      <div id="get" >
      </div>
      </div></div>
  <div class="col-xs-8" style="display:block;margin-left:800px;margin-top:60px;text-align:center;width:600px">
    <h1> Ajout de questions</h1>
      QCM à modifier: <br>
      <form name="mod_qcm" method="POST" action="./index.php?page=lobby">
        <select name="qcm_choice" id="qcm_c" class="form-control" required
        style="width:200px;margin:auto">
          <?php 
            for($i=0;$i<count($results);$i++)
            {
          ?>
                <option value="<?php echo $results[$i]['nom']; ?>"><?php echo $results[$i]['nom']; ?></option>
          <?php
            }
          ?>
        </select>
      <br>
      <input type="button" name="c" class="btn btn-secondary"
      onclick="append(event)" id="lol" 
      value="+ Nouvelle question">
      <button name="supp" value="supp" id="maman" class="btn btn-secondary"
      onclick="killLastDiv(event)">Supprimer la dernière paire</button>
      <button class="btn btn-secondary" type="submit" 
      name="link_q" onclick="res(event)" 
      value ="Lier des questions existantes">
      Lier des questions existantes
      </button>
      <button class="btn btn-secondary" type="submit" onclick="reload(event)" 
      name="choice" value="q_add">
      Réinitialiser
      </button><br>
      <button type="submit" class="btn btn-secondary" name="new_q" id="choice" value="Ajouter">
      Ajouter</button><br>
      </form>
    <a href="./index.php?page=lobby">Retour accueil enseignant</a>
  </div>
</div>

</body>

<script>
$('#qcm_c').change(function(event){
  query = $.post({
      url : './Controllers/get_questions_ajax.php',
      data : {'QCM': $('#qcm_c').val()},
  });
  query.done(function(response){
      $('#get').html(response);
  });
});
</script>
<script>
  function killLastDiv(event)
  {
    event.preventDefault();
    var liste = document.getElementsByClassName('allDivs'); 
    liste[liste.length-1].remove();
  }
</script>
<script>
var count = 0;
function append(event){
  event.preventDefault();    // Quand tu cliques sur un bouton dans un form, généralement ça envoie la donnée. Cette ligne évite d'envoyer le formulaire en cliquant sur le bouton (preventDefault, évite l'action par défaut, donc le submit)
  var div = document.createElement('div');  // Je crée un Div dans lequel mettre les champs (ça me permet de supprimer deux input en 1 click. Supprimer le conteneur est plus rapique que supprimer chaque élément)
  div.id = count;  //J'attribue un id au div, afin de connaître le nombre de div existant et supprimer le dernier uniquement
  div.setAttribute('class','allDivs'); // Je donne une classe au div,juste pour un éventuel css
  var input_q = document.createElement('input'); // Je crée un élément de type input (la question)
  var input_a = document.createElement('input'); // Je crée un deuxième élément de type input (la réponse)
  var br = document.createElement('br');//Je crée un <br> afin que les deux input ne soient pas alignés
  var text_q = document.createTextNode(' Nouvelle question : ');//Je crée un élément texte pour décrire l'input question
  var text_a = document.createTextNode(' Réponse : ');//Pareil avec la réponse
  input_q.type = "text";//J'attribue un type à l'input
  input_q.name ="question[]";//J'attribue une nom, les [] me servent à faire un tableau avec chaque input du même nom, ça push
  input_q.setAttribute("class","form-control");// J'attribue une classe pour le CSS à l'input de la question
  input_q.style.textAlign ="center";// Je dis que pour cet élément, en style CSS, le texte sera aligné au centre
  input_q.pattern = "^[\(\)a-zA-Z0-9, -]{0,}[?.]+$";// Je donne un pattern obligatoire. Ici l'utilisateur à droit aux parenthèses, tirets, caractères alphanumériques et un ? ou un . en ponctuation
  input_q.required = true;// je spécifie le fait quel'élément est requis pour valider mon formulaire
  input_a.type = "text";// Là je fais pareil avec le deuxième 
  input_a.name ="answer[]";
  input_a.setAttribute("class","form-control");
  input_a.style.textAlign ="center";
  input_a.pattern = "^[\(\)a-zA-Z0-9,-_ ]{0,}$";
  input_a.required = true;
  var parentDiv = document.getElementById("lol").parentNode;
  parentDiv.append(div);
  div.append(text_q);
  div.append(input_q);
  div.append(text_a);
  div.append(input_a);
  count++;
}
</script>
<script>
function reload(event){
  event.preventDefault();
  var letsPlay = document.getElementsByTagName('div');
  console.log(letsPlay);
  for(i = 0; i < letsPlay.length; i++){
    if(letsPlay[i].className === "allDivs")
    {
        letsPlay[i].remove();

    }
  }
}
</script>
