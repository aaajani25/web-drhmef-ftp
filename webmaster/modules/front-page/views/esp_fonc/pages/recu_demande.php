<?php $tab_demande = $this->espace_mod->recu_demande_acte($this->input->get_post('id')); ?>

<table width="755" border="0" align="center" cellpadding="0" cellspacing="0" class="ombret">
  <tr>
    <td width="755" height="40" align="center" bgcolor="#60A917"><span class="acte_titre">RECU DE DEMANDE D'ACTES EN LIGNE</span></td>
  </tr>
  <tr>
    <td height="89" align="center" valign="top"><br>    
    <br>
    <table width="704" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:'Segoe UI'; background-color:#FFF;">
      <tr>
        <td width="363" height="82" valign="middle">&nbsp;&nbsp;RECU N°<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;"> <?php echo $tab_demande['NUM_RECU'].'/'.$tab_demande['NATURE_CODE'];?></span> </td>
        <td width="341" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="200"> <img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFPMA" class="img-responsive" width="257" height="112"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="34" valign="middle">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td height="134" valign="top"><table width="332" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="28">Matricule :</td>
            </tr>
          <tr>
            <td height="28">
			<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">
			<?php echo $this->session->userdata('MATRICULE') ?>            </span></td>
            </tr>
          <tr>
            <td height="28">Nom et Prénoms :</td>
            </tr>
          <tr>
            <td height="28">
			<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">
			<?php if($this->session->userdata('NOMJFILLE')) echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' Née '.$this->session->userdata('NOMJFILLE');
			else echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' '.$this->session->userdata('NOMJFILLE'); ?>            </span></td>
          </tr>
          <tr>
            <td height="28"><?php if($tab_demande['ID_ACTE']=='A0041'){?>Nombres de concours<?php } else {?>Nombres de copies<?php } ?></td>
          </tr>
          <tr>
            <td height="28"><span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;"><?php echo $tab_demande['COPIE'];?></span></td>
          </tr>
        </table></td>
        <td valign="top"><table width="329" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="329" height="25">Nature de l'Acte :</td>
            </tr>
          <tr>
            <td height="30"><span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">
			<?php echo $tab_demande['TYPE_ACTE'];?>
            </span></td>
            </tr>
          <tr>
            <td height="25">Date de Rendez-vous :</td>
          </tr>
          <tr>
            <td height="30"><span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">
			<?php 
			$da=explode("-",$tab_demande['DATE_RDV']) ;
			$rdv=$da[2].'/'.$da[1].'/'.$da[0];
			//echo $rdv; 
			echo date_jour($tab_demande['DATE_RDV']);
			?>
            </span>            </td>
          </tr>
          <tr>
            <td height="30">Montant à payer</td>
          </tr>
          <tr>
            <td height="30"><span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;"><?php if($tab_demande['ID_ACTE']=='A0041'){ echo $tab_demande['COPIE'] * 3000;} else {echo $tab_demande['COPIE'] * 2000; }?> CFA</span></td>
          </tr>

        </table></td>
      </tr>
<?php 
if($tab_demande['ID_ACTE']=='A0097')
{
?>
     <!-- <tr>
         <td colspan="2">
             <fieldset>
                   <legend>Informations du gestionnaire</legend>
            <table width="100%">
               <tr>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;Banque:<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">&nbsp;&nbsp;<?php //echo $tab_demande['Bank'] ?></span></td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;Agence:<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">&nbsp;&nbsp;<?php //echo $tab_demande['Agence'] ?></span></td>
               </tr>
               <tr>
                   <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Gestionnaire:<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">&nbsp;&nbsp;<?php //echo $tab_demande['GESTIONNAIRE'] ?></span></td>
               </tr>
               <tr>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;Contact:<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">&nbsp;&nbsp;<?php //echo $tab_demande['CONTACT_GEST'] ?></span></td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;Email:<span style="font-weight:bold; font-family:'Segoe UI'; font-size:16px;">&nbsp;&nbsp;<?php //echo $tab_demande['EMAIL_GEST'] ?></span></td>
               </tr>
             </table>
             </fieldset>
         </td>
      </tr>-->
<?php 
}
elseif($tab_demande['ID_ACTE']=='A0041')
{
?>
<?php 
}
?>    
    <?php 
	if($tab_demande['ID_ACTE']=='A0041')
	{
	?>
	  <tr>
        <td height="64" colspan="2" align="center" valign="middle">
           <form action="https://fonctionpublique.laatech.com/payacte/forminitpayment.php" method="post" name="frm" target="_blank">          
           <input type="hidden" name="numrecu" id="numrecu" value="<?php echo $tab_demande['NUM_RECU'];?>" />
           <input type="hidden" name="mat" id="mat" value="<?php echo $this->session->userdata('MATRICULE');?>" />
           <input type="hidden" name="nom" id="nom" value="<?php echo $this->session->userdata('NOM');?>" />
           <input type="hidden" name="pren" id="pren" value="<?php echo $this->session->userdata('PRENOMS').' '.$this->session->userdata('NOMJFILLE');?>" />
           <input type="hidden" name="daten" id="daten" value="<?php echo str_replace('/','-',$this->session->userdata('DATENAISS'));?>" />
           <input type="hidden" name="lieun" id="lieun" value="<?php echo $lieu;?>" />
           <input type="hidden" name="nbre_act" id="nbre_act" value="<?php echo count($tab_demande);?>" />
           <input type="hidden" name="token" id="token" value="8d1740e461fbacfb805941e040bc420fed9a0c57" />
            <input type="submit" style="cursor:pointer;" value="PAYER" class="btn btn-primary" /> 
           </form>
        </td>
        </tr>
	<?php
	}
   else
    {
	?>
      <tr>
        <td height="64" colspan="2" align="center" valign="middle">
           <form action="imprime_acte" method="post" name="frm" target="_blank">          
           <input type="hidden" name="numrecu" id="numrecu" value="<?php echo $tab_demande['NUM_RECU'];?>" />
            <input type="submit" style="cursor:pointer;" value="IMPRIMER" class="btn btn-primary" />        
           </form>
        </td>
        </tr>
    <?php 
	}
	?>
    </table>
    <br>
 
    
    </td>
  </tr>
</table>
