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
        </div>

        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_Tab1">
              
              <table>
              	<caption><br><h2>Nombre de supports en cours par projet et par état</h2></caption>
              	<thead>
              <tr>
              <td width="10%><th">Projets</th></td>
              <td width="10%><th">7 jours et moins</th></td>
              <td width="10%><th">de 7 à 14 jours</th></td>
              <td width="10%><th">de 15 à 21 jours</th></td>
              <td width="10%><th">de 22 à 28 jours</th></td>
              <td width="10%><th">de 29 à 90 jours</th></td>
              <td width="10%><th">de 91 à 180 jours</th></td>
              <td width="10%><th">plus de 180 jours</th></td>
              <td width="10%><th">Total</th></td>
              </tr>
              </thead>
          <tbody>
            
            <?php
            
			/* Iteration sur les projets, une ligne par projet */
            while ($donnees = $reqProjectList->fetch())
			{
			
			  $reqLessAWeek = getLastWeek($bdd, $donnees['id'], 'projet');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 7 jours et 14 jours */
			  $req7To14 = getFrom7To14($bdd, $donnees['id'], 'projet');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 15 jours et 21 jours */
			  $req15To21 = getFrom15To21($bdd, $donnees['id'], 'projet');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 22 jours et 28 jours */
			  $req22To28 = getFrom22To28($bdd, $donnees['id'], 'projet');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 29 jours et 90 jours */
			  $req29To90 = getFrom29To90($bdd, $donnees['id'], 'projet');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 91 jours et 180 jours */
			  $req91To180 = getFrom91To180($bdd, $donnees['id'], 'projet');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont plus de 180 jours */
			  $reqPlus180 = getMoreThan180($bdd, $donnees['id'], 'projet');
			  /* Recuperation du total */
			  $reqTotal = getTotal($bdd, $donnees['id'], 'projet');




			  echo "<tr>";
			    /* Inscription du nom du projet */
			    echo "<td>".$donnees['name']."</td>";
				/* Inscription du nombre de ticket de moins d'une semaine */
				$buffData = $reqLessAWeek;
				echo "<td>".$buffData['nbLessWeek']."</td>";
				/* Inscription du nombre de ticket de 7 à 14 jours */
				$buffData = $req7To14;
				echo "<td>".$buffData['nbReq7To14']."</td>";
				/* Inscription du nombre de ticket de 15 à 21 jours */
				$buffData = $req15To21;
				echo "<td>".$buffData['nbReq15To21']."</td>";
				/* Inscription du nombre de ticket de 22 à 28 jours */
				$buffData = $req22To28;
				echo "<td>".$buffData['nbReq22To28']."</td>";
				/* Inscription du nombre de ticket de 29 à 90 jours */
				$buffData = $req29To90;
				echo "<td>".$buffData['nbReq29To90']."</td>";
				/* Inscription du nombre de ticket de 91 à 180 jours */
				$buffData = $req91To180;
				echo "<td>".$buffData['nbReq91To180']."</td>";
				/* Inscription du nombre de ticket de plus de 180 jours */
				$buffData = $reqPlus180;
				echo "<td>".$buffData['nbReqPlus180']."</td>";
				/* Inscription du nombre de ticket total */
				$buffData = $reqTotal;
				echo "<td>".$buffData['nbReqTotal']."</td>";

			  echo "</tr>\n";
			} 
            
            ?>
           		</tbody>
           </table>

            </div>



           <div class="contenu_onglet" id="contenu_onglet_Tab2">
                <h1></h1>

            <table>
              	<caption><br><h2>Nombre de supports en cours par personne et par tranche d'ancienneté </h2></caption>
              	<thead>
              <tr>
              <td width="10%><th">Projets</th></td>
              <td width="10%><th">7 jours et moins</th></td>
              <td width="10%><th">de 7 à 14 jours</th></td>
              <td width="10%><th">de 15 à 21 jours</th></td>
              <td width="10%><th">de 22 à 28 jours</th></td>
              <td width="10%><th">de 29 à 90 jours</th></td>
              <td width="10%><th">de 91 à 180 jours</th></td>
              <td width="10%><th">plus de 180 jours</th></td>
              <td width="10%><th">Total</th></td>

              </tr>
              </thead>
              <tbody>
              <?php

              while ($donnees = $reqPeople->fetch())
            {
              $reqLessAWeek = getLastWeek($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 7 jours et 14 jours */
			  $req7To14 = getFrom7To14($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 15 jours et 21 jours */
			  $req15To21 = getFrom15To21($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 22 jours et 28 jours */
			  $req22To28 = getFrom22To28($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 29 jours et 90 jours */
			  $req29To90 = getFrom29To90($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont entre 91 jours et 180 jours */
			  $req91To180 = getFrom91To180($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du nombre d'occurence du projet en cours qui ont plus de 180 jours */
			  $reqPlus180 = getMoreThan180($bdd, $donnees['handler_id'],'user');
			  /* Recuperation du total */
			   $reqTotal = getTotal($bdd, $donnees['handler_id'],'user');

			   echo "<tr>";
			    /* Inscription du nom du projet */
			    echo "<td>".$donnees['username']."</td>";
				/* Inscription du nombre de ticket de moins d'une semaine */
				$buffData = $reqLessAWeek;
				echo "<td>".$buffData['nbLessWeek']."</td>";
				/* Inscription du nombre de ticket de 7 à 14 jours */
				$buffData = $req7To14;
				echo "<td>".$buffData['nbReq7To14']."</td>";
				/* Inscription du nombre de ticket de 15 à 21 jours */
				$buffData = $req15To21;
				echo "<td>".$buffData['nbReq15To21']."</td>";
				/* Inscription du nombre de ticket de 22 à 28 jours */
				$buffData = $req22To28;
				echo "<td>".$buffData['nbReq22To28']."</td>";
				/* Inscription du nombre de ticket de 29 à 90 jours */
				$buffData = $req29To90;
				echo "<td>".$buffData['nbReq29To90']."</td>";
				/* Inscription du nombre de ticket de 91 à 180 jours */
				$buffData = $req91To180;
				echo "<td>".$buffData['nbReq91To180']."</td>";
				/* Inscription du nombre de ticket de plus de 180 jours */
				$buffData = $reqPlus180;
				echo "<td>".$buffData['nbReqPlus180']."</td>";
				/* Inscription du nombre de ticket total */
				$buffData = $reqTotal;
				echo "<td>".$buffData['nbReqTotal']."</td>";

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
              		<td width="10%><th">Années de dépôt</th></td>
              		<td width="10%><th">Affecté</th></td>
              		<td width="10%><th">Accepté</th></td>
              		<td width="10%><th">Confirmé</th></td>
              		<td width="10%><th">Précision requises</th></td>
              		<td width="10%><th">Résolu</th></td>
              		<td width="10%><th">Fermé</th></td>
              		<td width="10%><th">Total général</th></td>
              		</tr>
                </thead>

                <tbody>
                	<?php

                	while ($donnees = $reqDate->fetch())
                	{	
                		/*Affiche les supports affectés */
                		$reqAffected = getAffectedSupp($bdd, $donnees['DATES']);
                		/*Affiche les supports acceptés */
                		$reqAccepted = getAcceptedSupp($bdd, $donnees['DATES']);
                		/*Affiche les supports confirmés */
                		$reqConfirmed= getConfirmedSupp($bdd, $donnees['DATES']);
                		/*Affiche les supports qui requiert des précisions */
                		$reqPrecision=getPrecisionSupp($bdd, $donnees['DATES']);
                		/*Affiche les supports résolu */
                		$reqSolved=getSolvedSupp($bdd, $donnees['DATES']);
                		/*Affiche les supports fermés */
                		$reqClosed=getClosedSupp($bdd, $donnees['DATES']);

                		$reqTotalG = getTotalG($bdd, $donnees['DATES']);
                		$reqEachTotal = getEachTotal($bdd, $donnees['DATES']);



                		echo "<tr>";
			    		
			    		echo "<td>".$donnees['DATES']."</td>";
			    		$buffData = $reqAffected;
						echo "<td>".$buffData['AffectedSupp'] ."</td>";
						$buffData = $reqAccepted;
						echo "<td>".$buffData['AcceptedSupp']."</td>";
						$buffData = $reqConfirmed;
						echo "<td>".$buffData['ConfirmedSupp']."</td>";
						$buffData = $reqPrecision;
						echo "<td>".$buffData['PrecisionSupp']."</td>";
						$buffData = $reqSolved;
						echo "<td>".$buffData['SolvedSupp']."</td>";
						$buffData = $reqClosed;
						echo "<td>".$buffData['ClosedSupp']."</td>";
						$buffData = $reqTotalG;
						echo "<td>".$buffData['TotalG']."</td>";



						echo "</tr>";		
			    		
                	}
                	echo "<tr>";
			    		$buffData = $reqEachTotal;
						echo '<td width = "10%"> Total'.$buffData['EachTotal']."</td>"."<tr>";
					echo "</tr>";








                	  ?>
                </tbody>
            </div>
        </div>
    </div>

</body>
</html>