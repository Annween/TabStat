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
$reqPeople = $bdd->query('SELECT DISTINCT `mantis_user_table`.`realname` AS username, `mantis_bug_table`.`handler_id` as handler_id FROM `mantis_bug_table`, `mantis_user_table` WHERE `mantis_user_table`.`id` =  `mantis_bug_table`.`handler_id` AND `status` not in (80, 90)');


/* Fonctions pour TAB1 */ 
 function getLastWeek($database, $id,$type)
{	if($type === 'projet') /* on met === pour éviter le transtypage */ 
	{
		return $database->query('SELECT COUNT(*) AS nbLessWeek FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 7 AND `status` not in (80, 90)')->fetch();
	}
		else 
		{
			return $database->query('SELECT COUNT(*) AS nbLessWeek FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 7 AND `status` not in (80, 90)')->fetch();

		}
}

function getFrom7To14($database, $id, $type)
{ 
	if($type === 'projet') 
	{
		return $database->query('SELECT COUNT(*) AS nbReq7To14 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 7 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 14 AND `status` not in (80, 90)')->fetch();
	} 
		else 
		{
			return $database->query('SELECT COUNT(*) AS nbReq7To14 FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 7 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 14 AND `status` not in (80, 90)')->fetch();
		}
}

function getFrom15To21($database, $id, $type)
{	
	if($type === 'projet') 
	{
		return $database->query('SELECT COUNT(*) AS nbReq15To21 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 15 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 21 AND `status` not in (80, 90)')->fetch();
	}
		else
		{
			return $database->query('SELECT COUNT(*) AS nbReq15To21 FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 15 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 21 AND `status` not in (80, 90)')->fetch();
		}
}

function getFrom22To28($database, $id,$type)
{
	if($type === 'projet') 
	{
		return $database->query('SELECT COUNT(*) AS nbReq22To28 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 22 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 28 AND `status` not in (80, 90)')->fetch();
	}
		else
		{
			return $database->query('SELECT COUNT(*) AS nbReq22To28 FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 22 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 28 AND `status` not in (80, 90)')->fetch();

		}
}

function getFrom29To90($database, $id,$type)
{
	if($type === 'projet') 
	{
		return $database->query('SELECT COUNT(*) AS nbReq29To90 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 29 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 90 AND `status` not in (80, 90)')->fetch();
	} 
		else
		{
			return $database->query('SELECT COUNT(*) AS nbReq29To90 FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 29 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 90 AND `status` not in (80, 90)')->fetch();
		}
}

function getFrom91To180($database, $id,$type)
{
	if($type === 'projet') 
	{
		return $database->query('SELECT COUNT(*) AS nbReq91To180 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 90 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 180 AND `status` not in (80, 90)')->fetch();
	}
		else
		{
			return $database->query('SELECT COUNT(*) AS nbReq91To180 FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 90 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 180 AND `status` not in (80, 90)')->fetch();
		}
}

function getMoreThan180($database, $id,$type)
{ 
	if($type === 'projet')
	{
		return $database->query('SELECT COUNT(*) AS nbReqPlus180 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 180 AND `status` not in (80, 90)')->fetch();
	}
  		else
		{
			return $database->query('SELECT COUNT(*) AS nbReqPlus180 FROM `mantis_bug_table` WHERE `handler_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 180 AND `status` not in (80, 90)')->fetch();
		}
}


function getTotal($database, $id,$type)
{ 
	if($type === 'projet')
	{
		return $database->query('SELECT COUNT(*) AS nbReqTotal FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND `mantis_bug_table`.`status` not in (80, 90)')->fetch();
	}
		else
		{
			return $database->query('SELECT DISTINCT COUNT(*) AS nbReqTotal FROM `mantis_bug_table`, `mantis_user_table` WHERE `handler_id`='.$id.' AND `mantis_user_table`.`id` =  `mantis_bug_table`.`handler_id` AND `status` not in (80, 90)')->fetch();
		}
}

$reqDate = $bdd -> query("SELECT DISTINCT FROM_UNIXTIME(`date_submitted`,'%Y') AS DATES FROM `mantis_bug_table` WHERE  FROM_UNIXTIME(`date_submitted`,'%Y') BETWEEN '2018' AND '2020'");

function getAffectedSupp ($database, $annee)
{

	return $database ->query("SELECT DISTINCT COUNT(*) AS AffectedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support`
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee."
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
	
}

function getAcceptedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS AcceptedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee." AND `status` = '30'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}

function getConfirmedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS ConfirmedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee." AND `status` = '40'
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
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee." AND `status` = '20'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}

function getSolvedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS SolvedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee." AND `status` = '80'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}



function getClosedSupp($database, $annee)
{	
		return $database ->query("SELECT DISTINCT COUNT(*) AS ClosedSupp, `etat_support`.`libelle_support` 
					      FROM `mantis_bug_table`
					      INNER JOIN `etat_support`
					      ON `mantis_bug_table`.`status` = `etat_support`.`statut_support` 
					      WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee." AND `status` = '90'
					      GROUP BY `mantis_bug_table`.`status`
					      ORDER BY `etat_support`.`id`")->fetch();
}

function GetTotalG($database, $annee)
{
	return $database ->query("SELECT DISTINCT COUNT(*)  As TotalG  
	FROM `mantis_bug_table`
    WHERE FROM_UNIXTIME(`mantis_bug_table`.`date_submitted`, '%Y') = ".$annee."")->fetch();

}

function GetEachTotal($database, $statut)
{
	return $database ->query("SELECT DISTINCT COUNT(*)  As EachTotal 
	FROM  `etat_support`
    WHERE  `etat_support`.`statut_support` = ".$statut." ")->fetch();

}