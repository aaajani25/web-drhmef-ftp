


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bulletin de Notation</title>
<!--<link href="css.css" rel="stylesheet" type="text/css" />-->
<style type="text/css">
.notation{
	font-family:"Segoe UI";
	font-size:20px;
	font-weight:lighter;
	color:#60a917;
}
.date{
	font-family:"Segoe UI";
	font-size:30px;
	font-weight: bold;
	color:#60a917;
}
.titre{
	font-family:"Segoe UI";
	font-size:16px;
	font-weight: lighter;
	color:#fff;
}
.contenu{
	font-family:"Segoe UI";
	font-size:12px;
	color:#000;
	font-weight: lighter;
}
.contenub{
	font-family:"Segoe UI";
	font-size:12px;
	color:#000;
	font-weight:bold;
}
.contenul{
	font-family:"Segoe UI";
	font-size:12px;
	color:#000;
	font-weight:bold;
	font-style:italic;
}
</style>
<script language="javascript">
//impresssion
function imprime()
{
	window.print() ;
}  
</script>
</head>

<body onload="imprime();">
<form id="form1" name="form1" method="post" action="">
  <table width="680" border="0" align="center" >
    <tr>
      <td width="642" height="803" valign="top">
        <!--<table width="648" border="0" align="center">
          <tr>
            <td width="479" align="center"><table width="434" border="0" align="center">
              <tr>
                <td width="428" align="center"><img src="../images/bulletin-head.jpg" width="269" height="66" /></td>
              </tr>
            </table>
            <span class="notation">NOTATION EN LIGNE </span><span class="date"><?php //echo date('Y')-1; ?></span></td>
            <td width="119" height="114" align="center"><?php //echo $img_photo ?></td>
          </tr>
      </table>-->
      <table width="648" border="0" align="center">
  <tr>
    <td width="479" align="center"><img src="../images/bulletin-head.jpg" width="269" height="66" />
    <br />
<span class="notation">NOTATION EN LIGNE </span><span class="date"><?php echo $annee; ?></span></td>
    <td width="119" height="114" align="center"><img src="<?php echo base_url('assets/espace_fon/photos/'.$this->session->userdata('photo')) ?>" alt="aucune photo" width="150" height="150" /></td>
  </tr>
</table>

   
      <table width="641" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="635" height="35" bgcolor="#60a917"><!--&nbsp;<span class="titre">INFORMATION SUR L'AGENT</span>--><img src="../images/info_agt.jpg" /></td>
        </tr>
        <tr>
          <td><table width="625" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="143"><span class="contenu">Matricule:</span></td>
              <td width="472"><span class="contenub"><?php echo $this->session->userdata('MATRICULE') ?></span></td>
            </tr>
            <tr>
              <td><span class="contenu">Nom et prénoms:</span></td>
              <td><span class="contenub"><?php  echo $this->session->userdata('NOM'); echo '&nbsp;'; echo $this->session->userdata('PRENOMS').''.$this->session->userdata('NOMJFILLE'); ?></span></td>
            </tr>
            <tr>
              <td><span class="contenu">Emploi:</span></td>
              <td><span class="contenub"><?php echo $this->session->userdata('EMPLOI') ?></span></td>
            </tr>
            <tr>
              <td><span class="contenu">Structrue:</span></td>
              <td><span class="contenub"><?php echo ($str);?></span></td>
            </tr>
            <?php /*?><tr>
              <td><span class="contenu">Service:</span></td>
              <td><span class="contenub"><?php echo $crii_1['fonction1'];?></span></td>
            </tr><?php */?>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="641" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="35" bgcolor="#60a917"><!--&nbsp;<span class="titre">SUPERIEUR HIERARCHIQUE1</span>--><img src="../images/sup1.jpg" /></td>
        </tr>
        <tr>
          <td><table width="625" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="143"><span class="contenu">Nom et prénoms :</span></td>
              <td width="472"><span class="contenub"><?php echo $info_nom[0];//echo $suph;?></span></td>
            </tr>
            <tr>
              <td><span class="contenu">Fonction :</span></td>
              <td><span class="contenub"><?php echo $info_nom[1]; //echo($suphfon);?></span></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="641" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="35" bgcolor="#60a917"><!--&nbsp;<span class="titre">SUPERIEUR HIERARCHIQUE2</span>--><img src="../images/sup2.jpg" /></td>
        </tr>
        <tr>
          <td><table width="625" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="143"><span class="contenu">Nom et prénoms :</span></td>
              <td width="472"><span class="contenub"><?php echo $info_nom[2];//echo $valideur ?></span></td>
            </tr>
            <tr>
              <td><span class="contenu">Fonction :</span></td>
              <td><span class="contenub"><?php echo $info_nom[3]; //echo $valideurfon ?></span></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <br />
      <table width="641" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><span class="contenul">1 = mauvais, 2 = insufisant, 3 = bon, 4 = tr&egrave;s bon, 5 = exceptionnel.</span></td>
        </tr>
        <!--<tr>
          <td><span class="titrnoir">I. - APPRECIATIONS DETAILLEES ET NOTES CHIFFREES</span></td>
        </tr>-->
        <tr>
          <td height="328"><table width="625" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" colspan="3" align="left" bgcolor="#60A917"><!--&nbsp;<span class="titre">APPRECIATIONS DETAILLEES<sub>(COTATION DE 1 A 5)</sub></span>--><img src="../images/appreciation.jpg" /></td>
              </tr>
            <tr>
              <td width="350">&nbsp;</td>
              <td width="137" height="25" bgcolor="#c4f295">Note du Supérieur1</td>
              <td width="138" bgcolor="#C4F295">Note du Supérieur2</td>
            </tr>
            <?php  while($ln = mysql_fetch_array($result)){?>
            <tr>
              <td align="left" class="contenu"><?php echo '<b>'.($ln['lib_critere']).'</b>';
			if($ln['id_critere']==1){
						$coef_max=20;
						//$coef_min=4;
						 echo ' <br><i> &nbsp; &nbsp;&nbsp;&nbsp;Sens des responsabilités </i><br>
							  &nbsp;&nbsp;&nbsp;&nbsp;<i>Sens du service public</i> <br>
							  &nbsp;&nbsp;&nbsp;&nbsp;<i>Sens social, sens des relations humaines </i><br>
							  &nbsp;&nbsp;&nbsp;<i>Tenue et présentation</i>';
					}
					elseif($ln['id_critere']==2) {
						$coef_max=15;
						//$coef_min=3;
				   		 echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><i> &nbsp;&nbsp; &nbsp;&nbsp;Esprit d\' initiative</i><br>
							&nbsp;&nbsp;&nbsp;&nbsp;<i>Connaissances et aptitudes professionnelles</i><br>
							&nbsp;&nbsp;&nbsp;&nbsp;<i>Puissance de travail et rendement</i>';
					}
					elseif($ln['id_critere']==3) {
						 $coef_max=10;
						// $coef_min=2;
				   		 echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><i> &nbsp;&nbsp; &nbsp;&nbsp;Civisme, intégrité et moralité</i><br>
						 	  &nbsp;&nbsp;&nbsp;&nbsp;<i>Esprit de discipline</i>';
						
					}
					elseif($ln['id_critere']==9){
						$coef_max=5;
					} 
			
			  ?> </td>
              <td align="center" valign="top" bgcolor="#FBFBFB"><span class="contenub"><?php echo ($ln['note_sup1']."/".$coef_max);?></span></td>
              <td align="center" valign="top" bgcolor="#FBFBFB"><span class="contenub"><?php echo ($ln['note_valideur']."/".$coef_max);?></span></td>
            </tr>
            <?php
			$total = $ln['total'];
		$note_chiffre = $ln['note_chiffre'];
		$appreciation_sup1 = stripslashes($ln['appreciation_sup']);
		$avancement_sup1 = stripslashes($ln['avancement_sup']);
		
		$total2 = $ln['total_sup2'];
		$note_chiffre2 = $ln['note_chiffre_sup2'];
		$appreciation_sup2 = stripslashes($ln['appreciation_sup']);
		$avancement_sup2 = stripslashes($ln['avancement_sup']); }?>
            <tr>
              <td align="left"><span class="contenu">Total:</span></td>
              <td align="center" bgcolor="#FBFBFB"><span class="contenub"><?php echo $total?></span></td>
              <td align="center" bgcolor="#FBFBFB"><span class="contenub"><?php echo $total2 ;?></span></td>
            </tr>
            <tr>
              <td align="left"><span class="contenu">Note chiffre:</span></td>
              <td align="center" bgcolor="#FBFBFB"><span class="contenub"><?php echo ($note_chiffre);?></span></td>
              <td align="center" bgcolor="#FBFBFB"><span class="contenub"><?php echo ($note_chiffre2);?></span></td>
            </tr>
          </table>
            <br />
            <table width="625" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#C4F295" class="contenu">Appreciation du sup&eacute;rieur1: </td>
                <td align="left" bgcolor="#C4F295" class="contenu">Appreciation du sup&eacute;rieur2 :</td>
              </tr>
              <tr>
                <td><span class="contenub"><?php echo $appreciation_sup1 ?></span></td>
                <td align="left"><span class="contenub"><?php echo $appreciation_sup2 ?></span></td>
              </tr>
              <tr class="text_g">
                <td bgcolor="#C4F295"><span class="contenu">Proposition du superieur1</span></td>
                <td align="left" bgcolor="#C4F295"><span class="contenu">Proposition du supérieur2</span></td>
              </tr>
              <tr>
                <td><span class="contenub"><?php echo html_entity_decode($avancement_sup1); ?></span>&nbsp;</td>
                <td align="left"><span class="contenub"><?php echo html_entity_decode($avancement_sup2); ?></span>&nbsp;<br /></td>
              </tr>
             <tr>
             	<td height="36">&nbsp;</td>
                <td><br /><div style="text-align:center; margin:auto; width:300px; font-family:'Segoe UI'; font-size:12px;" class="contenub"><?php echo $drh_info[1]; ?><br />

<?php if($matricule=='355136V') { echo 'KODJO SYLVIE CLOTILDE'; } else { echo $drh_info[0]; }?></div></td>
             </tr>
             <tr>
             	<td></td>
                <td align="right" height="51">&nbsp;</td>
             </tr>
            </table>
           
            <table width="625" border="0" align="center" cellpadding="0" cellspacing="0">
             
              <tr>
                <td width="308" height="40" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="21" align="left" valign="bottom"><?php echo "<img src=php_codebare.php?type=KIX&code=$matricule&height=80";?></td>
                  </tr>
                </table>
                  </td>
                <td width="307" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right"><span class="contenul">Abidjan, le <?php echo date(j.'/'.m.'/'.Y); ?></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table>
            </td>
        </tr>
      </table></td>
    </tr>
  </table>
  </td>
    </tr>
  </table>
</form>
<?php 
if($_POST['ok']=='imprimer')
{
    $sql="UPDATE `notation2` SET `codebar` = '".varcode(10)."' WHERE `agentmatricule`='".$matricule."'";
	$result=$instance->executeSQL($sql);
}
?>
</body>
</html>