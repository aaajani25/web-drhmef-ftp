<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}  
</style>

<div id="" class="">

 <div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">DISPONIBILITE </h1>
  </div>
</div>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Formulaire de demande d'une mise en disponibilité</h3>           
		<!--contenu-->
        <?php include('message.php'); ?>
        <p>
        	<form action="<?php echo $link.'/do_ps_val?ps=2' ?>" method="post">
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2">
  <tr>   
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Type de disponibilité <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
         <tr align="">
        <td><select name="TBGL_NATS" id="TBGL_NATS" class="champ_de_saisie" required>
          <option value="">-- Sélectionnez --</option>
          <option value="Renouvellement">RENOUVELLEMENT</option>
          <option value="Retour">RETOUR DE DISPONIBILITE</option>
          <option value="Demande">NOUVELLE DEMANDE</option>
        </select></td>
        </tr> 
      <tr>
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                   Date d'effet <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
          <tr align="">
        <td><input name="TBGL_EFFETS" type="text" id="datepicker" class="champ_de_saisie" placeholder="..." required></td>
        </tr> 
      <tr>
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Motif <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
          <tr align="">
        <td><select name="TBGL_MOTIFS" id="TBGL_MOTIFS" class="champ_de_saisie" required>
          <option value="">-- Sélectionnez --</option>
          <?php foreach($motif as $mtf){?>
          <option value="<?php echo $mtf['ID'];?>"><?php echo $mtf['LIBELLE'];?></option>
          <?php }?>
        </select></td>
        </tr> 
      <tr>
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/accueil_v.png') ?>" alt="sbx">
                  Structure d'accueil <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        
          <tr align="">
        <td><select name="TBGL_STRCT" id="TBGL_STRCT" class="champ_de_saisie" required>
          <option value="">-- Sélectionnez --</option>
          <?php foreach($accueil as $acc){?>
          <option value="<?php echo $acc['code'];?>"><?php echo $acc['libelle'];?></option>
          <?php }?>
        </select></td>
        </tr> 
        
      <tr >
        <td> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/droit_depart_v.png') ?>" alt="sbx">
                   Structure de destination <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
          <tr align="">
        <td><select name="STRCT_DEST" id="STRCT_DEST" class="champ_de_saisie" required>
          <option value="">-- Sélectionnez --</option>
          <option value="<?php echo $destination1['code'] ?>" selected="selected"><?php echo $destination1['libelle'] ?></option>
          <?php foreach($destination2 as $dest2){?>
          <option value="<?php echo $dest2['code'];?>"><?php echo $dest2['libelle'];?></option>
          <?php }?>
        </select></td>
        </tr> 
      <tr align="right">
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>
          <?php if ($this->input->get_post('type') == 'update'){ ?>
          <input type="submit" name="button" id="button" class="btn btn-primary" value="Modifier la demande">
          <?php }else{  ?>
          <input type="submit" name="button" id="button" class="btn btn-primary" value="Valider la demande">
          <?php }?>        </td>     
  </tr>
</table> 
</form>
        </p>   
          
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">A propos de la disponibilité !</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry ">           
            <span>
        	 La disponibilité est la position du fonctionnaire dont l'activité est suspendue temporairement, à sa demande, pour des raisons personnelles telles que précisées à l'article 47. 
 <br>
 - Le fonctionnaire en disponibilité n'a droit à aucune rémunération. Il cesse également de bénéficier de ses droits à l'avancement et à la retraite. 
 <br>
- La disponibilité ne peut être accordée que dans les cas suivants : - Accident ou maladie grave du conjoint ou d'un enfant. Dans ce cas la durée de la disponibilité ne peut excéder une année ; mais elle est renouvelable, après avis du Conseil de Santé; <br>
- Pour suivre un conjoint fonctionnaire en service ou affecté à l'étranger; la durée est également d'une année renouvelable à la demande motivée de l'intéressé ;<br>
 - Pour suivre un conjoint non fonctionnaire; la durée est alors d’un an 
 7
renouvelable une seule fois ;<br>
 - Pour convenances personnelles, la durée est d'un an renouvelable une seule fois. 
<br>
- La femme fonctionnaire, chef de famille placée en disponibilité, pour accident ou maladie d'un enfant perçoit la totalité des allocations familiales. 
 <br>
 - Un décret en Conseil des ministres détermine les modalités de la mise en disponibilité et de la réintégration des fonctionnaires intéressés. 
 
            </span>                                       
        </div> 
               
    </div>
  </div>     
  
</div>

 
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="box-table">
    <tr valign="middle">
      <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flags.png"  /></td>
      <td width="94%" colspan="2" align="left">SUIVI DU CIRCUIT DE TRAITEMENT D'UNE MISE EN DISPONIBILITE</td>
    </tr>
  </table>
  <div id="tab-page-w">
  <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content">
    <tr valign="middle" class="row actes"style="background-color:#8080FF;">
      <td width="9%">Matricule</td>
      <td width="17%">Nom et Prénoms</td>
      <td width="13%">Nature</td>
      <td width="13%">Structure d'accueil</td>
      <td width="8%">Motif</td>
      <td align="center">CS</td>
      <td align="center">DRH</td>
      <td align="center">DGAPCE</td>
      <td align="center">Action</td>
    </tr>
    
    <?php if($suivi){
		foreach($suivi as $view){
			//if($view['TBGL_TYPE']==1) {$act = 'd';} else {$act = 'm';}	
	?>
    <tr class="row">
      <td><?php echo $view['MATRICULE'] ?></td>
      <td><?php echo $view['NOM_PRENOMS'] ?></td>
      <td><?php echo $view['TBGL_ACT'] ?></td>
      <td><?php echo $view['STR'] ?></td>
      <td><?php echo $view['Motif'] ?></td>
      <td width="9%" align="center"><?php echo $view['ETAT_CHEF'] ?></td>
      <td width="12%" align="center"><?php echo $view['ETATS_DRH'] ?></td>
      <td width="11%" align="center"><?php echo $view['ETAT_DPCE'] ?></td>
      <td width="8%" align="center"><a href="javascript:void(0);" class="del" title="supprimer" onClick="del_dispon('<?php echo $view['ID'] ?>');"><img src="<?php echo $link2.'/espace_fon/images/ic_action_cancel.png' ?>" alt="del"></a></td>
    </tr>
    <?php }} else{?>
    <tr valign="middle">
      <td colspan="10" align="center"><span style="color:#F00">AUCUNE DEMANDE DE MISE EN DISPONIBILITE</span></td>
    </tr>
    <?php }?>
  </table> 
   </div>
 <!--wide--> 
 
  <!--small--> 
  <div id="tab-page-s">
  <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content" style="text-align:left">
    <?php if($suivi_med_400){
		foreach($suivi_med_400 as $view){	
	?>
    <tr valign="top" class="actes" style="background-color:#8080FF;">
      <td width="9%" valign="middle">Matricule</td>
      <td width="17%" valign="middle">Nom/Prénoms</td>
      <td width="13%" valign="middle">Nature</td>
    </tr>
    <tr class="">
      <td><?php echo $view['MATRICULE'] ?></td>
      <td><?php echo $view['NOM_PRENOMS'] ?></td>
      <td><?php echo $view['TBGL_ACT'] ?></td>
    </tr>
    <tr valign="top" class=" actes" style="background-color:#8080FF;">
      <td width="13%" valign="middle">Structure d'accueil</td>
      <td width="8%" valign="middle">Motif</td>
      <td>CS</td>
    </tr>
    <tr class="">
      <td><?php echo $view['STR'] ?></td>
      <td><?php echo $view['Motif'] ?></td>
      <td width="9%"><?php echo $view['ETAT_CHEF'] ?></td>
    </tr>
    <tr valign="top" class="actes" style="background-color:#8080FF;">
      <td>DRH</td>
      <td>DGAPCE</td>
      <td valign="middle">Action</td>
    </tr>
    <tr class="">
      <td width="12%"><?php echo $view['ETATS_DRH'] ?></td>
      <td width="11%"><?php echo $view['ETAT_DPCE'] ?></td>
      <td width="8%"><a href="javascript:void(0);" class="del" title="supprimer" onClick="del_detach('<?php echo $view['ID'] ?>');"><img src="<?php echo $link2.'/espace_fon/images/ic_action_cancel.png' ?>" alt="del"></a></td>
    </tr>
    <tr class="" align="">
      <td colspan="3" align="" style="border-bottom:1px solid #8080FF; background-color:#FFF">&nbsp;</td>
    </tr>
    <?php }} else{?>
    <tr>
      <td colspan="10" align="center"><span style="color:#F00">AUCUNE DEMANDE DE MISE EN DISPONIBILITE</span></td>
    </tr>
    <?php }?>
  </table>
   </div>
   
</div>

<script type="text/javascript">
 function del_dispon(ID){
	var slink = '<?php echo $link; ?>';
	 
	if(confirm("Confirmez-vous la suppression ?")){
		document.location.href = slink+"/traitement_ps?ps=2&dispon="+ID;
	}
	else{
		//	
	}	 
 }
</script>