<?php
	$annee = $this->input->get_post('y');
	$periode = $this->input->get_post('t');
	$matricule = $this->session->userdata('MATRICULE');
	
	$tb_evaluer = $tb_notation = '';
	
	switch($annee){	
		case '2014': 
			$tb_evaluer = 'evaluer';
			$tb_notation = 'notation';
		break;
		
		case '2016': 
			$tb_evaluer = 'evaluer2016';
			$tb_notation = 'notation2016';
		break;
		
		// debut de la notation 2013
		default:
			$tb_evaluer = 'evaluer_2013_fin';
			$tb_notation = 'notation_2013_fin';
	}

	include('find_agent_name.php');			
	include('f-notation.php');
			
	if($table['ETAT_CS']==5) {
		$crii=$supwhile;
		$sup1=$sup2=$crii['NOM_PRENOMS'];
		//$_SESSION['matsup1']=$mat1=$mat2=$crii['MATRICULE'];
		
		$valider='NOTE VALIDEE PAR LE SUPERIEUR HIERARCHIQUE 2';	
	}
	else {	
		$crii=$supwhile;
		$sup1=$crii['NOM_PRENOMS'];
		//$_SESSION['matsup1']=$mat1=$crii['MATRICULE'];
		
		$crii=$supwhile;
		$sup2=$crii['NOM_PRENOMS'];
		$mat2=$crii['MATRICULE'];
		
		if($crvalider[0]['valider']=='EN_ATTENTE') $valider='NOTE EN ATTENTE DE VALIDATION PAR LE SUPERIEUR HIERARCHIQUE 2';
		else $valider='NOTE VALIDEE PAR LE SUPERIEUR HIERARCHIQUE 2';	
	}
	
	/*mysql_data_seek($qperiode,0);
	$nbperiode=mysql_num_rows($qperiode);*/
		
	if($crvalider!=0) {	
	$total=0;
	$i=0;
	$aux="";		
		
	$aux .='<br/>
	
	<fieldset><legend><b>LES NOTES</b></legend>';
	$aux.='<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >';
	
	foreach($crvalider as $cr) { 
	$style='style="background-color:#EFEFEF;"';
	
	if($cr['id_critere']==1){
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/20</td></tr>';
		$aux .='<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<i>- Sens des responsabilités</i> <br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Sens du service public</i> <br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Sens social, sens des relations humaines </i><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Tenue et présentation</i></td>
		</tr>';
	}
	elseif($cr['id_critere']==2) {
		$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/15</td></tr>';
		$aux .='<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<i>- Esprit d\' initiative</i><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Connaissances et aptitudes professionnelles</i><br>
		&nbsp;&nbsp;&nbsp;&nbsp;<i>- Puissance de travail et rendement</i></td></tr>';
	}
	elseif($cr['id_critere']==3) {
		$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/10</td></tr>';
		$aux .='<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<i>- Civisme, intégrité et moralité</i><br>

						 	  &nbsp;&nbsp;&nbsp;&nbsp;<i>- Esprit de discipline</i></td></tr>';
	}
	elseif($cr['id_critere']==9) {
		$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>'.$cr['lib_critere'].'</b></td><td>'.$cr['note_valideur'].'/5</td></tr>';
	}
	  
		$i++; 
		$total=$total+$cr['note_valideur'];
	  }
	  
	/*mysql_data_seek($qperiode,0);
	$cr=mysql_fetch_assoc($qperiode);*/
	
	$cr = $crvalider;
	
	$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
	$aux .='<tr height="30" '.$style.' >';
	$aux .='<td><b>TOTAL</b></td><td><font color="#990000"><b>'.$total.'/50</b></font></td></tr>';
	
	$aux .='<tr><td colspan="2">&nbsp;</td></tr>';
	$aux .='<tr height="30" '.$style.' >';
	$aux .='<td><b>MOYENNE</b></td><td><font color="#990000"><b>'.$cr[0]['note_chiffre_sup2'].'/5</b></font></td></tr>';
	  
	$aux.='</table></fieldset>'; /*pri&egrave;re vous adresser &agrave; votre sup&eacute;rieur hi&eacute;rarchique 1*/
	
	// BLOC DES APPRECIATIONS
	$aux .='<br/><br/>
	<fieldset><legend><b>LES APPRECIATIONS</b></legend>';
	$aux.='<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >';
	
	/*mysql_data_seek($qperiode,0);
	$cr=mysql_fetch_assoc($qperiode);*/
	
	$cr = $crvalider;
	
	$style='style="background-color:#EFEFEF;"';
		
		// Afficher l'Appréciation du supérieur
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>Appréciation du supérieur</b></tr>';
	  	$aux .='<tr></td><td><font color="#990000">'.$cr[0]['appreciation_sup'].'</font></td></tr>';
		
		// Afficher la Proposition du supérieur
		$aux .='<tr><td>&nbsp;</td></tr>';
		$aux .='<tr height="30" '.$style.' >';
	  	$aux .='<td><b>Proposition du supérieur</b></tr>';
	  	$aux .='<tr></td><td><font color="#990000">'.$cr[0]['avancement_sup'].'</font></td></tr>';
	  
	$aux.='</table></fieldset></br><b>NB: Pour toute reclamation concernant vos notes, <a href="'.$link."/reclamation".'" class="resulsond">CLIQUEZ ICI</a>'; /*pri&egrave;re vous adresser &agrave; votre sup&eacute;rieur hi&eacute;rarchique 1*/
	
	$aux.=' </b></br></br>';
	$aux.='&nbsp;- SUPERIEUR HIERARCHIQUE 1 &nbsp; :<b> '.$name_sup1.'</b></br></br>';	//$sup1
	$aux.='&nbsp;- SUPERIEUR HIERARCHIQUE 2 &nbsp; : <b>'.$name_sup2.'</b></br></br>';//$sup2
	$aux.='&nbsp;- ETAT :&nbsp; <b>'.$valider.'</b></br></br></br>';

 
 $aux .='<br/><form action="'.$link.'/imprime_notation" method="post" name="bull" target="_blank">
	<div style="margin:auto; width:200px; height:70px; cursor:pointer;">
	<input name="matricule" type="hidden" value="'.$matricule.'" />
	<button type="submit" class="btn btn-primary">Imprimer la fiche de notation</button>
	</div>
	<input name="ann_note" type="hidden" value="'.$annee.'">
	<input name="per_note" type="hidden" value="'.$periode.'">
	</form>';
	
 echo $aux;
  }
?>