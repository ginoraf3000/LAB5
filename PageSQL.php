<?php
$base = mysql_connect ('127.0.0.1', 'root', 'admin123') or die("Impossible de se connecter : " . mysql_error());
mysql_select_db ('Lab5', $base) or die("Impossible de se sélectionner la base de données : " . mysql_error());

$sql = "SELECT contenue FROM Page Where idPage = 1";
$reponse = mysql_query($sql);
$ligne = mysql_fetch_array($reponse);
echo $ligne['contenue'];