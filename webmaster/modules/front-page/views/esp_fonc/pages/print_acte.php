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

// debut de la page à imprimer
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
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" >
    <tr>
      <td height="533" align="center" valign="top">
      <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <!--<tr>
          <td>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="37%" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" class="taille">MINISTERE DE LA FONCTION PUBLIQUE<br />
                    ET DE LA REFORME ADMINISTRATIVE<br />
                    ----------------<br />
                    DIRECTION GENERALE DE LA FONCTION<br />
                    PUBLIQUE<br />
                    ----------------</td>
                </tr>
              </table></td>
              <td width="26%">&nbsp;</td>
              <td width="37%" align="right" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" valign="middle" class="taille">REPUBLIQUE DE COTE D'IVOIRE<br />
                    Union - Discipline - Travail<br />
                    ---------------- </td>
                </tr>
              </table></td>
            </tr>
          </table>
          
          </td>
        </tr>-->
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
                  <td width="414" height="36" align="center" valign="middle"><h3>DEMANDE D'ACTE EN LIGNE</h3></td>
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
                  <td height="34" colspan="2" align="left" valign="top"><span class="libel">RECU N° </span><span style="font-weight:bold;  font-size:20px;"> <?php echo $tab['NUM_RECU'].'/'.$tab['NATURE_CODE'];?></span></td>
                  </tr>
                  <?php if(!empty($tab['MATAGENT'])):?>
                <tr>
                  <td width="32%" height="34" align="left" valign="top"><span class="libel">Identifiant :</span></td>
                  <td width="68%" height="34" align="left" valign="top"><span class="libel"><span style="font-weight:bold;  font-size:16px;"><?php echo $tab['MATAGENT'] ?></span></span></td>
                </tr>
                <?php endif;?>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Nom et Prénoms :</span></td>
                  <td height="34" align="left" valign="top"><span class="libel"><span style="font-weight:bold;  font-size:16px;"><?php echo html_entity_decode($tab['NOM_PRENOMS']); if($tab['NOMJFILLE'])echo ' Née '.html_entity_decode($tab['NOMJFILLE']); ?></span></span></td>
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
                  <td height="34" align="left" valign="top"><span class="libel"><?php if($tab['ID_ACTE'] == 'A0041') {?>Nombres de concours :<?php } else {?>Nombres de copies :<?php }?></span></td>
                  <td height="17" align="left" valign="top"><span style="font-weight:bold;  font-size:16px;"><?php if($tab['ID_ACTE'] == 'A0041') {echo $numrows; } else {echo $tab['COPIE'];}?></span></td>
                </tr>
                <tr>
                  <td height="34" align="left" valign="top"><span class="libel">Montant à payer :</span></td>
                  <td height="17" align="left" valign="top"><span style="font-weight:bold;  font-size:16px;"><?php if($tab['ID_ACTE']=='A0041'){ echo $numrows * 3000;} else {echo $tab['MONTANT']*$tab['COPIE'];}?></span></td>
                </tr>
<?php            
				if($tab['ID_ACTE'] == 'A0097')
				{
?>
  				<!--<tr>
                     <td colspan="2" align="left">
                         <fieldset>
                               
                        <table>
                           <tr>
                               <td>&nbsp;&nbsp;&nbsp;&nbsp;Banque:<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php //echo $tab['Bank'] ?></span></td>
                               <td>&nbsp;&nbsp;&nbsp;&nbsp;Agence:<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php //echo $tab['Agence'] ?></span></td>
                           </tr>
                           <tr>
                               <td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;Gestionnaire:<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php //echo $tab['GESTIONNAIRE'] ?></span></td>
                           </tr>
                           <tr>
                               <td>&nbsp;&nbsp;&nbsp;&nbsp;Contact:<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php //echo $tab['CONTACT_GEST'] ?></span></td>
                               <td>&nbsp;&nbsp;&nbsp;&nbsp;Email:<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php //echo $tab['EMAIL_GEST'] ?></span></td>
                           </tr>
                         </table>
                         </fieldset>
                     </td>
                  </tr>   -->              
<?php 
				}
		elseif($tab['ID_ACTE'] == 'A0041')
		       {
?>
			   <tr>
                 <td colspan="2" align="left">
                     <fieldset>
                       <!--<legend>Vos Concours</legend>-->
                    <table>
                    <?php 
                         while($tab_demande1=mysql_fetch_array($ex_demande1))
                        {
                    ?>
                       <tr>
                           <td>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php echo $tab_demande1['PA_TYPECONC_LIB'] ?></span></td>
                           <td>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;  font-size:10px;">&nbsp;&nbsp;<?php echo $tab_demande1['PA_CONC_LIB'] ?></span></td>
                       </tr>
                   <?php 
                        }
                   ?>
                     </table>
                     </fieldset>
                 </td>
              </tr>
<?php 
			   }
?>
                
                
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