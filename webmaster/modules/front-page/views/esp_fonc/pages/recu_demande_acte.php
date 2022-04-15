<?php $tab_demande = $this->espace_mod->recu_demande_acte($this->input->get_post('id')); ?>

<div id="" class="">

 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">DEMANDE D'ACTE<br>
    </h1>
  </div>
</div>

<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}
	
	.fiche_rdv{background-color:#FFF; border:2px dashed #036D00; padding:0px 10px; text-align:left}
	
	.fiche_rdv img{padding:0px}
	.titre_rdv{color:#036D00; background-color:#9FFF9D; padding:10px; font-weight:bold}
	.cn{font-weight:bold;}
</style>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">RECU DE DEMANDE D'ACTE</h3>           
		<!--contenu-->
        <p>
        	<table width="100%" border="0" cellspacing="3" cellpadding="3" class="">
  <tr>
    <td align="center" class="titre_rdv">RECU DEMANDE D'ACTE</span></td>
  </tr>
  </table>
  
     	<table width="100%" border="0" cellspacing="3" cellpadding="3" class="fiche_rdv">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class=""><img src="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>" alt="MFP" class="img-responsive" width="90" height="90"></td>
    <td align="right" class=""><img src="<?php echo base_url('assets/') ?>/rubriques/_armoirie/<?php echo $armoirie['image_small'] ?>" alt="MFP" class="img-responsive" width="50" height="50"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx"> RECU N° : <?php echo $tab_demande['NUM_RECU'].'/'.$tab_demande['NATURE_CODE'];?>
    </fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx"> Matricule : <span class="cn"><?php echo $this->session->userdata('MATRICULE') ?></span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/user_v.png') ?>" alt="sbx"> Nom et Prénoms : <span class="cn"><?php if($this->session->userdata('NOMJFILLE')) echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' Née '.$this->session->userdata('NOMJFILLE');
			else echo $this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' '.$this->session->userdata('NOMJFILLE'); ?>
    </span></fieldset></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr><td colspan="2"><fieldset>
    <img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx">
    <?php if($tab_demande['ID_ACTE']=='A0041'){?> Nombres de concours : <?php } else {?> Nombres de copies : <?php } ?> <?php echo $tab_demande['COPIE'];?>
  </fieldset></td>
          </tr>
          <tr>
            <td colspan="2"></td>
          </tr>
  <tr>
    <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
      <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/doc_v.png') ?>" alt="sbx"> Nature de l'Acte : <?php echo $tab_demande['TYPE_ACTE'];?>
    </fieldset></td>
  </tr>
 <!-- <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><fieldset>
    	<img src="<?php //echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx"> Date de Rendez-vous :
    	<?php 
			/*$da=explode("-",$tab_demande['DATE_RDV']) ;
			$rdv=$da[2].'/'.$da[1].'/'.$da[0];
			 
			echo date_jour($tab_demande['DATE_RDV']);*/
			?>
    </fieldset></td>
  </tr>-->
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
            <td height="30" colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/qualite_v.png') ?>" alt="sbx"> Montant à payer : <?php if($tab_demande['ID_ACTE']=='A0041' or $tab_demande['ID_ACTE']=='A0097'){ echo $tab_demande['COPIE'] * 3000;} else {echo $tab_demande['COPIE'] * 2000; }?> FCFA
            </fieldset></td>
          </tr>
         
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <?php 
if($tab_demande['ID_ACTE']=='A0097')
{
?>
   
<?php 
}
elseif($tab_demande['ID_ACTE']=='A0041')
{
?>
<?php 
}
?>    
    <?php 
	if($tab_demande['ID_ACTE']=='A0041' or $tab_demande['ID_ACTE']=='A0097')
	{
	?>
	  <tr>
        <td height="64" colspan="3" align="center" valign="middle">
           <form action="https://fonctionpublique.laatech.com/payacte/forminitpayment.php" method="post" name="frm" target="_blank">           <input type="hidden" name="id_acte" id="id_acte" value="<?php echo $tab_demande['ID_ACTE'];?>" />
           <input type="hidden" name="idnum" id="idnum" value="<?php echo $tab_demande['ID_NUM'];?>" />
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
        <td height="64" colspan="3" align="center" valign="middle">
           <form action="<?php echo site_url($ctrl.'/imprime_acte') ?>" method="post" name="frm" target="_blank">          
           <input type="hidden" name="numrecu" id="numrecu" value="<?php echo $tab_demande['NUM_RECU'];?>" />
            <input type="submit" style="cursor:pointer;" value="IMPRIMER LE RECU" class="btn btn-primary" />        
           </form>
        </td>
        </tr>
    <?php 
	}
	?>
      </table>

        </p>   
        
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">Note d'Information</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1" align="center">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry ">           
          <div class="warning"></div> 
                                       
        </div> 
               
    </div>
  </div>     
  
</div>

</div>