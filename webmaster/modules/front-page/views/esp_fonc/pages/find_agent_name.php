<?php 
if($annee >= '2014'){
	$sql="Select Distinct MAT_SUP, STRUCTURE, CODE_CAB, CODE_DG, "
			. "CODE_DC, CODE_SD, CODE_SC "
			. "From $tb_notation Where agentmatricule = '".$matricule."' ";
	
	$sup_mat1 = $this->espace_mod->getSQL('sf', $sql, 'row');                         

	//rechercher l'etat cs du superieur 1
	$s="Select Distinct tbno_notation.ETAT_CS, tbno_notation.STRUCTURE, libelle,
		tbno_notation.NOM_PRENOMS, tbno_notation.CODE_CAB, tbno_notation.CODE_DG, 
				  tbno_notation.CODE_DC, tbno_notation.CODE_SD, tbno_notation.CODE_SC, 
				  tbno_interimaire.STRUCTURE As strct_interim, tbno_interimaire.CODE_CAB As cab_interim,
									  tbno_interimaire.CODE_DG As dg_interim, 
									  tbno_interimaire.CODE_DC As dc_interim, tbno_interimaire.CODE_SD As 
									  sd_interim, tbno_interimaire.CODE_SC As sc_interim
					   From tbno_notation Inner Join structure On STRUCTURE = code
											Left Join tbno_interimaire On tbno_notation.MATRICULE 
											= tbno_interimaire.MATRICULE
										 Where tbno_notation.MATRICULE = '".$sup_mat1['MAT_SUP']."' ";
	
	$s1=$this->espace_mod->getSQL('sf', $s, 'row');                        

	if($s1['ETAT_CS']==7)//cas du ministre
	{	
			$name_sup1=$s1['NOM_PRENOMS'];
			$srv_name_sup1=$s1['libelle'];
			$name_sup2=$name_sup1;
			$srv_name_sup2=$srv_name_sup1;                                       
	}

	if(!empty($s1['strct_interim']) && ($s1['strct_interim'] <> $s1['STRUCTURE']))
	{   	                             
			//comparer le service du superieur et celui de l'agent
			if(!empty($s1['sc_interim']))
			{			
			  $sql1="Select Distinct NOM_PRENOMS, LIB_SC
													   From tbno_interimaire Inner Join 
													   tbaf_service On tbno_interimaire.CODE_SC 
													   = tbaf_service.CODE_SC 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."' "
					  . "And ETAT_CS = 2 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_SD
													  From tbno_inscrire Inner Join tbaf_sdirection On 
													  tbno_inscrire.CODE_DIR = tbaf_sdirection.CODE_SD  
															Where ETAT_NIV= 3 And tbno_inscrire.CODE_STR =
															'".$sup_mat1['STRUCTURE']."' And "
					  . "tbno_inscrire.DIR = '".$sup_mat1['CODE_SD']."' 
														  And ETAT_INCR in (0,1) ";
			  
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_SC'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_SD'];
			}
	elseif(!empty($s1['sd_interim']))
			{			
			  $sql1="Select Distinct NOM_PRENOMS, LIB_SD
													   From tbno_interimaire Inner Join tbaf_sdirection
													   On tbno_interimaire.CODE_SD = tbaf_sdirection.CODE_SD 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."' And"
					  . " ETAT_CS = 3 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_DC
													  From tbno_inscrire Inner Join tbaf_direction_centre 
													  On tbno_inscrire.CODE_DIR = tbaf_direction_centre.CODE_DC  
															Where ETAT_NIV = 4 And tbno_inscrire.CODE_STR
															= '".$sup_mat1['STRUCTURE']."' And "
					  . "tbno_inscrire.CODE_DIR = '".$sup_mat1['CODE_DC']."' 
														  And ETAT_INCR in (0,1)  ";
			  
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_SD'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_DC'];
			}	
	 elseif(!empty($s1['dc_interim']))
			{	
			  $sql1="Select Distinct NOM_PRENOMS, LIB_DC
													   From tbno_interimaire Inner Join tbaf_direction_centre
													   On tbno_interimaire.CODE_DC = tbaf_direction_centre.CODE_DC 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."'"
					  . "And ETAT_CS = 4 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_DG
													  From tbno_inscrire Inner Join tbaf_direction_gle On
													  tbno_inscrire.CODE_DIR = tbaf_direction_gle.CODE_DG  
															Where ETAT_NIV = 5 And tbno_inscrire.CODE_STR
															= '".$sup_mat1['STRUCTURE']."' And "
					  . "tbno_inscrire.CODE_DIR = '".$sup_mat1['CODE_DG']."' 
														And ETAT_INCR in (0,1)  ";
			  
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_DC'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_DG'];
			}
	 elseif(!empty($s1['dg_interim']))
			{	
			  $sql1="Select Distinct NOM_PRENOMS, LIB_DG
													   From tbno_interimaire Inner Join tbaf_direction_gle 
													   On tbno_interimaire.CODE_DG = tbaf_direction_gle.CODE_DG 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."' "
					  . "And ETAT_CS = 5 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_CAB
													  From tbno_inscrire Inner Join tbaf_cabinet 
													  On tbno_inscrire.CODE_DIR = tbaf_cabinet.CODE_CAB 
															Where ETAT_NIV = 6 And tbno_inscrire.CODE_STR 
															= '".$sup_mat1['STRUCTURE']."' And tbno_inscrire.CODE_DIR = '".$sup_mat1['CODE_CAB']."' 
																	 And ETAT_INCR in (0,1)   ";
			  
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_DG'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_CAB'];
			}
	elseif($s1['cab_interim']==$sup_mat1['CODE_CAB'])
			{		
			  $sql1="Select Distinct NOM_PRENOMS, LIB_CAB
													   From tbno_interimaire Inner Join tbaf_cabinet On 
													   tbno_interimaire.CODE_CAB = tbaf_cabinet.CODE_CAB 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."' "
					  . "And ETAT_CS = 6 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, libelle
													  From tbno_notation Inner Join structure On
													  STRUCTURE = code
															Where ETAT_CS = 7 And tbno_notation.STRUCTURE
															= '".$sup_mat1['STRUCTURE']."' ";
			  
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_CAB'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['libelle'];
			}
	}
else
{	
			//comparer le service du superieur et celui de l'agent
			if(!empty($s1['CODE_SC']))
			{			
			  $sql1="Select Distinct NOM_PRENOMS, LIB_SC
													   From tbno_inscrire Inner Join tbaf_service On 
													   tbno_inscrire.CODE_DIR = tbaf_service.CODE_SC 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."' "
					  . "And ETAT_INCR in (0,1) And ETAT_NIV = 2 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_SD
													  From tbno_inscrire Inner Join tbaf_sdirection On tbno_inscrire.CODE_DIR = tbaf_sdirection.CODE_SD  
															Where ETAT_NIV = 3 And tbno_inscrire.CODE_STR = '".$sup_mat1['STRUCTURE']."' And CODE_DIR = '".$sup_mat1['CODE_SD']."' 
																	 And ETAT_INCR in (0,1)   ";
			  
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_SC'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_SD'];
			}
	elseif(!empty($s1['CODE_SD']))
			{			
			  $sql1="Select Distinct NOM_PRENOMS, LIB_SD
													   From tbno_inscrire Inner Join tbaf_sdirection On 
													   tbno_inscrire.CODE_DIR = tbaf_sdirection.CODE_SD 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."'"
					  . " And ETAT_INCR in (0,1) And ETAT_NIV = 3 ";
			  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_DC
													  From tbno_inscrire Inner Join tbaf_direction_centre 
													  On tbno_inscrire.CODE_DIR = tbaf_direction_centre.CODE_DC  
															Where ETAT_NIV = 4 And tbno_inscrire.CODE_STR 
															= '".$sup_mat1['STRUCTURE']."' And CODE_DIR ="
					  . " '".$sup_mat1['CODE_DC']."' 
																	 And ETAT_INCR in (0,1)   ";
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_SD'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_DC'];
			}	
	 elseif(!empty($s1['CODE_DC']))
			{			
			  $sql1="Select Distinct NOM_PRENOMS, LIB_DC
													   From tbno_inscrire Inner Join tbaf_direction_centre 
													   On tbno_inscrire.CODE_DIR = tbaf_direction_centre.CODE_DC 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."'"
					  . " And ETAT_INCR in (0,1) And ETAT_NIV = 4 ";
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, LIB_DG
													  From tbno_inscrire Inner Join tbaf_direction_gle 
													  On tbno_inscrire.CODE_DIR = tbaf_direction_gle.CODE_DG  
															Where ETAT_NIV = 5 And tbno_inscrire.CODE_STR = 
															'".$sup_mat1['STRUCTURE']."' And CODE_DIR = "
					  . "'".$sup_mat1['CODE_DG']."' 
																	 And ETAT_INCR in (0,1)   ";
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_DC'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_DG'];
			}
	 elseif(!empty($s1['CODE_DG']))
			{		
			  $sql1="Select Distinct NOM_PRENOMS, LIB_DG
													   From tbno_inscrire Inner Join tbaf_direction_gle 
													   On tbno_inscrire.CODE_DIR = tbaf_direction_gle.CODE_DG 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."'"
					  . " And ETAT_INCR in (0,1) And ETAT_NIV = 5 ";
					  
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');			

			  $sql2="Select Distinct NOM_PRENOMS, LIB_CAB
													  From tbno_inscrire Inner Join tbaf_cabinet On 
													  tbno_inscrire.CODE_DIR = tbaf_cabinet.CODE_CAB 
															Where ETAT_NIV = 6 And tbno_inscrire.CODE_STR 
															= '".$sup_mat1['STRUCTURE']."' And CODE_DIR "
					  . "= '".$sup_mat1['CODE_CAB']."' 
																	 And ETAT_INCR in (0,1)   ";
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_DG'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['LIB_CAB'];
			}
	elseif($s1['CODE_CAB']==$sup_mat1['CODE_CAB'])
			{				
			  $sql1="Select Distinct NOM_PRENOMS, LIB_CAB
													   From tbno_inscrire Inner Join tbaf_cabinet On
													   tbno_inscrire.CODE_DIR = tbaf_cabinet.CODE_CAB 
															  Where MATRICULE = '".$sup_mat1['MAT_SUP']."' "
					  . "And ETAT_INCR in (0,1) And ETAT_NIV = 6 ";
			  $data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');

			  $sql2="Select Distinct NOM_PRENOMS, libelle
													  From tbno_notation Inner Join structure On STRUCTURE = code
															Where ETAT_CS = 7 And tbno_notation.STRUCTURE =
															'".$sup_mat1['STRUCTURE']."' ";
			  $data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');

			  $name_sup1=$data_sup_mat1['NOM_PRENOMS'];
			  $srv_name_sup1=$data_sup_mat1['LIB_CAB'];
			  $name_sup2=$data_sup_mat2['NOM_PRENOMS'];
			  $srv_name_sup2=$data_sup_mat2['libelle'];
			}
	}
}
// ANNEE 2013
else{
	
	//search the matricule of the superior 1 
    $sql="Select Distinct mat_sup1 From $tb_evaluer Where mat_agent = '".$matricule."' ";
	$sup_mat1=$this->espace_mod->getSQL('sf', $sql, 'row');
	
	//search the service of the superior 1
  $sql1="Select Distinct ETAT_INCR, CODE_DIR, tbno_inscrire.CODE_STR, NOM_PRENOMS, tbaf_direction_gle.CODE_DG, LIB_DG, tbaf_direction_centre.CODE_DC, LIB_DC, tbaf_sdirection.CODE_SD, LIB_SD, tbaf_service.CODE_SC,LIB_SC 
	                      From tbno_inscrire Left Join tbaf_direction_gle On tbno_inscrire.CODE_DIR = tbaf_direction_gle.CODE_DG 
						                     Left Join tbaf_direction_centre On tbno_inscrire.CODE_DIR = tbaf_direction_centre.CODE_DC 
											 Left Join tbaf_sdirection On tbno_inscrire.CODE_DIR = tbaf_sdirection.CODE_SD 
											 Left Join tbaf_service On tbno_inscrire.CODE_DIR = tbaf_service.CODE_SC
						     Where MATRICULE = '".$sup_mat1['mat_sup1']."' ";
							 
	$data_sup_mat1=$this->espace_mod->getSQL('sf', $sql1, 'row');
	
	//find the data of the superior 1
	$name_sup1=$data_sup_mat1['NOM_PRENOMS'];
	
	if(!empty($data_sup_mat1['LIB_DG']))
	{
		$srv_name_sup1=$data_sup_mat1['LIB_DG'];
		$sql2="Select Distinct NOM_PRENOMS, X.libelle
							  From tbno_notation Inner Join 
								 (
								   Select Distinct tbaf_direction_gle.CODE_STR, libelle
							         From tbaf_direction_gle Inner Join structure On tbaf_direction_gle.CODE_STR = structure.code
								       Where tbaf_direction_gle.CODE_DG = '".$data_sup_mat1['CODE_DG']."'
								 )As X On tbno_notation.STRUCTURE = X.CODE_STR
								 
								Where ETAT_CS = 6 ";
	}
	elseif(!empty($data_sup_mat1['LIB_DC']))
	{
		$srv_name_sup1=$data_sup_mat1['LIB_DC'];
		$sql2="Select Distinct NOM_PRENOMS, X.libelle
							  From tbno_notation Inner Join 
								 (
								   Select tbaf_direction_centre.CODE_DG, LIB_DG As libelle
							   From tbaf_direction_centre Inner Join tbaf_direction_gle On tbaf_direction_centre.CODE_DG = tbaf_direction_gle.CODE_DG
								  Where tbaf_direction_centre.CODE_DC = '".$data_sup_mat1['CODE_DC']."'
								 )As X On tbno_notation.CODE_DG = X.CODE_DG
								 
								Where ETAT_CS = 5  ";
	}
	elseif(!empty($data_sup_mat1['LIB_SD']))
	{
		$srv_name_sup1=$data_sup_mat1['LIB_SD'];
		$sql2="Select Distinct NOM_PRENOMS, X.libelle
							  From tbno_notation Inner Join 
								 (
								   Select tbaf_direction_centre.CODE_DC, LIB_DC As libelle
							         From tbaf_sdirection Inner Join tbaf_direction_centre On tbaf_sdirection.CODE_DC = tbaf_direction_centre.CODE_DC
								  Where tbaf_sdirection.CODE_SD = '".$data_sup_mat1['CODE_SD']."'
								 )As X On tbno_notation.CODE_DC = X.CODE_DC
								 
								Where ETAT_CS = 4 ";
	}
	elseif(!empty($data_sup_mat1['LIB_SC']))
	{
		$srv_name_sup1=$data_sup_mat1['LIB_SC'];
		$sql2="Select Distinct NOM_PRENOMS, X.libelle
							  From tbno_notation Inner Join 
								 (
								   Select tbaf_sdirection.CODE_SD, LIB_SD As libelle
							         From tbaf_service Inner Join tbaf_sdirection On tbaf_service.CODE_SD = tbaf_sdirection.CODE_SD
								  Where tbaf_service.CODE_SC = '".$data_sup_mat1['CODE_SC']."'
								 )As X On tbno_notation.CODE_SD = X.CODE_SD
								 
								Where ETAT_CS = 3 ";
	}
	//find the data of the superior 2
	$data_sup_mat2=$this->espace_mod->getSQL('sf', $sql2, 'row');
	
	$name_sup2=$data_sup_mat2['NOM_PRENOMS'];
	$srv_name_sup2=$data_sup_mat2['libelle'];	

	}

//return $name_sup1.'*'.$srv_name_sup1.'*'.$name_sup2.'*'.$srv_name_sup2;	
?>