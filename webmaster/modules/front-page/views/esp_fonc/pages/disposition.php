<style type="text/css">
	@media (min-width:900px){#pgcx-7-1-0, #pgcx-7-1-2{width:50%;}}  
</style>

<div id="" class="">

<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">
	DISPOSITION 
</h1>
  </div>
</div>

<br>

<div class="panel-grid" id="pgx-7-1" style="margin-top:20px;">  
 
  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">Formulaire de demande d'une mise à disposition</h3>           
		<!--contenu-->
        <?php include('message.php'); ?>
        <p>
        	<form action="<?php echo $link.'/do_ps_val?ps=3' ?>" method="post">
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="2" class="box-content">
  <tr>
   
        <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/droit_depart_v.png') ?>" alt="sbx">
                   Structure d'affectation <span style="color:#F00">*</span>
            </fieldset></td>
        </tr>
      <tr>
        <td colspan="2"><select name='N1' id='N1' onChange='gocab()' required class='champ_de_saisie'>
          <option value="">-- Sélectionnez --</option>
          <option value='S2141'>HAUTE AUTORITE POUR LA BONNE GOUVERNANCE</option>
          <?php foreach($str_affect as $sa){?>
          <option value="<?php echo $sa['code'] ?>"><?php echo $sa['libelle'] ?></option>
          <?php }?>
        </select></td>
      </tr>
       <tr>
          <td width="33%">
                <div id='CAB' class="contenu">  </div>
               <div id='N2' style='display:inline'>  </div>
	   		   <div id='N3' style='display:inline' > </div>
	           <div id='N4' style='display:inline' > </div>
               <div id='N5' style='display:inline' > </div>
	  		</td>
       </tr>
      
      <tr>
        <td colspan="2"> <fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/contact_phone_v.png') ?>" alt="sbx">
                   Téléphone récent <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        <tr>
        <td colspan="2"><input type="text" name="contact" id="contact" required class="champ_de_saisie" placeholder="..."></td>
      </tr>
      <tr>
        <td colspan="2"><fieldset>
    	<img src="<?php echo base_url('assets/css/form-icones/qualite_v.png') ?>" alt="sbx">
                   Compétences et motivations <span style="color:#F00">*</span>
                  </fieldset></td>
        </tr>
        <tr>
        <td colspan="2"><textarea name="MOTIF" id="MOTIF" required rows="5" placeholder="..."></textarea></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="button" id="button" class="btn btn-primary" value="Valider la demande"></td>
       
  </tr>
</table>
</form>
        </p>   
           
  </div>   
  
<div class="panel-grid-cell" id="pgcx-7-1-2"> 
    <h3 class="widget-title">A propos de la disposition !</h3>
     
    <div id="pgcx-7-1-1-m" class="so-panel widget widget_pt_featured_page widget-featured-page panel-first-child panel-last-child" data-index="1">
    
        <div class="page-box page-box--block post-7 page type-page status-publish hentry ">           
            <span>
        
            </span>                                       
        </div> 
               
    </div>
  </div>     
  
</div>

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="box-table">
    <tr valign="middle">
      <td width="3%"><img src="<?php echo base_url('assets/espace_fon') ?>/images/ic_action_flags.png"  /></td>
      <td width="94%" colspan="2" align="left">SUIVI DE DEMANDE D'UNE MISE A DISPOSITION</td>
    </tr>
  </table>
  
  <div id="tab-page-w">
  <?php if ($line_query_dmd){ ?>
  <table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-family:Arial; font-size:14px; border-collapse:collapse">
        <tr>
          <td height="15" colspan="3" align="center" bgcolor="#FFF"><span style="color:#000;"><strong>STRUCTURE ACTUELLE</strong></span></td>
          <td colspan="3" align="center" bgcolor="#FFF" ><span style="color:#000;"><strong>STRUCTURE SOUHAITEE</strong></span></td>
          <td rowspan="3" align="center" bgcolor="#484955" style="color:#FFF; font-family:'Arial Black'; ">MFPMA</td>
          <td rowspan="3" align="center" bgcolor="#484955" style="color:#FFF; font-family:'Arial Black'; ">PRISE DE SERVICE</td>
          <td colspan="2" rowspan="4" align="center" bgcolor="#484955" style="color:#FFF; font-family:'Arial Black'; "><strong>ACTION</strong></td>
        </tr>
        <tr>
          <td height="16" colspan="3" align="center" bgcolor="#E4E4E4"><?php echo $line_query_dmd['str_ori'] ?></td>
          <td colspan="3" align="center" bgcolor="#D3FAD1"><?php echo $line_query_dmd['str_dest'] ?></td>
        </tr>
        <tr>
          <td width="14%" height="30" rowspan="2" align="center" bgcolor="#E4E4E4"><strong>SERVICE</strong></td>
          <td width="12%" align="center" bgcolor="#E4E4E4"><strong>CHEF</strong></td>
          <td width="14%" align="center" bgcolor="#E4E4E4"><strong>DRH</strong></td>
          <td width="20%" rowspan="2" align="center" bgcolor="#D3FAD1"><strong>SERVICE</strong></td>
          <td width="12%" align="center" bgcolor="#D3FAD1"> <strong>CHEF</strong></td>
          <td width="12%" align="center" bgcolor="#D3FAD1"><strong>DRH</strong></td>
        </tr>
        <tr>
          <td width="12%" align="center" bgcolor="#E4E4E4"><strong>ETAPE 3</strong></td>
          <td width="14%" align="center" bgcolor="#E4E4E4"><strong>ETAPE 4</strong></td>
          <td align="center" bgcolor="#D3FAD1"><strong>ETAPE 1</strong></td>
          <td width="12%" align="center" bgcolor="#D3FAD1"><strong>ETAPE 2</strong></td>
          <td align="center" bgcolor="#484955" style="color:#FFF; font-family:'Arial Black'; ">ETAPE 5</td>
          <td align="center" bgcolor="#484955" style="color:#FFF; font-family:'Arial Black'; "><p>ETAPE 6</p></td>
        </tr>
       
        <tr>
          <td height="32" bgcolor="#E4E4E4" class="contenu"> <?php echo $line_query_dmd['service_ori'] ?>&nbsp;</td>
          <td height="32" align="center" bgcolor="#E4E4E4"> 
           <span style="color:
		  <?php if($line_query_dmd['accord_cs']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_cs']=='ACCORDEE'){ echo '#090;';}
		   else{ echo '#F00;';}
		   ?>
          ">
          <b><?php echo $line_query_dmd['accord_cs']; $_SESSION['STRUCT_DEST']=$line_query_dmd['STRUCT_DEST']; ?></b></span>&nbsp;</td>
          <td align="center" bgcolor="#E4E4E4">
           <span style="color:
		  <?php if($line_query_dmd['accord_drh']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_drh']=='ACCORDEE'){ echo '#090;';}
		   else{ echo '#F00;';}
		   ?>
          ">
          <b><?php echo $line_query_dmd['accord_drh'] ?></b></span>&nbsp; </td>
          <td bgcolor="#D3FAD1" class="contenu"><?php echo $line_query_dmd['service_dest'] ?>&nbsp;</td>
          <td align="center" bgcolor="#D3FAD1">
          <span style="color:
		  <?php if($line_query_dmd['accord_cs_dest']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_cs_dest']=='REFUSEE'){ echo '#F00;';}
		   else{ echo '#090;';}
		   ?>
          ">
          <b>
		  <?php 
		  echo $line_query_dmd['accord_cs_dest'];		   
		  ?>

          </b>
          </span>&nbsp;</td>
          <td align="center" bgcolor="#D3FAD1">
         <span style="color:
          <?php if($line_query_dmd['accord_drh_dest']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_drh_dest']=='ACCORDEE'){ echo '#090;';}
		   else{ echo '#F00;';}
		   ?>
          ">
          <b><?php echo $line_query_dmd['accord_drh_dest'] ?></b></span>&nbsp;</td>
          <td width="8%" bgcolor="#d9d6d1" align="center"><?php echo $line_query_dmd['accord_mfpra'] ?></td>
          <td width="8%" bgcolor="#d9d6d1" align="center"><?php  if($line_query_dmd['PSERVICE_VALIDE']) echo 'OUI'; else echo 'NON';  ?></td>
          <!--<td width="8%" bgcolor="#d9d6d1" align="center">&nbsp;<a href="?actes=disposition&amp;id_dispo2=<?php //echo  $line_query_dmd['ID'] ?>"><?php //if(!empty($line_query_dmd['modifier'])){echo '<img src="./fp-admin/images/modif.png" border="0"'.' />';} ?> <?php //echo $line_query_dmd['modifier'] ?></a></td>-->
          
          <td width="8%" bgcolor="#d9d6d1" align="center"><a href="javascript:void(0);" class="del" title="supprimer" onClick="del_dispo('<?php echo $line_query_dmd['ID'] ?>');"><img src="<?php echo $link2.'/espace_fon/images/ic_action_cancel.png' ?>" alt="del"></a></td>
        </tr>
      </table>
       
 <?php }else{?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td align="center"><span style="color:#F00">AUCUNE DEMANDE DE MISE A DISPOSITION</span></td>
    </tr>
</table>
 <?php }?>
 </div>
 
 <div id="tab-page-s">
 <?php if ($line_query_dmd){ ?>
 <table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="3" align="center" class="tp"><strong>STRUCTURE SOUHAITEE</strong></td>
    </tr>
  <tr>
    <td colspan="3" align="center"><?php echo $line_query_dmd['str_dest'] ?></td>
    </tr>
  <tr>
    <td rowspan="2" align="center"><strong>SERVICE</strong></td>
    <td align="center"><strong>CHEF</strong></td>
    <td align="center"><strong>DRH</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>ETAPE 1</strong></td>
    <td align="center"><strong>ETAPE 2</strong></td>
  </tr>
  <tr>
    <td align="center"><span class="contenu"><?php echo $line_query_dmd['service_dest'] ?></span></td>
    <td align="center">
      <span style="color:
		  <?php if($line_query_dmd['accord_cs_dest']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_cs_dest']=='REFUSEE'){ echo '#F00;';}
		   else{ echo '#090;';}
		   ?>
          ">
          <b>
		  <?php 
		  echo $line_query_dmd['accord_cs_dest'];		   
		  ?>
          </b>
          </span>
    </td>
    <td align="center">
    	<span style="color:
          <?php if($line_query_dmd['accord_drh_dest']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_drh_dest']=='ACCORDEE'){ echo '#090;';}
		   else{ echo '#F00;';}
		   ?>
          ">
          <b><?php echo $line_query_dmd['accord_drh_dest'] ?></b></span>
    </td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="3" align="center" class="tp"><strong>STRUCTURE ACTUELLE</strong></td>
    </tr>
  <tr>
    <td colspan="3" align="center"><?php echo $line_query_dmd['str_ori'] ?></td>
    </tr>
  <tr>
    <td rowspan="2" align="center"><strong>SERVICE</strong></td>
    <td align="center"><strong>CHEF</strong></td>
    <td align="center"><strong>DRH</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>ETAPE 3</strong></td>
    <td align="center"><strong>ETAPE 4</strong></td>
  </tr>
  <tr>
    <td align="center"><span class="contenu"><?php echo $line_query_dmd['service_ori'] ?></span></td>
    <td align="center">
       <span style="color:
		  <?php if($line_query_dmd['accord_cs']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_cs']=='ACCORDEE'){ echo '#090;';}
		   else{ echo '#F00;';}
		   ?>
          ">
          <b><?php echo $line_query_dmd['accord_cs']; $_SESSION['STRUCT_DEST']=$line_query_dmd['STRUCT_DEST']; ?></b></span>
    </td>
    <td align="center">
        <span style="color:
		  <?php if($line_query_dmd['accord_drh']=='EN ATTENTE'){ echo '#F30;';}
           elseif($line_query_dmd['accord_drh']=='ACCORDEE'){ echo '#090;';}
		   else{ echo '#F00;';}
		   ?>
          ">
          <b><?php echo $line_query_dmd['accord_drh'] ?></b></span>
    </td>
  </tr>
</table>
  <table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center"><strong>MFPMA</strong></td>
    <td align="center"><strong>PRISE DE SERVICE</strong></td>
    <td colspan="2" rowspan="2" align="center"><strong>ACTION</strong></td>
    </tr>
  <tr>
    <td align="center"><strong>ETAPE 5</strong></td>
    <td align="center"><strong>ETAPE 6</strong></td>
  </tr>
  <tr>
    <td align="center"><?php echo $line_query_dmd['accord_mfpra'] ?></td>
    <td align="center"><?php  if($line_query_dmd['PSERVICE_VALIDE']) echo 'OUI'; else echo 'NON';  ?></td>
    <!--<td><a href="?actes=disposition&amp;id_dispo2=<?php //echo  $line_query_dmd['ID'] ?>"><?php //if(!empty($line_query_dmd['modifier'])){echo '<img src="./fp-admin/images/modif.png" border="0"'.' />';} ?> <?php //echo $line_query_dmd['modifier'] ?></a></td>-->
    
    <td align="center"><a href="javascript:void(0);" class="del" title="supprimer" onClick="del_dispo('<?php echo $line_query_dmd['ID'] ?>');"><img src="<?php echo $link2.'/espace_fon/images/ic_action_cancel.png' ?>" alt="del"></a></td>
  </tr>
</table>
     
 <?php }else{?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td align="center"><span style="color:#F00">AUCUNE DEMANDE DE MISE A DISPOSITION</span></td>
    </tr>
</table>
 <?php }?>
</div>

</div>

<script type="text/javascript">
 function del_dispo(ID){
	var slink = '<?php echo $link; ?>';
	 
	if(confirm("Confirmez-vous la suppression ?")){
		document.location.href = slink+"/traitement_ps?ps=3&dispo="+ID;
	}
	else{
		//	
	}	 
 }
</script>