


<!DOCTYPE html>
<html lang="fr">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" title="CSS" href="/CSS/style.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="/js/loading_query.js"></script>
  	<script type="text/javascript" src="/js/onglet.js"></script>
  	<script type="text/javascript" src="/js/fixed_header.js"></script>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="	sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="  	sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="  	sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  
<head>
	
	<title>TabStats</title>

	<!-- Tab links -->
		<div class="tab">
		  <button class="tablinks" onclick="ChangeTab(event, 'Tab1');">Tableau 1</button>
		  <button class="tablinks" onclick="ChangeTab(event, 'Tab2');">Tableau 2</button>
		  <button class="tablinks" onclick="ChangeTab(event, 'Tab3');">Tableau 3</button>
		  <button class="tablinks" onclick="ChangeTab(event, 'Tab4');">Tableau 4</button>
		</div>

</head>
  
<body>

<script>jQuery(window).load(function(){ jQuery('.loader').fadeOut("200"); });</script>

<div class="loader">
<h3>Loading, please wait</h3>
</div>




        <div id="Tab1" class="tabcontent">
        	<div id="boxTab1" class="box-sizing">
  			<h3><br>Nombre de supports en cours par projet et par état<br><br></h3>
              </div>
              <table>
              	
              <thead>
              <tr>
              <td width="10%>"><b>Projets</b></th></td>
              <td width="10%>"><b>7 jours et moins</b></td>
              <td width="10%>"><b>de 7 à 14 jours</b></td>
              <td width="10%>"><b>de 15 à 21 jours</b></td>
              <td width="10%>"><b>de 22 à 28 jours</b></td>
              <td width="10%>"><b>de 29 à 90 jours</b></td>
              <td width="10%>"><b>de 91 à 180 jours</b></td>
              <td width="10%>"><b>plus de 180 jours</b></td>
              <td width="10%>"><b>Total</b></td>
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


        <div id="Tab2" class="tabcontent">
        	<div id="boxTab2" class="box-sizing">
                <h3><br>Nombre de supports en cours par personne et par tranche d'ancienneté<br><br></h3>
</div>
            <table>
             
              	<thead>
              <tr>
              <td width="10%>"><b>Projets</b></th></td>
              <td width="10%>"><b>7 jours et moins</b></td>
              <td width="10%>"><b>de 7 à 14 jours</b></td>
              <td width="10%>"><b>de 15 à 21 jours</b></td>
              <td width="10%>"><b>de 22 à 28 jours</b></td>
              <td width="10%>"><b>de 29 à 90 jours</b></td>
              <td width="10%>"><b>de 91 à 180 jours</b></td>
              <td width="10%>"><b>plus de 180 jours</b></td>
              <td width="10%>"><b>Total</b></td>

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
        <div id="Tab3" class="tabcontent">

<div id="boxTab3" class="box-sizing">
  			<h3><br>Nombre de supports en cours par état et par année <br><br></h3>
  		</div>
              <table>
              	
              	<thead>
              	  	<tr><br>
              		<td width="10%"><b>Années de dépôt</b></td>
              		<td width="10%"><b>Affecté</b></td>
              		<td width="10%"><b>Accepté</b></td>
              		<td width="10%"><b>Confirmé</b></td>
              		<td width="10%"><b>Précision requises</b></td>
              		<td width="10%"><b>Résolu</b></td>
              		<td width="10%"><b>Fermé</b></td>
              		<td width="10%"><b>Total général</b></td>
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
                		/* Total */ 
                		$reqTotalG = getTotalG($bdd, $donnees['DATES'],);



                		
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

        <div id="Tab4" class="tabcontent"> 
        	<div id="boxTab4" class="box-sizing">
  			<h3><br>Nombre de supports déposés par mois et par projet sur les 12 derniers mois<br><br></h3>
  			</div>
              <table>
              	
              	<thead>
              		<?php

              	  	echo"<tr>";
              	  	echo "<td><b>Projets</b></td>";
              		
              		while ($donnees = $reqMonths ->fetch())
              		{	
              			echo "<th>";

			    		echo "<td><b>".$donnees['MOIS']."</b></td>";
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



                		echo "<tr>";

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
			</table>
        </div>
<script>
   $( document ).ready(function(){
      $('.loader').hide();/*je cache le loader après le chargement de la page*/
   });
</script>
</body>

</html>

