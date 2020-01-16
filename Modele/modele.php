<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tabstat;charset=utf8', 'root', '');
    echo "Connexion réussie";
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reqProjectList = $bdd->query('SELECT id, name FROM mantis_project_table');
$reqProjectList1 = $bdd->query('SELECT id, name FROM mantis_project_table');
$reqPeople = $bdd->query('SELECT DISTINCT `mantis_user_table`.`realname` AS username, `mantis_bug_table`.`handler_id` as handler_id FROM `mantis_bug_table`, `mantis_user_table` WHERE `mantis_user_table`.`id` =  `mantis_bug_table`.`handler_id` AND `status` not in (80, 90)');


/* Fonctions pour TAB1 */ 
 function getSupportsEnCours($database, $id,$type, $min, $max)
{

	if($type === 'projet') 
	{
		return $database->query('SELECT COUNT(*) AS NB 	FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(	date_submitted)) > '.$min.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= '.$max.' AND `status` not in (80, 90) ')->fetch();
	} 
		elseif($type === 'user')  
		{
			return $database->query('SELECT COUNT(*) AS NB FROM `mantis_bug_table`WHERE `handler_id`='.$id.' AND DATEDIFF(	NOW(),FROM_UNIXTIME(date_submitted)) > '.$min.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= '.$max.' AND `status` 	not in (80, 90)')->fetch();
		}

}



$reqDate = $bdd -> query("SELECT DISTINCT FROM_UNIXTIME(`date_submitted`,'%Y') AS DATES FROM `mantis_bug_table` WHERE  FROM_UNIXTIME(`date_submitted`,'%Y') BETWEEN '2018' AND '2020'
	UNION SELECT '2018,2019,2020' "); 

function getEtatSupp ($database, $annee, $etat)
{

	return $database ->query("SELECT DISTINCT COUNT(*) AS EtatSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support`
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = ".$etat."
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
	
}



function GetTotalG($database, $annee)
{
	return $database ->query("SELECT DISTINCT COUNT(*)  As TotalG  
	FROM `mantis_bug_table`
    WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
    IN (".$annee.") ")->fetch();

}



$reqMonths = $bdd->query('SELECT DISTINCT MONTH(FROM_UNIXTIME(`date_submitted`)) AS MOIS FROM mantis_bug_table ORDER BY MONTH(FROM_UNIXTIME(`date_submitted`))');

function getMonthSupp($database, $id, $month, $year)
{	
	return $database ->query("SELECT  COUNT(*) AS SuppMonths FROM `mantis_bug_table` WHERE `project_id`=".$id."  AND MONTH(FROM_UNIXTIME(`date_submitted`)) = ".$month." AND YEAR(FROM_UNIXTIME(`date_submitted`)) = ".$year." ")->fetch();

}



?>