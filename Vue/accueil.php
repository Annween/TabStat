<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" title="CSS" href="../CSS/style.css" />
  <script type="text/javascript" src="../js/onglet.js"></script>
  

	<title>TabStats</title>
</head>
<body>
	  


	 <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_Tab1" onclick="change_onglet('Tab1');">Tab 1</span>
            <span class="onglet_0 onglet" id="onglet_Tab2" onclick="change_onglet('Tab2');">Tab 2</span>
            <span class="onglet_0 onglet" id="onglet_Tab3" onclick="change_onglet('Tab3');">Tab 3</span>
            <span class="onglet_0 onglet" id="onglet_Tab4" onclick="change_onglet('Tab4');">Tab 4</span>
        </div>

        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_Tab1">
              
              <table>
              	<caption><br><h2>Nombre de supports en cours par projet et par état</h2></caption>
              	<thead>
              <tr><b>
              <td width="10%><th"><b>Projets</b></th></td>
              <td width="10%><th"><b>7 jours et moins</b></th></td>
              <td width="10%><th"><b>de 7 à 14 jours</b></th></td>
              <td width="10%><th"><b>de 15 à 21 jours</b></th></td>
              <td width="10%><th"><b>de 22 à 28 jours</b></th></td>
              <td width="10%><th"><b>de 29 à 90 jours</b></th></td>
              <td width="10%><th"><b>de 91 à 180 jours</b></th></td>
              <td width="10%><th"><b>plus de 180 jours</b></th></td>
              <td width="10%><th"><b>Total</b></th></td>
              </tr>
              </thead>
          <tbody>
            
            <?php
            
			/* Iteration sur les projets, une ligne par projet */
            while ($donnees = $reqProjectList->fetch())
			{
			
			  $reqLessAWeek = getSupportsEnCours($bdd, $donnees['id'], 'projet',0,7);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 7 jours et 14 jours */
			  $req7To14 = getSupportsEnCours($bdd, $donnees['id'], 'projet',7,14);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 15 jours et 21 jours */
			  $req15To21 = getSupportsEnCours($bdd, $donnees['id'], 'projet',15,21);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 22 jours et 28 jours */
			  $req22To28 = getSupportsEnCours($bdd, $donnees['id'], 'projet',22,28);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 29 jours et 90 jours */
			  $req29To90 = getSupportsEnCours($bdd, $donnees['id'], 'projet',29,90);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 91 jours et 180 jours */
			  $req91To180 = getSupportsEnCours($bdd, $donnees['id'], 'projet',91,180);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont plus de 180 jours */
			  $reqPlus180 = getSupportsEnCours($bdd, $donnees['id'], 'projet',180,999);
			  /* Recuperation du total */
			  $reqTotal = getSupportsEnCours($bdd, $donnees['id'], 'projet',0,999);




			  echo "<tr>";
			    /* Inscription du nom du projet */
			    echo "<td>".$donnees['name']."</td>";
				/* Inscription du nombre de ticket de moins d'une semaine */
				$buffData = $reqLessAWeek;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 7 à 14 jours */
				$buffData = $req7To14;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 15 à 21 jours */
				$buffData = $req15To21;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 22 à 28 jours */
				$buffData = $req22To28;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 29 à 90 jours */
				$buffData = $req29To90;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 91 à 180 jours */
				$buffData = $req91To180;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de plus de 180 jours */
				$buffData = $reqPlus180;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket total */
				$buffData = $reqTotal;
				echo "<td>".$buffData['NB']."</td>";

			  echo "</tr>\n";
			} 
            
            ?>
           		</tbody>
           </table>

            </div>
        </div>



           <div class="contenu_onglet" id="contenu_onglet_Tab2">
                <h1></h1>

            <table>
              	<caption><br><h2>Nombre de supports en cours par personne et par tranche d'ancienneté </h2></caption>
              	<thead>
              <tr>
              <td width="10%><th"><b>Projets</b></th></td>
              <td width="10%><th"><b>7 jours et moins</b></th></td>
              <td width="10%><th"><b>de 7 à 14 jours</b></th></td>
              <td width="10%><th"><b>de 15 à 21 jours</b></th></td>
              <td width="10%><th"><b>de 22 à 28 jours</b></th></td>
              <td width="10%><th"><b>de 29 à 90 jours</b></th></td>
              <td width="10%><th"><b>de 91 à 180 jours</b></th></td>
              <td width="10%><th"><b>plus de 180 jours</b></th></td>
              <td width="10%><th"><b>Total</b></th></td>

              </tr>
              </thead>
              <tbody>
              <?php

              while ($donnees = $reqPeople->fetch())
            {
              $reqLessAWeek = getSupportsEnCours($bdd, $donnees['handler_id'],'user',0,7);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 7 jours et 14 jours */
			  $req7To14 = getSupportsEnCours($bdd, $donnees['handler_id'],'user',7,14);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 15 jours et 21 jours */
			  $req15To21 = getSupportsEnCours($bdd, $donnees['handler_id'],'user',15,21);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 22 jours et 28 jours */
			  $req22To28 = getSupportsEnCours($bdd, $donnees['handler_id'],'user',22,28);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 29 jours et 90 jours */
			  $req29To90 = getSupportsEnCours($bdd, $donnees['handler_id'],'user',29,90);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 91 jours et 180 jours */
			  $req91To180 = getSupportsEnCours($bdd, $donnees['handler_id'],'user',91,180);
			  /* Recuperation du nombre d'occurence du projet en cours qui ont plus de 180 jours */
			  $reqPlus180 = getSupportsEnCours($bdd, $donnees['handler_id'],'user',180,999);
			  /* Recuperation du total */
			   $reqTotal = getSupportsEnCours($bdd, $donnees['handler_id'],'user',0,999);

			   echo "<tr>";
			    /* Inscription du nom du projet */
			    echo "<td>".$donnees['username']."</td>";
				/* Inscription du nombre de ticket de moins d'une semaine */
				$buffData = $reqLessAWeek;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 7 à 14 jours */
				$buffData = $req7To14;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 15 à 21 jours */
				$buffData = $req15To21;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 22 à 28 jours */
				$buffData = $req22To28;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 29 à 90 jours */
				$buffData = $req29To90;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de 91 à 180 jours */
				$buffData = $req91To180;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket de plus de 180 jours */
				$buffData = $reqPlus180;
				echo "<td>".$buffData['NB']."</td>";
				/* Inscription du nombre de ticket total */
				$buffData = $reqTotal;
				echo "<td>".$buffData['NB']."</td>";

			  echo "</tr>\n"; 

			}
               
              ?>
              </tbody>
	</table>
          </div>
            <div class="contenu_onglet" id="contenu_onglet_Tab3">
              <table>
              	<caption><br><h2>Nombre de supports en cours par projet et par état</h2></caption>
              	<thead>
              	  	<tr><br>
              		<td width="10%><th"><b>Années de dépôt</b></th></td>
              		<td width="10%><th"><b>Affecté</b></th></td>
              		<td width="10%><th"><b>Accepté</b></th></td>
              		<td width="10%><th"><b>Confirmé</b></th></td>
              		<td width="10%><th"><b>Précision requises</b></th></td>
              		<td width="10%><th"><b>Résolu</b></th></td>
              		<td width="10%><th"><b>Fermé</b></th></td>
              		<td width="10%><th"><b>Total général</b></th></td>
              		</tr>
                </thead>

                <tbody>
                	<?php

                	while ($donnees = $reqDate->fetch()) 

                	{	
                		/*Affiche les supports affectés */
                		$reqAffected = getEtatSupp($bdd, $donnees['DATES'], 50);
                		/*Affiche les supports acceptés */
                		$reqAccepted = getEtatSupp($bdd, $donnees['DATES'], 30);
                		/*Affiche les supports confirmés */
                		$reqConfirmed= getEtatSupp($bdd, $donnees['DATES'],40);
                		/*Affiche les supports qui requiert des précisions */
                		$reqPrecision=getEtatSupp($bdd, $donnees['DATES'],20);
                		/*Affiche les supports résolu */
                		$reqSolved=getEtatSupp($bdd, $donnees['DATES'],80);
                		/*Affiche les supports fermés */
                		$reqClosed=getEtatSupp($bdd, $donnees['DATES'],90);

                		$reqTotalG = getTotalG($bdd, $donnees['DATES']);
                		//$reqEachTotal = getEachTotal($bdd, $donnees['DATES']);


 				
          
                		
                		echo "<tr>";
			    		
			    		echo "<td>".$donnees['DATES']."</td>";
			    		$buffData = $reqAffected;
						echo "<td>".$buffData['EtatSupp'] ."</td>";
						$buffData = $reqAccepted;
						echo "<td>".$buffData['EtatSupp']."</td>";
						$buffData = $reqConfirmed;
						echo "<td>".$buffData['EtatSupp']."</td>";
						$buffData = $reqPrecision;
						echo "<td>".$buffData['EtatSupp']."</td>";
						$buffData = $reqSolved;
						echo "<td>".$buffData['EtatSupp']."</td>";
						$buffData = $reqClosed;
						echo "<td>".$buffData['EtatSupp']."</td>";
						$buffData = $reqTotalG;
						echo "<td>".$buffData['TotalG']."</td>";



						echo "</tr>";	
							
			    		
                	}



                	  ?>
                </tbody>
                </table>
            </div>
            	<div class="contenu_onglet" id="contenu_onglet_Tab4">
              <table>
              	<caption><br><h2>Nombre de supports déposés par mois et par projet sur les 12 derniers mois</h2></caption>
              	<thead>
              		<?php
              	  	echo"<tr>";
              	  	echo "<td><b>Projets</b></td>";
              		
              		while ($donnees = $reqMonths ->fetch())
              		{	
              			echo "<th>";

			    		echo "<td width = 10% border-spacing= 5px>".$donnees['MOIS']."</td>";
			    		echo "</th>";
			    	}

              		echo "</tr>";
              		?>
                </thead>
                <tbody>
                	<?php
                	while  ($donnees = $reqProjectList1->fetch())
                	{
                		$reqJanuary = getMonthSupp($bdd, $donnees['id'], 1, 2019);
                		$reqFebuary = getMonthSupp($bdd, $donnees['id'], 2, 2019);
                		$reqMarch = getMonthSupp($bdd, $donnees['id'], 3, 2019);
                		$reqApril = getMonthSupp($bdd, $donnees['id'], 4, 2019);
                		$reqMay = getMonthSupp($bdd, $donnees['id'], 5, 2019);
                		$reqJune = getMonthSupp($bdd, $donnees['id'], 6, 2019);
                		$reqJuly = getMonthSupp($bdd, $donnees['id'], 7, 2019);
                		$reqAugust = getMonthSupp($bdd, $donnees['id'], 8, 2019);
                		$reqSeptember = getMonthSupp($bdd, $donnees['id'], 9, 2019);
                		$reqOctober = getMonthSupp($bdd, $donnees['id'], 10, 2019);
                		$reqNovember = getMonthSupp($bdd, $donnees['id'], 11, 2019);
                		$reqDecember = getMonthSupp($bdd, $donnees['id'], 12, 2019);



                		echo "<tr width = 10% border-spacing= 5px>";

			    		echo "<td>".$donnees['name']."</td>";
			    		$buffData = $reqJanuary;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqFebuary;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqMarch;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqApril;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqMay;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqJune;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqJuly;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqAugust;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqSeptember;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqOctober;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqNovember;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

						$buffData = $reqDecember;
						echo "<td>".$buffData['SuppMonths'] ."</td>";

					
			    		echo "</tr>";
					} 





                	?>
                	






                </tbody>

        </div>
    </div>

</body>
</html>