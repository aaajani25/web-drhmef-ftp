<?php		
//function notation2014($matricule, $annee, $periode){   
    		$annee = $this->input->get_post('y');
            $periode = $this->input->get_post('t');
            $matricule = $this->session->userdata('MATRICULE');
			                    
            $requete="SELECT DISTINCT note_sup1,mat_sup1,note_valideur,note_chiffre_sup2,total,total_coef,appreciation_sup,
            avancement_sup,lib_critere,critere.id_critere,critere.coef_critere,evaluer$annee.id_notation,
                no.valider,periode.id_periode AS id_periode
            
            FROM notation$annee no, evaluer$annee, critere, periode 
                
            WHERE evaluer$annee.mat_agent= no.agentmatricule
            AND no.agentmatricule = '".$matricule."' 
            AND no.periodeid_periode=periode.id_periode
            AND evaluer$annee.id_periode=periode.id_periode 
            AND periode.id_periode='".$periode."'
            AND critere.id_critere=evaluer$annee.id_critere";
                       
            $crvalider=$this->$model->getSQL('sf', $requete, '');         

            $rek="SELECT STRUCTURE,CODE_DG, CODE_DC,CODE_SD,CODE_SC,ETAT_CS "
                    . "FROM tbno_notation WHERE MATRICULE='".$matricule."'";
            
            $table=$this->$model->getSQL('sf', $rek, 'row');           
            
            if(!empty($table['CODE_SC'])) {
		if($table['ETAT_CS']==1){
		$chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (CODE_SD='".$table['CODE_SD']."' AND ETAT_CS=3) OR ( CODE_SC='".$table['CODE_SC']."' AND ETAT_CS=2 ) ORDER BY ETAT_CS ASC ";
                }else{ 
		$chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (CODE_DC='".$table['CODE_DC']."' AND ETAT_CS=4) OR ( CODE_SD='".$table['CODE_SD']."' AND ETAT_CS=3 ) ORDER BY ETAT_CS ASC ";
                }
            }
            elseif(!empty($table['CODE_SD'])) {
                    if($table['ETAT_CS']==1){
                    $chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (CODE_DC='".$table['CODE_DC']."' AND ETAT_CS=4) OR ( CODE_SD='".$table['CODE_SD']."' AND ETAT_CS=3 ) ORDER BY ETAT_CS ASC ";
                    } else{
                    $chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (CODE_DG='".$table['CODE_DG']."' AND ETAT_CS=5) OR ( CODE_DC='".$table['CODE_DC']."' AND ETAT_CS=4 ) ORDER BY ETAT_CS ASC ";
            }}
            elseif(!empty($table['CODE_DC'])) {
                    if($table['ETAT_CS']==1){
                    $chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (CODE_DG='".$table['CODE_DG']."' AND ETAT_CS=5) OR ( CODE_DC='".$table['CODE_DC']."' AND ETAT_CS=4 ) ORDER BY ETAT_CS ASC ";
                    }else{
                    $chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (STRUCTURE='".$table['STRUCTURE']."' AND ETAT_CS=6) OR ( CODE_DG ='".$table['CODE_DG']."' AND ETAT_CS=5 )  ORDER BY ETAT_CS ASC ";
            }}
            elseif(!empty($table['CODE_DG'])) {
                    if($table['ETAT_CS']==1){
                    $chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (STRUCTURE='".$table['STRUCTURE']."' AND ETAT_CS=6) OR ( CODE_DG ='".$table['CODE_DG']."' AND ETAT_CS=5 )  ORDER BY ETAT_CS ASC ";
                    } else {
                    $chs="SELECT NOM_PRENOMS, MATRICULE FROM tbno_notation WHERE  (STRUCTURE='".$table['STRUCTURE']."' AND ETAT_CS=6)";
            }}

            $supwhile=$this->$model->getSQL('sf', $chs, 'row');
            
           // return $crvalider.'-'.$table.'-'.$supwhile;
        //}
?>