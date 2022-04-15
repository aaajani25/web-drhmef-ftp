<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/* 
$hostname_mfpra = "db.fonctionpublique.gouv.ci";
$database_mfpra = "bd_sitemfpra";
$username_mfpra = "root";
$password_mfpra = ""; */ 

$hostname_mfpra = "10.100.103.38";
$database_mfpra = "dba_mfprasitepro";
$username_mfpra = "cockpit";
$password_mfpra = "c033@ndeR"; 



$mfpra = mysql_pconnect($hostname_mfpra, $username_mfpra, $password_mfpra) or trigger_error(mysql_error(),E_USER_ERROR); 
?>