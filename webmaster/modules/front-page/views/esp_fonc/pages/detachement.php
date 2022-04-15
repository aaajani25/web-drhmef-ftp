<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	DETACHEMENT
 </h1>
  </div>
</div>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Formulaire de demande d'un détachement</h3>           
		<!--contenu-->
        
        <?php include('message.php'); ?>
        
        <p>        
<form action="<?php echo $link.'/do_ps_val?ps=1' ?>" method="post">
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2">
  <tr>
        <td>      
        <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Nature du Détachement <span style="color:#F00">*</span>
                  </fieldset>
        </td>
        </tr>
        <tr>
        <td><select name="TBGL_NAT" id="TBGL_NAT" class="champ_de_saisie" required>
          <option value="">-- Sélectionnez --</option>
          <option value="Renouvellement">RENOUVELLEMENT</option>
          <option value="Retour">RETOUR DE DETACHEMENT</option>
          <option value="Demande">NOUVELLE DEMANDE</option>
        </select></td>
      </tr>
      
      <tr>
        <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                   Date d'effet <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        <tr>
        <td><input name="TBGL_EFFET" type="text" required id="datepicker" placeholder="..." class="champ_de_saisie"></td>
      </tr>
     
      <tr>
        <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/calendrier_v.png') ?>" alt="sbx">
                   Période <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        <tr>
        <td><select name="TBGL_DUREE" id="TBGL_DUREE" class="champ_de_saisie" required>
          <option value="">-- Sélectionnez --</option>
          <option value="1">1 ans</option>
          <option value="2">2 ans</option>
          <option value="3">3 ans</option>
          <option value="4">4 ans</option>
          <option value="5">5 ans</option>
        </select></td>
      </tr>
      <tr>
        <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/article_v.png') ?>" alt="sbx">
                   Motif <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        <tr>
        <td><select name="TBGL_MOTIF" required id="TBGL_MOTIF" class="champ_de_saisie">
          <option value="">-- Sélectionnez --</option>
          <?php foreach($motif as $mtf){?>
          <option value="<?php echo $mtf['ID'];?>"><?php echo $mtf['LIBELLE'];?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/droit_depart_v.png') ?>" alt="sbx">
                   Structure de destination <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        <tr>
        <td><select name="TBGL_STRCT_DEST" required id="TBGL_STRCT_DEST" class="champ_de_saisie">
          <option value="">-- Sélectionnez --</option>
          <?php foreach($projet as $prj){?>
          <option value="<?php echo $prj['code'];?>"><?php echo $prj['libelle'];?></option>
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
      <tr>
        <td>&nbsp;</td>
      </tr>
  
</table>
  
</form>
        </p>   
          
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">A propos du détachement !</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry">           
            <span>
        	Le détachement est la position du fonctionnaire autorisé à interrompre temporairement ses fonctions, pour exercer un emploi ou un mandat public national ou international, un mandat syndical, ou exercer une fonction ministérielle. <br>
Le fonctionnaire peut également être placé dans la position de détachement auprès d'une entreprise privée après autorisation du Conseil des ministres pour une période non renouvelable.<br>
 Dans cette position, le fonctionnaire continue à bénéficier de ses droits à l'avancement et à la retraite. <br>
Le détachement est prononcé à la demande du fonctionnaire ou d'office. Il est révocable. <br>
Le fonctionnaire détaché est soumis aux règles régissant l'emploi, pour lequel il a été détaché, à l'exception de toute disposition législative, réglementaire ou conventionnelle, prévoyant le versement d'indemnité de licenciement ou de fin de carrière. <br>

 - Le fonctionnaire détaché, remis à la disposition de son administration d'origine, avant le terme, pour une cause autre qu'une faute commise dans l'exercice de ses fonctions, et qui ne peut être réintégré faute d'emploi vacant, continue d'être rémunéré par l'organisme de détachement jusqu'à sa réintégration.<br>
 En cas de faute grave ou de faute professionnelle, l'organisme de détachement est tenu de saisir sans délai le ministre chargé de la Fonction publique d'un rapport circonstancié.<br>

 - Le fonctionnaire détaché ne peut, sauf au cas où le détachement a été prononcé auprès d'organismes internationaux ou pour exercer une fonction publique élective ou une fonction ministérielle, être affilié au régime de retraite dont relève l'organisme auprès duquel il est détaché, ni acquérir à ce titre, de droit quelconque à pension ou allocation, sous peine de suspension de la pension de l'Etat. <br>

  - Sous réserve des dérogations fixées par décret en Conseil des ministres, la collectivité ou l'organisme auprès duquel un fonctionnaire est détaché est redevable, envers la Caisse générale de Retraite des Agents de l'Etat, d'une contribution pour la constitution des droits à pension de l'intéressé.<br>
 Le taux de cette contribution est fixé par décret en Conseil des ministres. <br>

 - Les conditions et la durée du détachement ainsi que les modalités de réintégration des fonctionnaires sont déterminées sur décret en Conseil des ministres.
            </span>                                       
        </div> 
               
    </div>
  </div>     
  
</div>

  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="box-table">
    <tr valign="middle">
      <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flags.png"  /></td>
      <td width="94%" colspan="2" align="left">SUIVI DU CIRCUIT DE TRAITEMENT D'UN DETACHEMENT</td>
    </tr>
  </table>
    
  <!--wide--> 
  <div id="tab-page-w">
  <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content">   
    <tr valign="top" class="row actes"style="background-color:#8080FF;">
      <td width="9%" valign="middle">Matricule</td>
      <td width="17%" valign="middle">Nom et Prénoms</td>
      <td width="13%" valign="middle">Nature</td>
      <td width="13%" valign="middle">Destination</td>
      <td width="8%" valign="middle">Motif</td>
      <td align="center">CS</td>
      <td align="center">DRH</td>
      <td align="center">DGAPCE</td>
      <td align="center" valign="middle">Action</td>
    </tr>
    
    <?php if($suivi){
		foreach($suivi as $view){
			//if($view['TBGL_TYPE']==1) {$act = 'd';} else {$act = 'm';}	
	?>
    <tr class="row">
      <td><?php echo $view['MATRICULE'] ?></td>
      <td><?php echo $view['NOM_PRENOMS'] ?></td>
      <td><?php echo $view['TBGL_ACT'] ?></td>
      <td><?php echo $view['STRUCT_DEST'] ?></td>
      <td><?php echo $view['Motif'] ?></td>
      <td width="9%" align="center"><?php echo $view['ETAT_CHEF'] ?></td>
      <td width="12%" align="center"><?php echo $view['ETATS_DRH'] ?></td>
      <td width="11%" align="center"><?php echo $view['ETAT_DPCE'] ?></td>
      <td width="8%" align="center"><a href="javascript:void(0);" class="del" title="supprimer" onClick="del_detach('<?php echo $view['ID'] ?>');"><img src="<?php echo $link2.'/espace_fon/images/ic_action_cancel.png' ?>" alt="del"></a></td>
    </tr>            
    <?php }} else{?>
    <tr>
      <td colspan="10" align="center"><span style="color:#F00">AUCUNE DEMANDE DE DETACHEMENT</span></td>
    </tr>
    <?php }?>
  </table> 
  </div>
 <!--wide--> 
 
  <!--small--> 
  <div id="tab-page-s">
  <table width="100%" border="0" cellspacing="2" cellpadding="4" class="box-content" style="text-align:left">          
    <?php if($suivi_det_400){
		foreach($suivi_det_400 as $view){	
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
      <td width="13%" valign="middle">Destination</td>
      <td width="8%" valign="middle">Motif</td>
      <td>CS</td>     
    </tr>
    
       <tr class="">
      <td><?php echo $view['STRUCT_DEST'] ?></td>
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
      <td colspan="10" align="center"><span style="color:#F00">AUCUNE DEMANDE DE DETACHEMENT</span></td>
    </tr>
    <?php }?>
  </table>
  </div>
  <!--small-->  


<script type="text/javascript">
 function del_detach(ID){
	var slink = '<?php echo $link; ?>';
	 
	if(confirm("Confirmez-vous la suppression ?")){
		document.location.href = slink+"/traitement_ps?ps=1&detach="+ID;
	}
	else{
		//	
	}	 
 }
</script>
