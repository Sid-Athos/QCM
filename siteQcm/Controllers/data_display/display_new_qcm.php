<?php
function display_new_qcm ($questions, $chapitre) {

	echo "<form action='' method='get'><input type='hidden' name='rub' value='c_qcm'><input type='hidden' name='page' value='accueil'>

	<div class='container'>
      <div class='card-deck mb-3 text-center'>
        <div class='card mb-4 shadow-sm'>
          <div class='card-header'>
            <h4 class='my-0 font-weight-normal'>Etape 1</h4>
          </div>
          <div class='card-body'>
            <h1 class='card-title pricing-card-title'>Nom du qcm</h1>
            <ul class='list-unstyled mt-3 mb-4'>
              <li><input type='text' name='qcm' value='"; if(isset($_GET['qcm'])) { echo $_GET['qcm']; } echo "'></li><br>
              <li>Chapitre :  
              	<select name='chapitre'>";

              	$i = 0;
              foreach($chapitre as $key => $value) {

              	    echo"<option value='".$chapitre[$i][0]."'>".$chapitre[$i][1]."</option>";
              	    $i++;

              }
    		
    		echo "<select></li>
            </ul>
            <button type='submit' class='btn btn-lg btn-block btn-outline-primary'>Valider</button></form>
          </div>
        </div>
        <div class='card mb-4 shadow-sm'>
          <div class='card-header'>
            <h4 class='my-0 font-weight-normal'>Etape 2</h4>
          </div>
          <div "; if(empty($questions) && isset($_GET['chapitre'])) { echo "style='background-color:red;'"; } echo "class='card-body'>
            <h1 class='card-title pricing-card-title'></h1>
            <ul class='list-unstyled mt-3 mb-4'>
            <form action='' method='get'><input type='hidden' name='rub' value='c_qcm'><input type='hidden' name='page' value='accueil'><input type='hidden' name='add_qcm' value='true'>"; if(isset($_GET['chapitre'])) { echo "<input type='hidden' name='chapitre' value='".$_GET['chapitre']."'' ><input type='hidden' name='qcm' value='".$_GET['qcm']."'>  ";
              $i = 0;
              if(!empty($questions)) {
              foreach($questions as $key => $value) {

              	    echo"<li><input type='checkbox' name='questions[]' value='".$questions[$i][0]."'"; if($i == 0) {echo "required";} echo" />".$questions[$i][1]."</li>";
              	    $i++;

              }
              }else{
                echo "ce chapitre ne contient pas de question<br><br><br>";
              }
              echo "<li>
            </ul>
            <button style='margin-top:75px' type='submit' class='btn btn-lg btn-block btn-primary'>Creer</button>
          </div>
        </div></form>";}else{echo"merci d'effectuer l'etape 1 avant toute chose";}

}




//fait =====!!!!!!!



?>