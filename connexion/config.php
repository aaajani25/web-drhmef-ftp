<?php 
function executerSQL($sql)
{
//Les differents variables de connexion
$hote="10.100.103.38";
/*$root="fp@mfpra_2013";
$mdp="mfp_ra_2013";*/
$root="root";
$mdp="";
$bdd="db_gespers_web";
//Paramètres de connexion

/* $hote="db.fonctionpublique.gouv.ci";
$root="root";
$mdp="";
$bdd="gestactes"; */

/* connexion au serveur MySQL */
	
$connex=mysql_connect($hote,$root,$mdp, $bdd);
if (! $connex) {
 echo "Connexion impossible au serveur Mysql";
 }
 /* connexion à la base */
else {
  $ok = mysql_select_db($bdd);
  if (! $ok)
    echo "Connexion impossible à la base";
  else  {
	 mysql_query("SET NAMES 'utf8'");		
	 $connex = mysql_query($sql); 
  }
		
	//mysql_close();
	//return $reponse;
    return $connex;
}
		
}

function executerSQL2($sql)
{
//Les differents variables de connexion
$hote="10.100.103.38";
/*$root="fp@mfpra_2013";
$mdp="mfp_ra_2013";*/
$root="cockpit";
$mdp="c033@ndeR";
$bdd="dba_mfprasitepro";
//Paramètres de connexion

/* $hote="db.fonctionpublique.gouv.ci";
$root="root";
$mdp="";
$bdd="gestactes"; */

/* connexion au serveur MySQL */
	
$connex=mysql_connect($hote,$root,$mdp, $bdd);
if (! $connex) {
 echo "Connexion impossible au serveur Mysql";
 }
 /* connexion à la base */
else {
  $ok = mysql_select_db($bdd);
  if (! $ok)
    echo "Connexion impossible à la base";
  else  {
	 mysql_query("SET NAMES 'utf8'");		
	 $connex = mysql_query($sql); 
  }
		
	//mysql_close();
	//return $reponse;
    return $connex;
}
}
function executerSQL4($sql)
{
//Les differents variables de connexion
$hote="10.100.103.38";
/*$root="fp@mfpra_2013";
$mdp="mfp_ra_2013";*/
$root="cockpit";
$mdp="c033@ndeR";
$bdd="bd_concours";
//Paramètres de connexion

/* $hote="db.fonctionpublique.gouv.ci";
$root="root";
$mdp="";
$bdd="gestactes"; */

/* connexion au serveur MySQL */
	
$connex=mysql_connect($hote,$root,$mdp, $bdd);
if (! $connex) {
 echo "Connexion impossible au serveur Mysql";
 }
 /* connexion à la base */
else {
  $ok = mysql_select_db($bdd);
  if (! $ok)
    echo "Connexion impossible à la base";
  else  {
	 mysql_query("SET NAMES 'utf8'");		
	 $connex = mysql_query($sql); 
  }
		
	//mysql_close();
	//return $reponse;
    return $connex;
}
}


?>
