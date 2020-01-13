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
		return $database->query('SELECT COUNT(*) AS nbReqTotal FROM `mantis_bug_table` WHERE `project_id`='.$id.'')->fetch();
	}
		else
		{
			return $database->query('SELECT DISTINCT COUNT(*) AS nbReqTotal FROM `mantis_bug_table`, `mantis_user_table` WHERE `handler_id`='.$id.' AND `mantis_user_table`.`id` =  `mantis_bug_table`.`handler_id` AND `status` not in (80, 90)')->fetch();
		}
}

$reqDate = $bdd -> query("SELECT DISTINCT FROM_UNIXTIME(`date_submitted`,'%Y') AS DATES FROM `mantis_bug_table` WHERE  FROM_UNIXTIME(`date_submitted`,'%Y') BETWEEN '2018' AND '2020'");

function get2018 ($database)
{
	return $database ->query('SELECT DISTINCT `e.libelle_support` COUNT(*) AS Year2018 FROM `mantis_bug_table` `b` INNER JOIN `etat_support` `e` ON `b.status` = `e.statut_support` WHERE FROM_UNIXTIME(`b.date_submitted`,`%Y`) = 2018 GROUP BY `b.status` ORDER BY `e.id`')->fetch(); 
}





?>