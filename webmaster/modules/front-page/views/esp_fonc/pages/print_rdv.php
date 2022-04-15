<?php
// logo                                              
	$logo = $this->espace_mod->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// armoirie                                              
	$armoirie = $this->espace_mod->read_row_l
	(
		'_armoirie',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- armoirie
$tab_demande = $this->espace_mod->create_recu_rdv($numrecu);

//
function date_jour($frdate){
  //$frdate="02/02/2009";
  $joursem = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  //$mois = array(0,"Janvier", "Fevrier", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  $var = array("DEBUT", "JANVIER", "FEVRIER", "MARS", "AVRIL", "MAI", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE");
//$dat=explode('-',$frdate);

  // extraction des jour, mois, an de la date
  list($jour, $mois, $annee) = explode('-', $frdate);
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
.cn {font-weight:bold;}
</style>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" >
    <tr>
      <td height="533" align="center" valign="top">
      <table width="100%" border="0" cellpadding="5" cellspacing="0">        
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="30%" align="center" valign="middle"><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFPMA" class="img-responsive" width="149" height="96"></td>
              <td width="60%" align="center" valign="middle">&nbsp;</td>
              <td width="30%" align="center" valign="middle"><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" alt="armoirie" class="img-responsive" width="97" height="96"></td>
            </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center"><table width="402" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #000;">
                <tr bgcolor="#CCCCCC">
                  <td width="414" height="36" align="center" valign="middle"><h3>DEMANDE DE RENDEZ-VOUS</h3></td>
                </tr>
              </table></td>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
            
            </table>
          </td>
        </tr>
        <tr>
          <td class="print_titre">&nbsp;</td>
        </tr>
        <tr>
          <td height="245" align="center"><table width="100%" height="210" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="210" align="center" valign="top">
              <table width="100%"  align="center" cellpadding="0" cellspacing="0" style="border:dashed 1px #000; width:100%; padding:10px;">
                <tr>
                  <td height="34" colspan="2" align="left" valign="top"><span class="libel">RECU N° </span><span class="cn"><?php echo $tab_demande['NUM_RECU'].'/'.$tab_demande['idobjet'];?></span></td>
                  </tr>
                
                <tr>
                  <td width="32%" height="34" align="left" valign="top"><span class="libel">Matricule :</span></td>
                  <td width="68%" height="34" align="left" valign="top"><span class="cn"><?php echo $this->session->userdata('MATRICULE') ?></span></td>
                </tr>
               
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Nom et Prénoms :</span></td>
                  <td height="34" align="left" valign="top"><span class="cn">
                    <?php if($this->session->userdata('NOMJFILLE')) echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' Née '.$this->session->userdata('NOMJFILLE');
			else echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' '.$this->session->userdata('NOMJFILLE'); ?>
                  </span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Objet du Rendez-vous :</span></td>
                  <td height="34" align="left" valign="top"><span class="cn"><?php echo $tab_demande['libelle'];?></span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Date de Rendez-vous :</span></td>
                  <td height="34" align="left" valign="top"><span class="cn"><?php echo date_jour($tab_demande['DATE_RDV']);?></span></td>
                </tr>

                
                
                <tr>
                  <td height="34" colspan="2" align="right" valign="top"><br /><br /><?php echo @date('d/m/Y',time()+30900); ?></td>
                </tr>
              </table></td>
            </tr>
          </table>
			<br />
			<span style="font-size:12px; font-weight:lighter;">
          www.fonctionpublique.gouv.ci / Standard : 20 25 90 00 / Call Center : 20 25 90 22  / Fax : 20 22 78 18			</span></td>
        </tr>        
        <tr>
          <td align="right">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>