<?php

function display_qcm_questions ($answers) {
	echo "<div class='centre' style='margin-left:300px;margin-top:71px'>
		  <h1 style='margin-top: -91px'>".$_GET['qcm']."</h1>";


	echo "<table style='width:134%' class='table'>
			<thead class='thead-dark'>
				<tr>
					<th scope='col'>n°</th>
					<th scope='col'>Question</th>
				</tr>
			</thead>";
	$a = 0; 	$b = 1;

	//$test = array_unique($answer);
	if(!empty($answers)) {
	
	foreach ($answers as $key => $value) {

			echo "<tbody>
		<tr>
			<th scope='row'>".$b."</th>
			<td><form action='' method='get'>

				<a id='quest".$b."' href='index.php?page=accueil&&rub=d_qcm&&qcm=".$answers[$a][0]."&&question=".$answers[$a][1]."''>".$answers[$a][2]."</a>
				<input style='width:99%' id='remp".$b."' type='text' name='remp' placeholder='Entrez la question' value'' required >
				<input type='hidden' name='page' value='accueil'>
		 		<input type='hidden' name='rub' value='d_qcm'>
		 		<input type='hidden' name='qcm' value='".$answers[$a][0]."'>
		 		<input type='hidden' name='q_id' value='".$answers[$a][1]."'>


				<a id='retour".$b."'<i class='fas fa-undo'></i></a>
				<a id='pen".$b."' <i class='fas fa-edit'></i></a>
				<input id='send".$b."' class='submit2' type='submit' name='maj' value='edit_q' ></form>
				<a style='margin-left: 450px;margin-top: -30px;' id='sup".$b."' <i style='' class='fas fa-minus-circle' href='index.php?page=accueil&&rub=d_qcm&&qcm=".$answers[$a][0]."&&qcm_id=".$answers[$a][3]."&&rmv_id=".$answers[$a][1]."&&maj=rmv_question' ></i></a>


			</td>
		</tr>";
		$a++;	$b++;
				//echo "<td>".$answer[$key][$cle]."</td>";
	}
	echo "</tbody></table></center>";
	echo "</div>";
	}else {
		echo "le qcm ne contient pas de questions";
	}
	echo "<script>hider(".$b.");</script>";
	echo "</tbody></table></div></center>";
	//faiiiiiiiiittttt !!!!!!!!!==============
}