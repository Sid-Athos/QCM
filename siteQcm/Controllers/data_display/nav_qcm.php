<?php
function nav_qcm ($donnees) {

echo "<link href='https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css' rel='stylesheet'>

<div style='
    margin-top: 30px;
    margin-left: 50px;' class='container-fluid'>
      <div class='row'>
        <nav class='col-md-2 d-none d-md-block bg-light sidebar' style='margin-top: 109px;padding: 1px 0 0;'>
          <div "; if(empty($donnees) ) { echo "style='background-color:red;'"; } echo "class='sidebar-sticky'>
            <ul class='nav flex-column'>";
            if(!empty($donnees)) {
            	$a = 0;
            	foreach ($donnees as $key => $value) {
						$p = 0;
					foreach ($value as $cle => $val) {
						if($p == 1) {
						
							echo "<li class='nav-item'><a class='nav-link' href='index.php?page=accueil&&rub=d_qcm&&qcm=".$donnees[$key][$cle]."'>".$donnees[$key][$cle]."</a>"; if($_SESSION['compte'] == 'prof') { echo "<a <i style='margin-left:159px' class='fas fa-minus-circle' href='index.php?page=accueil&&rub=d_qcm&&rmv_id=".$donnees[$key][0]."&&maj=rmv_qcm' ></i></a>"; } echo" </li>";
						}
						$p++;
					}
					$a++;
					echo "</tr>";
				}
			}else {
		        echo "<br><br><br>Vous avez passé tout les QCM<br><br><br>";

			}
           echo " </ul>
          </div>
        </nav>";

 //fait !!!!!!!!!!!=================
}
?>