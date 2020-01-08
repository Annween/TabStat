<?php

try
	{
	    $db = new PDO('mysql:host=localhost;dbname=tabstat;charset=utf8', 'root', '');
	    echo "Connexion réussie";
	}
catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	

$req = $db->query('SELECT name AS PROJETS, id FROM mantis_project_table');
	$req2 = $db->query('SELECT name AS PROJETS, id FROM mantis_project_table');
	
function comptage($id) { $req1 = query("SELECT project_id, tranche_delai, count(*) as count
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
}
	


	

?>

