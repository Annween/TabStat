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



 function getLastWeek($database, $id)
{
  return $database->query('SELECT COUNT(*) AS nbLessWeek FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 7')->fetch();
}

function getFrom7To14($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReq7To14 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 7 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 14')->fetch();
}

function getFrom15To21($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReq15To21 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 15 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 21')->fetch();
}

function getFrom22To28($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReq22To28 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 22 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 28')->fetch();
}

function getFrom29To90($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReq29To90 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 29 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 90')->fetch();
}

function getFrom91To180($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReq91To180 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 90 AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <= 180')->fetch();
}

function getMoreThan180($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReqPlus180 FROM `mantis_bug_table` WHERE `project_id`='.$id.' AND DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) > 180')->fetch();
}

<<<<<<< HEAD
function getTotal($database, $id)
{
	return $database->query('SELECT COUNT(*) AS nbReqTotal FROM `mantis_bug_table` WHERE `project_id`='.$id.'')->fetch();
=======
$req = $db->query('SELECT name AS PROJETS, id FROM mantis_project_table');
	$req2 = $db->query('SELECT name AS PROJETS, id FROM mantis_project_table');
	
function comptage($id) { global $db;
	$req1 = $db->query("SELECT project_id, tranche_delai, count(*) as count
							FROM (SELECT id, project_id, DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) as DELAI, 
										CASE WHEN DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <=7 THEN 'Moins 7'
											WHEN DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <=14 THEN '8-14'
											WHEN DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <=21 THEN '15-21'
											WHEN DATEDIFF(NOW(),FROM_UNIXTIME(date_submitted)) <=28 THEN '22-28'
											ELSE 'autre' END as tranche_delai
									FROM mantis_bug_table 
									WHERE status not in (80, 90) ) a
					GROUP BY a.project_id, a.tranche_delai
					WHERE a.project_id = $id");
		return $req1;
>>>>>>> 2b7a09953a6e639411c39833f346b503f4bdbfc4
}




?>