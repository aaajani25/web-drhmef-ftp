<p>&nbsp;</p>
<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">MESSAGERIE ELECTRONIQUE GOUVERNEMENTALE</h1>
  </div>
</div>

<?php 
$name=0;
$message='';

if(!empty($_POST)) 
{
	//print_r($_POST); exit;
	
  $name=$_POST['name'];
  
  if(!empty($_POST['deuxiemeetape']))
   {
	 if(empty($_POST['choix'])) 
	 {
		$name=1;
		$message='<font color="#FF0000">veuillez renseigner les champs obligatoires</font>'; 
	 }
   }
   
  if(!empty($_POST['quatriemeetape']))
  {
	$mat=$_POST['mat'];
	$nom=addslashes($_POST['nom']);
	$prenom=addslashes($_POST['prenom']);
	$epouse=addslashes($_POST['epouse']);
	$grade=$_POST['grade'];
	$entite=addslashes($_POST['entite']);
	$direction=addslashes($_POST['direction']);
	$fonction=addslashes($_POST['fonction']);
	$localisation=addslashes($_POST['localisation']);
	$matricule=addslashes($_POST['matricule']);
	$contact=addslashes($_POST['contact']);
	$adresse=addslashes($_POST['adresse']);
    $ville_quartier=addslashes($_POST['ville_quartier']);
	$prenom_usuel=addslashes($_POST['prenom_usuel']);
	$batiment=addslashes($_POST['batiment']);
	$etage=addslashes($_POST['etage']);
	
	if(!empty($mat) && !empty($nom) && !empty($prenom) && !empty($grade) && !empty($entite) && !empty($direction) && !empty($fonction) && !empty($matricule)&& !empty($contact) )
	{
		$valeur=array('Matricule'=>"'$mat'", 'Nom'=>"'$nom'", 'Prenom'=>"'$prenom'", 'Epouse'=>"'$epouse'", 'Grade'=>"'$grade'", 'Entite'=>"'$entite'", 'Direction'=>"'$direction'", 'Fonction'=>"'$fonction'", 'Localisation'=>"'$localisation'", 'Contact'=>"'$contact'", 'Adresse'=>"'$adresse'", 'Ville'=>"'$ville_quartier'", 'PrenomUsuel'=>"'$prenom_usuel'", 'Batiment'=>"'$batiment'", 'Etage'=>"'$etage'");
		
		$table="ansult_compte"; 
		$base="dba_mfprasitepro_nv";
		$critere = "Where Matricule = '".$mat."' ";
		
		//controle avant insertion
		$check= $this->$model->table_ckeck($critere, $table, $base);
		
		if($check==0)
		{
			$ex= $this->$model->table_insert($valeur,$table, $base);
			
			if($ex==1)
			{
			  $name=4;
			  //envoi de mail
			  $objet="CREATION COMPTE TRANSMISSION ";
			  $contenu="<table align='center' width='700'>";
			  $contenu.="<tr>";
			  $contenu.="<td>Matricule</td><td>Nom</td><td>Prenom</td><td>Epouse</td><td>Grade</td><td>Entite</td><td>Direction</td><td>Fonction</td><td>Localisation</td><td>Contact</td><td>Adresse</td><td>Ville</td><td>PrenomUsuel</td><td>Batiment</td><td>Etage</td>";
			  $contenu.="</tr>";
			  $contenu.="<tr>";
			  $contenu.="<td>$mat</td><td>$nom</td><td>$prenom</td><td>$epouse</td><td>$grade</td><td>$entite</td><td>$direction</td><td>$fonction</td><td>$localisation</td><td>$contact</td><td>$adresse</td><td>$ville_quartier</td><td>$prenom_usuel</td><td>$batiment</td><td>$etage</td>";
			  $contenu.="</tr>";
			  $contenu.="</table>";
			 // $this->$model->sendtomail($objet, $contenu);
			}
		   else
		    {
			  $message='<font color="#FF0000">Erreur insertion base</font>';
			  $name=2;	
			}
		}
	   else
	    {
		  $message='<font color="#FF0000">D&eacute;sol&eacute;!! vous avez une demande en cours</font>';
		  $name=2;		
		}
	}
   else
    {
		$message='<font color="#FF0000">veuillez renseigner les champs obligatoires</font>';
		$name=2;
	}
  }
  
  if(!empty($_POST['troisiemeetape']))
  {
	$mat=$_POST['mat'];
	$nom=addslashes($_POST['nom']);
	$prenom=addslashes($_POST['prenom']);
	$epouse=addslashes($_POST['epouse']);
	$identifiant=$_POST['identifiant'];
	$entite=addslashes($_POST['entite']);
	$commentaire=addslashes($_POST['commentaire']);
	
	if(!empty($mat) && !empty($nom) && !empty($prenom) && !empty($identifiant) && !empty($entite) )
	{
		$valeur=array('Matricule'=>"'$mat'", 'Nom'=>"'$nom'", 'Prenom'=>"'$prenom'", 'Epouse'=>"'$epouse'", 'Identifiant'=>"'$identifiant'", 'Entite'=>"'$entite'", 'Commentaire'=>"'$commentaire'"); 
		
		$table="ansult_pass_init"; 
		$base="dba_mfprasitepro_nv";
		$critere = "Where Matricule = '".$mat."' ";
		
		//controle avant insertion
		$check= $this->$model->table_ckeck($critere, $table, $base);
		
		if($check==0)
		{
			$ex= $this->$model->table_insert($valeur,$table, $base);
			
			if($ex==1)
			{
			  $name=3;
			  //envoi de mail
			  $objet="INITIALISATION COMPTE ";
			  $contenu="<table align='center' width='700'>";

			  $contenu.="<tr>";
			  $contenu.="<td>Matricule</td><td>Nom</td><td>Prenoms</td><td>Epouse</td><td>Identifiant</td><td>Entite</td><td>Commentaire</td>";
			  $contenu.="</tr>";
			  $contenu.="<tr>";
			  $contenu.="<td>$mat</td><td>$nom</td><td>$prenom</td><td>$epouse</td><td>$identifiant</td><td>$entite</td><td>$commentaire</td>";
			  $contenu.="</tr>";
			  $contenu.="</table>";
			  //$this->$model->sendtomail($objet, $contenu);	
			}
		   else
		    {
			  $message='<font color="#FF0000">Erreur insertion base</font>';
			  $name=2;	
			}
		}
	   else
	    {
		  $message='<font color="#FF0000">D&eacute;sol&eacute;!! vous avez une demande en cours</font>';
		  $name=2;		
		}
	}
   else
    {
		$message='<font color="#FF0000">veuillez renseigner les champs obligatoires</font>';
		$name=2;
	}
  }
  
} 

?>
<br />
<?php 
if($name==0)
{
?>
<form name="frn_0" method="post">
<fieldset style="border-color:#008001; text-align:center;">
 <table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
   <tr height="35">
      <td bgcolor="#008001" class="titre_etape_ansult">Réactivez votre compte de Messagerie Electronique Gouvernementale ou demandez-la !</td>
   </tr>
   <tr>
      <td class="contenu_etape"><br />
           <p>Grades A3 &agrave; A7, Chefs de Service, Secr&eacute;taires de Direction ou encore Assistantes de Direction ? Cr&eacute;ez votre compte de Messagerie Gouvernementale ou faite r&eacute;initialiser votre mot de passe.</p>
           <br />
           <p>Vous avez une messagerie &eacute;lectronique professionnelle mais vous ne vous souvenez plus de votre mot de passe ?</p>
           <br />
           <p>N'h&eacute;sitez pas, compl&eacute;tez ce rapide formulaire et faites en l&agrave; demande !</p>
           <br />
           <p>
              <input name="premiereetape" type="submit" value="SUIVANT"   class="btn btn-etape" />
              <input name="name" type="hidden" value="1" /><input name="mat" type="hidden" value="<?php echo $this->session->userdata('MATRICULE') ?>" />
           </p>
      </td>
   </tr>
 </table>
</fieldset>
</form>
<?php 
}
if($name==1)
{
?>
<form name="frn_1" method="post">
<fieldset style="border-color:#008001; text-align:center;">

 <table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
   <tr height="35">
      <td bgcolor="#008001" class="titre_etape_ansult">Réactivez votre compte de Messagerie Electronique Gouvernementale ou demandez-la !</td>
   </tr>
   <tr>
      <td class="contenu_etape"><br /><?php if(!empty($message)) {echo $message.'<br>';} ?>
           <p style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;Je souhaite :</p>
           <br />
           <p style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;<input class="choix" name="choix" type="radio" value="1"/>&nbsp;&nbsp;R&eacute;initialiser mon mot passe</p>
           <br />
           <p style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="choix" type="radio" value="2" />&nbsp;&nbsp;Cr&eacute;er mon compte de messagerie &eacute;lectronique Gouvernementale</p>
           <br />
           <p>
              <input name="deuxiemeetape" type="submit" value="SUIVANT" class="btn btn-etape"/>
              <input name="name" type="hidden" value="2" /><input name="mat" type="hidden" value="<?php echo $this->session->userdata('MATRICULE') ?>" />
           </p>
      </td>
   </tr>
 </table>
</fieldset>
</form>
<?php
}
elseif($name==2 && $_POST['choix']== 1)
{
 //renvoyer les infos dun agent
 $x=$this->$model->load_infoagent($_POST['mat']);
?>
<form name="frn_2" method="post">
<fieldset style="border-color:#008001; text-align:center;">
 <table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
   <tr height="35">
      <td bgcolor="#008001" class="titre_etape_ansult">Je souhaite r&eacute;initialiser mon mot passe</td>
   </tr>
   <tr>
     <td class="contenu_etape"><br /><?php if(!empty($message)) {echo $message.'<br>';} ?>
         <table border="0" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Nom * : </td>
              <td align="left" width="70%"><input name="nom" type="text" value="<?php echo $x['CE_AGT_NOM'] ?>" style="width:350px;"/></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Pr&eacute;nom * : </td>
              <td align="left" width="70%"><input name="prenom" type="text" value="<?php echo $x['CE_AGT_PREN'] ?>" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Nom d'&eacute;pouse s'il y a lieu : </td>
              <td align="left" width="70%"><input name="epouse" type="text" value="<?php echo $x['CE_AGT_NOMJFIL'] ?>" style="width:350px;"/></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Entit&eacute; actuelle * :</td>
              <td align="left" width="70%"><select name="entite"><option value="<?php echo $x['libelle'] ?>"><?php echo $x['libelle'] ?></option></select></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Adresse messagerie * :</td>
              <td align="left" width="70%"><input name="identifiant" type="text" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Commentaires</td>
              <td align="left" width="70%"><textarea name="commentaire" cols="" rows="" style="width:700px; height:70px;"></textarea></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;* Information obligatoire</td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
                <td colspan="2">
                <input name="troisiemeetape" type="submit" value="VALIDER" class="btn btn-etape" >
                <input name="name" type="hidden" value="3" /><input name="choix" type="hidden" value="1" /><input name="mat" type="hidden" value="<?php echo $this->session->userdata('MATRICULE') ?>" />
                </td>
           </tr>
         </table>
     </td>
   </tr>
 </table>
</fieldset>
</form>
<?php	
}
elseif($name==2 && $_POST['choix']== 2)
{
 //renvoyer les infos dun agent
 $x=$this->$model->load_infoagent($_POST['mat']);
?>
<form name="frn_2" method="post">
<fieldset style="border-color:#008001; text-align:center;">
 <table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
   <tr height="35">
      <td bgcolor="#008001" class="titre_etape_ansult">Je souhaite cr&eacute;er mon compte de messagerie &eacute;lectronique Gouvernementale</td>
   </tr>
   <tr>
     <td><br /><?php if(!empty($message)) {echo $message.'<br>';} ?>
         <table border="0" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Nom* : </td>
              <td align="left" width="70%"><input name="nom" type="text" value="<?php echo $x['CE_AGT_NOM'] ?>" style="width:350px;"/></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Pr&eacute;nom* : </td>
              <td align="left" width="70%"><input name="prenom" type="text" value="<?php echo $x['CE_AGT_PREN'] ?>" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Nom d'&eacute;pouse s'il y a lieu : </td>
              <td align="left" width="70%"><input name="epouse" type="text" value="<?php echo $x['CE_AGT_NOMJFIL'] ?>" style="width:350px;"/></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Entit&eacute; actuelle* :</td>
              <td align="left" width="70%"><select name="entite"><option value="<?php echo $x['libelle'] ?>"><?php echo $x['libelle'] ?></option></select></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Grade* :</td>
              <td align="left" width="70%"><select name="grade"><option value="<?php echo $x['PA_GRADE_LIB'] ?>"><?php echo $x['PA_GRADE_LIB'] ?></option></select></td>
           </tr>
           <tr>
                <td colspan="2">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Direction* :</td>
              <td align="left" width="70%"><input name="direction" type="text" style=" width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Fonction* :</td>
              <td align="left" width="70%"><input name="fonction" type="text" style=" width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Localisation G&eacute;ographique  :</td>
              <td align="left" width="70%"><input name="localisation" type="text" style=" width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Matricule*  :</td>
              <td align="left" width="70%"><input name="matricule" type="text" value="<?php echo $x['CE_AGT_MAT'] ?>" readonly style="width:350px;"/></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Téléphone*  :</td>
              <td align="left" width="70%"><input name="contact" type="text" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Ville/quartier* :</td>
              <td align="left" width="70%"><input name="ville_quartier" type="text" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Prénom Usuel :</td>
              <td align="left" width="70%"><input name="prenom_usuel" type="text" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Bâtiment* :</td>
              <td align="left" width="70%"><input name="batiment" type="text" style="width:350px;" /></td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
              <td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;Etage :</td>
              <td align="left" width="70%"><input name="etage" type="text" style="width:350px;" /></td>
           </tr>
            <tr>
                <td colspan="2" align="left">&nbsp;</td>
           </tr>
           <tr>
                <td colspan="2" align="left">&nbsp;* Information obligatoire</td>
           </tr>
           <tr>
                <td colspan="2">
                <input name="quatriemeetape" type="submit" value="VALIDER" class="btn btn-etape"/>
                <input name="name" type="hidden" value="4" /><input name="choix" type="hidden" value="2" /><input name="mat" type="hidden" value="<?php echo $this->session->userdata('MATRICULE') ?>" />
                </td>
           </tr>
         </table>
     </td>
   </tr>
 </table>
</fieldset>
</form>
<?php
}
elseif($name==3 || $name== 4)
{
?>
<form name="frn_5" method="post" action="index.php?actes=sit_admin">
<fieldset style="border-color:#008001; text-align:center;">
 <table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="#008001">
   <tr height="35">
      <td><br>
          <p>Votre demande &agrave; bien &eacute;t&eacute; enregistr&eacute;e, nous vous en remercions !</p><br>
          <p>Vos identifiants vous seront communiqués dans votre espace fonctionnaire après examen de votre demande par l'un de nos agents.</p><br>
          <p>En cas de difficulté avec votre Messagerie Gouvernementale, n'hésitez pas à contacter le support utilisateur via le 22 52 20 20 ou par mail : support@egouv.ci</p><br>
          <p>Retrouvez tous nos modules de formation de votre Messagerie Gouvernementale sur www.egouv.ci dans l'onglet Formation.</p><br>
          <p><a href="<?php echo $link2.'/accueil'; ?>" class="btn btn-primary">Retour espace fonctionnaire</a></p>
      </td>
   </tr>
   
 </table>
</fieldset>
</form>
<?php	
}
?>
