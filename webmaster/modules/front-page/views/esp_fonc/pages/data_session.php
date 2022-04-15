<?php		
	// declaration des tables
	$tab1 = 'inscription_agent_1';
	$tab2 = 'situation_agent_maj';
	
	// INFORMATIONS GENERALES
	$rek_info_gen="select inscription_agent_1.*, LIB_SPREF from inscription_agent_1 left join tbaf_spref on lieunaiss=CODE_SPREF where matricule='".$this->session->userdata('MATRICULE')."'";
	
	 $table = $this->$model->getSQL('db', $rek_info_gen, 'row');
//	 print_r($table);

/*####################### PARAMETRAGE DES INFOS GEN #################*/
	// CNI
	if(!empty($table['numcni']))
	{
		$cni = $table['numcni'];
		$tb_cni = $tab1;
		$col_cni = 'numcni';
	} else { 
		$cni = $this->session->userdata('NUMCNI');
		$tb_cni = $tab2;
		$col_cni = 'NUMCNI';
	}
	
	// date cni
	if(!empty($table['date_cni']))
			{
				$datecni = $table['date_cni'];
				$tb_datecni = $tab1;
				$col_datecni = 'date_cni';
	} else { 
			$datecni = $this->session->userdata('DATECNI');
			$tb_datecni = $tab2;
			$col_datecni = 'DATECNI';
		}
	
	// lieu de naissance	  
	if(!empty($table['lieunaiss'])){
		$lieu = $table['LIB_SPREF'];
		$tb_lieu = $tab1;
		$col_lieu = 'lieunaiss';
	} 
	else{
		$lieu = $this->session->userdata('LIEUNAISS');
		$tb_lieu = $tab2;
		$col_lieu = 'LIEUNAISS';
	}
	
	// telephone
	if(!empty($table['tel'])){
		$tel = $table['tel'];
		$tb_tel = $tab1;
		$col_tel = 'tel';
	} 
	else{
		$tel = $this->session->userdata('TEL');
		$tb_tel = $tab2;
		$col_tel = 'TEL';
	}
	
	// cellulaire
	if(!empty($table['cel'])){
		$cell = $table['cel'];
		$tb_cell = $tab1;
		$col_cell = 'cel';
	} 
	else{
		$cell = $this->session->userdata('CELL');
		$tb_cell = $tab2;
		$col_cell = 'CELL';
	}
	
	// adresse
	if(!empty($table['adrs'])){
		$adr = $table['adrs'];
		$tb_adr = $tab1;
		$col_adr = 'adrs';	
	} 
	else{
		$adr = $this->session->userdata('ADRESSE');
		$tb_adr = $tab2;
		$col_adr = 'ADRESSE';	
	}
?>