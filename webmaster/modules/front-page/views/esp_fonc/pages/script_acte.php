<?php 
 // acte numérisé - download
 $upload_acte = $this->espace_mod->read_row(
	'upload_acte', 
	array('matricule' =>$this->session->userdata('MATRICULE'),'numero'=>$acte['num_actes'])
 );
 
 $date_signature = explode('/', $acte['date_signe']);
 $signature = $date_signature[2].$date_signature[1];
  
 if($upload_acte && $signature > 201207){
	 $fichier = $upload_acte['fichier'];
	 $info_acte = '<a href="/upload_acte/dir_acte/'.$fichier.'" title="Télécharger l\'acte" target="_blank"><img src="'.base_url('assets/espace_fon/images/pdf2.png').'" alt="pdf" width="30" heigth="35" /></>';
 }
 else{
	 // disponible aux archives												 						 
	 if(($acte['etat']=="ACTE SIGNE") && ($signature < 201207)){
		 $info_acte = "Disponible aux archives";
	 }
	 // en traitement
	 elseif(($acte['libelle_acte']!="TITULARISATION") && ($acte['etat']=="DOCUMENT SAISI")){
		 $info_acte = "En traitement";
	 }
	 // non encore numérisé
	 else{
		$info_acte = "Acte non délivré";	 
	 }
 } 
?>