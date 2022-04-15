<?php 
$matricule = $this->session->userdata('MATRICULE');
$style = '';

 $x="Select s.libelle, p.agentmatricule, MAT_SUP, MAT_SUP2, Case When p.reclamer = 1 Then 'OUI, PRESENT AU POSTE' Else 'NON, ABSENT AU POSTE' End As reponse,
	     SERVICE_SUP, SERVICE_SUP2
	      From bd_sigfae_web_ns.presence_poste2016  p Inner Join bd_sigfae_web_ns.structure s On p.STRUCTURE = s.code
		    Where p.agentmatricule='".$matricule."' ";			

		$table=$this->$model->getSQL('sf', $x, 'row');    
		
	/*$rek=$instance_fct->executeSQL($x);
	$table=mysql_fetch_array($rek);
    $number_line=mysql_num_rows($rek);*/
    
	if($table>0)
	{
		$sql_1 = "Select Distinct tbno_notation.NOM_PRENOMS, 
		           Case When Left(tbno_inscrire.CODE_DIR,2) = 'CB' Then LIB_CAB 
				    Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'DG' Then LIB_DG 
					Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'DC' Then LIB_DC 
					Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'SD' Then LIB_SD 
					Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'SC' Then LIB_SC 
					Else libelle End) End) End ) End ) End As s
		            From tbno_notation Inner Join tbno_inscrire On tbno_notation.MATRICULE = tbno_inscrire.MATRICULE
					   Inner Join  structure  On tbno_notation.STRUCTURE = structure.code
					   Left Join  tbaf_cabinet  On tbno_notation.CODE_CAB = tbaf_cabinet.CODE_CAB
					   Left Join  tbaf_direction_gle  On tbno_notation.CODE_DG = tbaf_direction_gle.CODE_DG
					   Left Join  tbaf_direction_centre  On tbno_notation.CODE_DC = tbaf_direction_centre.CODE_DC
					   Left Join  tbaf_sdirection  On tbno_notation.CODE_SD = tbaf_sdirection.CODE_SD
					   Left Join  tbaf_service  On tbno_notation.CODE_SC = tbaf_service.CODE_SC
					  Where tbno_notation.MATRICULE = '".$table['MAT_SUP']."' And ETAT_INCR = 1 ";
		
		$sql_2 = "Select Distinct tbno_notation.NOM_PRENOMS, 
		           Case When Left(tbno_inscrire.CODE_DIR,2) = 'CB' Then LIB_CAB 
				    Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'DG' Then LIB_DG 
					Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'DC' Then LIB_DC 
					Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'SD' Then LIB_SD 
					Else (Case When Left(tbno_inscrire.CODE_DIR,2) = 'SC' Then LIB_SC 
					Else libelle End) End) End ) End ) End As s
		            From tbno_notation Inner Join tbno_inscrire On tbno_notation.MATRICULE = tbno_inscrire.MATRICULE
					   Inner Join  structure  On tbno_notation.STRUCTURE = structure.code
					   Left Join  tbaf_cabinet  On tbno_notation.CODE_CAB = tbaf_cabinet.CODE_CAB
					   Left Join  tbaf_direction_gle  On tbno_notation.CODE_DG = tbaf_direction_gle.CODE_DG
					   Left Join  tbaf_direction_centre  On tbno_notation.CODE_DC = tbaf_direction_centre.CODE_DC
					   Left Join  tbaf_sdirection  On tbno_notation.CODE_SD = tbaf_sdirection.CODE_SD
					   Left Join  tbaf_service  On tbno_notation.CODE_SC = tbaf_service.CODE_SC
					  Where tbno_notation.MATRICULE = '".$table['MAT_SUP2']."' And ETAT_INCR = 1 ";
	}

	/*$rek1=$instance_fct->executeSQL($sql_1);
	$table1=mysql_fetch_array($rek1);*/
	$table1=$this->$model->getSQL('sf', $sql_1, 'row');    
	
	/*$rek2=$instance_fct->executeSQL($sql_2);
	$table2=mysql_fetch_array($rek2);*/
	
	$table2=$this->$model->getSQL('sf', $sql_2, 'row');
	
	$aux='';
	$aux.='<br><br>';
	$aux.='<fieldset style="border-color:#00CC00;border-style:dashed solid;border-bottom-style:solid;font-size: 16px;font-family: "Oswald";height:auto;border-radius:10px;margin-left: auto;margin-right: auto;text-align:left;">
  <legend><span style="color:#212121; font-family:Oswald; font-weight:bold">CONTROLE DE PRESENCE &nbsp;</span></legend>

 <table style="background-color:#FFF;font-family: Arial;font-size: 14px;font-weight: lighter;border:solid;border-color:#C4F295;border-width:thin;" width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
 <tr height="10" '.$style.' >
 	<td width="1%" style="border:none;" ></td><td width="40%" style="border:none;" ></td><td width="58%" style="border:none;" ></td><td width="1%" style="border:none;"></td>	
 </tr>

 <tr height="30" '.$style.' >
 	<td width="1%" style="border:none;"></td><td bgcolor="#C4F295" width="40%" style="border:none;"><b>STRUCTURE</b></td><td bgcolor="#C4F295" width="58%" style="border:none;">'.$table['libelle'].'</td><td width="1%" style="border:none;"></td>	
 </tr>
 <tr height="30" '.$style.' >
 	<td style="border:none;"></td><td style="border:none;"><b>NOM ET PRENOMS</b></td><td style="border:none;">'.$this->session->userdata('NOM').' '.$this->session->userdata('PRENOMS').' '.$this->session->userdata('NOMJFILLE').'</td><td style="border:none;"></td>
 </tr>
 <tr height="30" '.$style.' >
 	<td style="border:none;"></td><td bgcolor="#C4F295" style="border:none;"><b>EMPLOI</b></td><td bgcolor="#C4F295" style="border:none;">'.$this->session->userdata('EMPLOI').'</td><td style="border:none;"></td>
 </tr>
 <tr height="30" '.$style.' >
 	<td style="border:none;"></td><td style="border:none;"><b>SUPERIEUR 1</b></td><td style="border:none;">'.$table1['NOM_PRENOMS'].' ('.$table1['s'].')</td><td style="border:none;"></td>
 </tr>
 <tr height="30" '.$style.' >
 	<td style="border:none;"></td> <td bgcolor="#C4F295" style="border:none;"><b>SUPERIEUR 2</b></td><td bgcolor="#C4F295" style="border:none;">'.$table2['NOM_PRENOMS'].' ('.$table2['s'].')</td> <td style="border:none;"></td>
 </tr>
 <tr height="30" '.$style.' >
 	<td style="border:none;"></td><td style="border:none;"><b>EST T-IL PRESENT AU POSTE</b></td><td class="reponse" style="border:none;">'.$table['reponse'].'</td><td style="border:none;"></td>
 </tr>
 <tr height="20" '.$style.' >
 	<td width="1%" style="border:none;"></td><td bgcolor="#C4F295" width="40%" style="border:none;">&nbsp;</td><td bgcolor="#C4F295" style="border:none;" width="58%">&nbsp;</td><td width="1%" style="border:none;"></td>	
 </tr>
 
 <tr height="10" '.$style.' >
 	<td width="1%" style="border:none;"></td><td width="40%" style="border:none;">&nbsp;</td><td width="58%" style="border:none;">&nbsp;</td><td style="border:none;" width="1%"></td>	
 </tr>
 </table><br/>
</fieldset>
';
	

 echo $aux;
?>