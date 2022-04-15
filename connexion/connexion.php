<?php
//parametres de connexion au serveur distant
$host='10.100.103.38';
/*$root="fp@mfpra_2013";
$mdp="mfp_ra_2013";*/
$user='cockpit';

$pwd="c033@ndeR";






//parametres de connexion au serveur local
/*$host='db.fonctionpublique.gouv.ci';

$user='root';

$pwd="";*/


// Parametres de connexion aux bases de données 

$db='dba_mfprasitepro';

    mysql_connect($host,$user,$pwd) or die("Impossible de se connecter au serveur");
	
    mysql_select_db($db) or die("Impossible de se connecter à la base de donnée");
	
	
/*$db2='bd_fraude';

    mysql_connect($host,$user,$pwd) or die("Impossible de se connecter au serveur");
	
    mysql_select_db($db2) or die("Impossible de se connecter à la base de donnée");
*/
?>