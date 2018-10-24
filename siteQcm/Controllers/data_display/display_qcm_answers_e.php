<?php

function display_qcm_answers_e ($answers, $questions) {
	$_SESSION['rep'] = array();
	echo "<div class='centre2' style='margin-left:250px;margin-top:-27px;margin-top:61px'>
		  <h1 style='margin-top: -91px'>".$_GET['qcm']."</h1>";


	echo "<table style='width:134%' class='table'>";
	$a = 0;
	
	echo "<form action='' method='get'>
		  <input type='hidden' name='page' value='accueil'>
	   	  <input type='hidden' name='rub' value='d_qcm'>
	   	  <input type='hidden' name='check_qcm' value='".$_GET['qcm']."'>";
			$d = 0;

	//$test = array_unique($answer);
	if(!empty($questions)) {
		while(count($questions) > 0) {
			$rand = 0;
			$rand = array_rand($questions);
				//echo "vide = ".count($questions);
				//echo "rand=".$rand;
			  echo "<thead class='thead-dark'>
						<tr>
							<th scope='col'>n°".$questions[$rand][1]."</th>
							<th scope='col'>".$questions[$rand][2]."</th>
						</tr>
					</thead>
					<tbody>";
								
					$t = 0;  $r = 1;
					foreach ($answers as $key => $value) {
						$reponse = $answers[$t][2];
						$question_id = $answers[$t][5];
						$qcm = $answers[$t][0];
						$statut = $answers[$t][3];
						$question = $answers[$t][1];
						$reponse_id = $answers[$t][4];

						if($questions[$rand][1] == $question_id) {
							$_SESSION['rep'][$d] = $reponse_id;
							echo"<tr>
									<th scope='row'>".$r."</th>
									<td>
										<p id='rep".$r."''>".$reponse."</p>
									</td>
									 <td>
		        						<input type='radio' name='R".$reponse_id."' value='"; if($statut == "bonne") {echo "correct'";}else{echo"erreur'";} echo">
									 </td>
								</tr>";
							$r++;
							$d++;
						}
						$t++;
					}
			   echo "</tbody>";
			   unset($questions[$rand]);
			   $a++;
			   //var_dump($questions);

		}





	echo "<input type='hidden' name='nbquestions' value='".$a."' >";
	//echo "nb de questions = ".$a ;
	echo"</table><input type='submit' name='send' value='envoyer' ></form></div>";

}else{
		echo "questionnaire non existant";
	}
}




/*	foreach ($questions as $key => $value) {

	  echo "<thead class='thead-dark'>
				<tr>
					<th scope='col'>n°".$questions[$a][1]."</th>
					<th scope='col'>".$questions[$a][2]."</th>
				</tr>
			</thead>
			<tbody>";
						
			$t = 0;  $r = 1;
			foreach ($answers as $key => $value) {
				$reponse = $answers[$t][2];
				$question_id = $answers[$t][5];
				$qcm = $answers[$t][0];
				$statut = $answers[$t][3];
				$question = $answers[$t][1];
				$reponse_id = $answers[$t][4];

				if($questions[$a][1] == $question_id) {
					$_SESSION['rep'][$d] = $reponse_id;
					echo"<tr>
							<th scope='row'>".$r."</th>
							<td>
								<p id='rep".$r."''>".$reponse."</p>
							</td>
							 <td>
        						<input type='radio' name='R".$reponse_id."' value='"; if($statut == "bonne") {echo "correct'";}else{echo"erreur'";} echo">
							 </td>
						</tr>";
					$r++;
					$d++;
				}
				$t++;
			}
	   echo "</tbody>";

	   $a++;

	}	   
*/

//faitttttt !!!!!!!!!!!!!==================
?>