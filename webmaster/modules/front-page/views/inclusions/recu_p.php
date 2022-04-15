<?php 
// logo                                              
	$logo = $this->nav_mod->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// armoirie                                              
	$armoirie = $this->nav_mod->read_row_l
	(
		'_armoirie',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- armoirie

 // annuaire                                              
	$annuaire = $this->nav_mod->read_row_l
	(
		'_annuaire',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- annuaire

function date_jour($frdate){
  //$frdate="02/02/2009";
  $joursem = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  //$mois = array(0,"Janvier", "Fevrier", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  $var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
//$dat=explode('-',$frdate);

  // extraction des jour, mois, an de la date
  list($annee, $mois,$jour ) = explode('-', $frdate);
  $moisj=$var[intval($mois)];
  // calcul du timestamp
  $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
  // affichage du jour de la semaine
  $datejm=$joursem[date("w",$timestamp)].' '.$jour.' '.$moisj.' '.$annee;
  return $datejm;
  
 } 
?>
<style type="text/css">
.libel { 
 font-size:15px;
 font-weight:lighter;
 color:#000;
}
.titre { 
 font-size:25px;
 font-weight:lighter;
 color:#000;
 height:82px;
 width:350px;
 border:1px solid #000;
 margin:auto;
 text-align:center;
 vertical-align:middle;
 padding-top:40px;
}
</style>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td height="533" align="center" valign="top">
      <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
       <tr>
          <td>
          
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="30%" align="left" valign="middle"><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>"></td>
              
              <td width="60%" align="center" valign="middle"> </td>
              
              <td width="30%" align="right" valign="middle"><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>"></td>
            </tr>                     
            </table>
            
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">          
            <tr>          
                <td width="414" height="36" align="center" valign="middle" bgcolor="#CCCCCC"><h3>DEMANDE D'ACTE EN LIGNE</h3></td>  
              </tr>            
            </table>
            
          </td>
        </tr>
        <tr>
          <td class="print_titre"> </td>
        </tr>
        <tr>
          <td height="245" align="center"><table width="100%" height="210" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="210" align="center" valign="top">
              <table width="100%"  align="center" cellpadding="2" cellspacing="2" style="border:dashed 1px #000; width:100%; padding:10px;">
                <tr>
                  <td height="34" colspan="2" align="left" valign="top"><span class="libel">RECU N° </span><span style="font-weight:bold;  font-size:20px;"> <?php echo $tab['NUM_RECU'].'/'.$tab['NATURE_CODE'];?></span></td>
                  </tr>
                  <?php if(!empty($tab['MATAGENT'])){?>
                <tr>
                  <td width="32%" height="34" align="left" valign="top"><span class="libel">Identifiant :</span></td>
                  <td width="68%" height="34" align="left" valign="top"><span class="libel"><span style="font-weight:bold;  font-size:16px;"><?php echo $tab['MATAGENT'] ?></span></span></td>
                </tr>
                <?php }?>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Nom et Prénoms :</span></td>
                  <td height="34" align="left" valign="top"><span class="libel"><span style="font-weight:bold;  font-size:16px;"><?php echo html_entity_decode($tab['NOM_PRENOMS']); ?></span></span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Nature de l'Acte :</span></td>
                  <td height="34" align="left" valign="top"><span class="libel"><span style="font-weight:bold;  font-size:16px;"><?php echo $tab['TYPE_ACTE'];?></span></span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Date de Rendez-vous :</span></td>
                  <td height="34" align="left" valign="top"><span class="libel"><span style="font-weight:bold;  font-size:16px;">
                    <?php 
   /* $da=explode("-",$tab_demande['DATE_RDV']) ;
   $rdv=$da[2].'/'.$da[1].'/'.$da[0]; */
    //$date=date('d/m/Y',strtotime($tab_demande['DATE_RDV']));
    echo  date_jour($tab['DATE_RDV']);
   //echo $tab_demande['DATE_RDV'];
   ?>
    </span></span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Nombres de copies :</span></td>
                  <td height="17" align="left" valign="top"><span style="font-weight:bold;  font-size:16px;"><?php echo $tab['COPIE'];?></span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Montant à payer :</span></td>
                  <td height="17" align="left" valign="top"><span style="font-weight:bold;  font-size:16px;"><?php echo $tab['MONTANT']*$tab['COPIE'];?></span></td>
                </tr>
                <tr>
                  <td height="34" colspan="2" align="right" valign="top"><?php echo date('d/m/Y',time()+30900); ?></td>
                </tr>
              </table></td>
            </tr>
          </table>
   <br />
   <span style="font-size:12px; font-weight:lighter;">
          www.fonctionpublique.gouv.ci / Standard : 20 25 90 00 / Call Center : 20 25 90 22  / Fax : 20 22 78 18   </span></td>
        </tr>
        <tr>
          <td class="print_titre"> </td>
        </tr>
      </table></td>
    </tr>
  </table>