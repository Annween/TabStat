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
		return $database->query('SELECT COUNT(*) AS NB FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > '.$min.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= '.$max.' AND `status` not in (80, 90)')->fetch();
	} 
		elseif($type === 'user')  
		{
			return $database->query('SELECT COUNT(*) AS NB FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > '.$min.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= '.$max.' AND `status` not in (80, 90)')->fetch();
		}
}




$reqDate = $bdd -> query("SELECT DISTINCT FROM_UNIXTIME(`date_submitted`,'%Y') AS DATES FROM `mantis_bug_table` WHERE  FROM_UNIXTIME(`date_submitted`,'%Y') BETWEEN '2018' AND '2020'
	UNION SELECT '2018,2019,2020' "); 

function getAffectedSupp ($database, $annee)
{

	return $database ->query("SELECT DISTINCT COUNT(*) AS AffectedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support`
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = '50'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
	
}

function getAcceptedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS AcceptedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = '30'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}

function getConfirmedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS ConfirmedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = '40'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`
					      ")->fetch();
}

function getPrecisionSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS PrecisionSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = '20'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}

function getSolvedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS SolvedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = '80'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}



function getClosedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS ClosedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') 
					      IN (".$annee.") AND `status` = '90'
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

function getJanuary($database, $id)
{	
	return $database ->query("SELECT  COUNT(*) AS JANVIER FROM `mantis_bug_table` WHERE `project_id`=".$id."  AND MONTH(FROM_UNIXTIME(`date_submitted`)) = '1' AND YEAR(FROM_UNIXTIME(`date_submitted`)) = '2019' ")->fetch();

}

function FunctionName($value='')
{
	# code...
}


?>