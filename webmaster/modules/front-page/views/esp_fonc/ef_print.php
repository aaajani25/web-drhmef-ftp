<?php
switch ($this->uri->segment(2)) {
     case 'navigator': $model = 'nav_mod';
          break;
     case 'espace_fonctionnaire': $model = 'espace_mod';
          break;
}

// logo
$logo = $this->espace_mod->read_row_l
        (
        '_logo', array('etat' => 'on'), array('id', 'desc'), 1
);
// -- logo
// armoirie
$armoirie = $this->espace_mod->read_row_l
        (
        '_armoirie', array('etat' => 'on'), array('id', 'desc'), 1
);
// -- armoirie
// info agent
include('data_session.php');

 if($this->session->userdata('sexe')=='M')
 {
     $photos=base_url()."/assets/espace_fon/images/avatars/av-m.jpg";
 }
 else if($this->session->userdata('sexe')=='F')
 {
    $photos=base_url()."/assets/espace_fon/images/avatars/av-f.jpg"; 
 }

 $test_file=base_url() ."/assets/espace_fon/photos/" . $this->session->userdata('matricule').'.jpg';
 
    if(file_exists($test_file))
    {
      $photos =$test_file;
    }

?>
<style type="text/css">
     #container{border:1px solid #CCC; width:700px; margin-left:33px; margin-top:5px; padding:5px; position:relative; height:auto; font-size:10px}
     #container .str{margin-bottom:9px; max-width:700px;position:relative;}
     #container .str_ctn, .ef{
	position: absolute;
	left: 2px;
}
     #container .h1{
	width: 105px
}
     #container .h2{
	margin-left: 200px;
	width: 324px
}
     #container .h3{
	margin-left: 630px;
	width: 69px
}
     #container .str_1{background-color:#F5F5F5; border-bottom:1px solid #CCC; height:80px;}
     .content{color:#C00; font-weight:bold}
     .titre{padding:5px; background-color:#FF8C00; color:#FFF; font-weight:bold}
     #container .ef_1{width:175px}
     #container .ef_2{width:175px; margin-left:175px}
     #container .ef_3{width:175px; margin-left:350px}
     #container .ef_4{width:175px; margin-left:525px}
     table.t2 {width:100%; border-collapse:collapse; padding:10px;}

     .tab_div{width:90%; margin-left:57px;}
     #footer{padding:10px; margin:5px 25px 0px 25px; font-size:10px; font-weight:bold; color:#666}
.content1 {color:#C00; font-weight:bold}
.content1 {color:#C00; font-weight:bold}
</style>
<div id="container">
    <div class="str str_1">
          <div class="str_ctn h2">
          <h2><span class="titre_ef"> ESPACE AGENT </span></h2>
          </div>
    </div>
    <div class="str" align="center">
        <img src="<?php echo $photos;?> "/><br>
          <b><?php
               echo $civ;
               echo '&nbsp;';
               echo $this->session->userdata('nom');
               echo '&nbsp;';
               ?></b><br><span class="content" style=" text-transform:uppercase;"><?php
               echo $this->session->userdata('matricule');
               echo ' - ';
               echo $this->session->userdata('emploi');
               ?></span>
     </div>
    <div class="str titre">INFORMATIONS GENERALES</div>
    <div class="str tab_div">
          <div class="">
               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%">Matricule :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('matricule') ?></span></td>

                              <td style="text-align:left; width:50%">Téléphone :&nbsp; <span class="content1"><?php echo $this->session->userdata('tel_bureau') ?></span></td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%"> Nom et Prénoms :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('nom') ?>&nbsp;<?php echo $this->session->userdata('PRENOMS') ?></span></td>

                              <td style="text-align:left; width:50%">Cellulaire :&nbsp; <span class="content"><?php echo $this->session->userdata('cellulaire') ?></span></td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%">Nom de jeune fille :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('NOMJFILLE') ?></span></td>

                              <td style="text-align:left; width:50%">Adresse : <span class="content"><?php echo $this->session->userdata('adresse') ?></span></td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%">  Date de Naissance :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('date_nais') ?></span></td>

                              <td style="text-align:left; width:50%">Email :&nbsp; <span class="content"><?php echo $this->session->userdata('email') ?></span></td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%"> Lieu de Naissance :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('lieu_nais') ?></span></td>

                              <td style="text-align:left; width:50%">Situation Famille :&nbsp; <span class="content"><?php echo $this->session->userdata('sitmat') ?></span></td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%">  Nom du Père :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('nom_pere') ?></span></td>

                              <td style="text-align:left; width:50%">Nombre d'enfant :&nbsp; <span class="content"><?php echo $this->session->userdata('nbre_enft') ?></span></td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
                              <td style="text-align:left; width:50%"> Nom de la Mère :&nbsp;
                                   <span class="content"><?php echo $this->session->userdata('nom_mere') ?></span></td>
                              <td style="text-align:left; width:50%">&nbsp;</td>
                         </tr>
                    </table>
               </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
				  <td style="text-align:left; width:50%">Sexe :
					   <span class="content"><?php echo $this->session->userdata('sexe') ?></span></td>
				  <td style="text-align:left; width:50%">&nbsp;</td>
                         </tr>
                    </table>
               </div>
          </div><!-- ok -->
     </div>
    <div class="str titre"><strong>RENSEIGNEMENTS ADMINISTRATIFS</strong></div>
    <div class="str tab_div">
          <!--<div class="row">-->
	   <table style="width:100%">
		  <tr>
			<td height="125" style="vertical-align:top; width:50%"> 

              <table style="width:100%">
                  <tr class="">
                       <td style="text-align:left; width:50%;">Structure : <br><span class="content"><?php echo "MINISTERE DE l'ECONOMIE ET DES FINANCES ";?></span></td>
                  </tr>
				  <tr class="">
                      <td style="text-align:left; width:50%">Direction Générale : <br> <span class="content"><?php echo $this->session->userdata('lib_dg') ?></span></td>
                  </tr>
				  <tr class="">
					  <td style="text-align:left; width:50%">Direction Centrale : <br><span class="content"><?php echo $this->session->userdata('lib_dir') ?></span></td>
				  </tr>
				  <tr class="">
					  <td class="" style="text-align:left; width:50%">Date prise de service : <span class="content"><?php echo $this->session->userdata('date_1ere_ps') ?></span></td>
				  </tr>
				  <tr class="">
					  <td class="" style="text-align:left; width:50%">Emploi : <span class="content"><?php  echo $this->session->userdata('emploi');?></span></td>
				  </tr>
             </table>

                 </td>
                    <td height="125" style="width:50%; vertical-align:top;"> 
         
				  <table style="width:100%;">
					   <tr class="">
							<td style="text-align:left; width:50%;">Type Agent :<br> <span class="content"><?php echo $this->session->userdata('type_agent') ?></span></td>
					   </tr>
					   <tr class="">
							<td style="text-align:left; width:50%">Grade : <span class="content"><?php echo $this->session->userdata('grade') ?></span></td>
					   </tr>
					   <tr class="">
							<td style="text-align:left; width:50%">Classe/Echelon  : <span class="content"><?php echo $this->session->userdata('echelle');?></span></td>
					   </tr>
					   <tr class="">
							<td style="text-align:left; width:50%">Date de depart à la retraite : <span class="content"><?php echo $this->session->userdata('date_retraite') ?></span></td>
					   </tr>
				  </table>
			  </td>
		</tr>
   </table> 
   <!--</div>-->
          
     </div>
     <div class="str titre"><strong>EXPERIENCES PROFESSIONNELLES</strong></div>
     <div class="str tab_div">
          <div class="">
               <div class="row">
                 <table style="width:100%">
			        <tr>
			<td style="text-align:left; width:50%">Fonction Actuelle : </td>
			<td style="text-align:left; width:50%"><span class="content"><?php echo $this->session->userdata('fonction') ?></span></td>
			       </tr>
				  </table>
               </div>

               <div class="row">
                 <table style="width:100%">
                         <tr>
				<td style="text-align:left; width:50%">Date d'entrée : </td>
				<td style="text-align:left; width:50%"><span class="content"><?php echo $this->session->userdata('date_emploi') ?></span></td>
                         </tr>
				   </table>
			  </div>

               <div class="row">
                    <table style="width:100%">
                         <tr>
			  <td style="text-align:left; width:50%">Acte de nomination :&nbsp;</td>
			  <td style="text-align:left; width:50%"><span class="content"><?php echo $this->session->userdata('hfonc_reference') ?></span></td>
                         </tr>
				   </table>
			  </div>

          </div>
      </div>
</div>
<div id="footer">&copy; <?php echo @date('Y') ?>, RCI - <?php echo $logo['titre'] ?>, Espace Agent. </div>
