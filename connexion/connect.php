<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*$hostname_connect = "db.fonctionpublique.gouv.ci";
$database_connect = "bd_sitemfpra";
$username_connect = "root";
$password_connect = "";*/

$hostname_connect = "localhost";
$database_connect = "dba_mfprasitepro";
$username_mfpra = "root";
$password_mfpra = "";
/*$username_connect = "fp@mfpra_2013";
$password_connect = "mfp_ra_2013";*/
$connect = mysql_pconnect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
