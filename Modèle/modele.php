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

?>