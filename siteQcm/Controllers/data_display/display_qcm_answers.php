<?php

function display_qcm_answers ($answers) {

		echo "<div class='answer' style='margin-left: 1065px;margin-top: -255px;' ><table id='shown' style='margin-top: -23px;margin-left: 390p' ><tr><td><a <i class='fas fa-plus-circle'></i></a>Créer question</td></tr></table><table style='width:262%;max-width: 507px' class='table'><thead class='thead-dark'><tr><th style='width:5%' scope='col'>n°</th><th style='width:70%' scope='col'>Réponse:</th><th style='width:30%' scope='col'>Actions</th></tr></thead>";
		$a = 0;
		$b = 0;
		//$test = array_unique($answer);
		
		foreach ($answers as $key => $value) {

			if($_GET['question'] == $answers[$a][5]) {

				$qcm = $answers[$a][0];
				$question = $answers[$a][1];
				$reponse = $answers[$a][2];
				$reponse_id = $answers[$a][4];
				$question_id = $answers[$a][5];
				$statut = $answers[$a][3];

				$b++;
				$save_b = $b;
				echo "

						<tbody>
						     <tr>
								 <th scope='row'>".$b."</th>

								 <td "; if($statut == "bonne") {echo " style='background-color:green'";}else{echo"style='background-color:red'";} echo">
									
									<p id='rep".$b."''>".$reponse."</p>
									<form action='' method='get'>
											
										<input id='champ".$b."' type='text' name='replace' placeholder='Entrez la réponse' value'' required >
								 		<input type='hidden' name='page' value='accueil'>
								 		<input type='hidden' name='rub' value='d_qcm'>
								 		<input type='hidden' name='qcm' value='".$qcm."'>
								 		<input type='hidden' name='question' value='".$question_id."'>
								 		<input type='hidden' name='reponse' value='".$reponse_id."'>

								 </td>
								 <td>
										<a id='change".$b."'><i class='fas fa-pen'></i></a>
										<a id='back".$b."'<i class='fas fa-undo'></i></a>
										<input id='save".$b."' class='submit2' type='submit' name='maj' value='edit' >
									</form>
									<a id='delete".$b."' href='index.php?page=accueil&&rub=d_qcm&&qcm=".$qcm."&&question=".$question_id."&&reponse=".$reponse_id."&&maj=delete' <i class='fas fa-trash'></i></a>
								 </td>
							
							</tr>";

			}
			$a++;
		}
		$save_b = $save_b+1;
		echo "
		
		<tr id='new' >
		<th scope='row'>".$save_b."</th>
			
			<form action='' method='get'>
			
				<input type='hidden' name='page' value='accueil'>
				<input type='hidden' name='rub' value='d_qcm'>
				<input type='hidden' name='qcm' value='".$qcm."'>
				<input type='hidden' name='question' value='".$question_id."'>
			
				<td>
				
					<input type='radio' name='statut' value='bonne' required>bonne
					<input type='radio' name='statut' value='fausse' required>fausse
					<input style='width: 289px;' type='text' name='add_answer' placeholder='Entrez la nouvelle réponse' value'' required >	
				
				</td>		
				<td>

					<input id='send' class='submit' type='submit' name='maj' value='add' >
			
				</td>		

			</form>
		</tr>";



		echo "<script>hider(".$b.");</script>";
		echo "</tbody></table></div></center>";
	

//fait ======!!!!!!!!!!!!




	}

?>