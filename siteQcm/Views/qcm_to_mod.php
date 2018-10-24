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
      <button class="btn btn-secondary" type="submit" 
      name="link_q" onclick="res(event)" 
      value ="Lier des questions existantes">
      Lier des questions existantes
      </button>
      <button class="btn btn-secondary" type="submit" onclick="reload(event)" 
      name="choice" value="q_add">
      Réinitialiser
      </button><br>
      <input type="submit" class="btn btn-secondary" name="new_q" id="choice" value="Ajouter"><br>
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
var count = 0;
function append(event){
  event.preventDefault();
  var input_q = document.createElement('input');
  var input_a = document.createElement('input');
  var br = document.createElement('br');
  var text_q = document.createTextNode(' Nouvelle question : ');
  var text_a = document.createTextNode(' Réponse : ')
  input_q.type = "text";
  input_q.name ="question[]";
  input_q.setAttribute("class","form-control");
  input_q.style.textAlign ="center";
  input_q.pattern = "^[\(\)a-zA-Z0-9, -]{0,}[?.]+$";
  input_q.required = true;
  input_a.type = "text";
  input_a.name ="answer[]";
  input_a.setAttribute("class","form-control");
  input_a.style.textAlign ="center";
  input_a.pattern = "^[\(\)a-zA-Z0-9,-_ ]{0,}$";
  input_a.required = true;
  /**var select_s = document.createElement('select');
  select_s.name = "statut[]";
  var option_b = document.createElement('option');
  option_b.value = "bonne";
  var option_f = document.createElement('option');
  option_f.value = "fausse";
  option_f.text = "Fausse";
  select_s.append(option_b);
  select_s.append(option_f);*/
  var parentDiv = document.getElementById("lol").parentNode;
  parentDiv.append(br);
  parentDiv.append(br);
  parentDiv.append(text_q);
  parentDiv.append(input_q);
  parentDiv.append(text_a);
  parentDiv.append(input_a);
  //parentDiv.createtextNode('Question : ');
  //parentDiv.append(select_s);
  parentDiv.append(br);
  parentDiv.append(document.getElementById('choice'));
  count++;
}
</script>
<script>
function reload(event){
  var letsPlay = document.getElementsByTagName('input');
  for(i = 0; i < letsPlay.length; i++){
    letsPlay[i].required = false;
    letsPlay[i].removeAttribute('pattern');
  }
}
</script>
<script>
function res(event){
  var letsPlay = document.getElementsByTagName('input');
  for(i = 0; i < letsPlay.length; i++){
    if(letsPlay[i].name === "question[]"){
      event.preventDefault();
        alert('Veuillez remplir tous les champs avant de pouvoir lier de nouvelles questions');
    }
  }
}
</script>
