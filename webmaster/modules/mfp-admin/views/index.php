<?php
	$ctrl = 'mfp-admin/connex';

	 // logo
	$logo = $this->connex_mod->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// armoirie
	$armoirie = $this->connex_mod->read_row_l
	(
		'_armoirie',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- armoirie
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
<title>:. Module d'administration du site de la Direction des Ressources  Humaines du MEF .:</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>">
<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet" type="text/css" />

    <!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,300italic,100italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
<!-- google font -->

<style type="text/css">
/* body{background-color:#F5F5F5}*/
.all{/*background-color:#FFF;*/ width:400px; margin:0px auto; padding-top:40px}
.border-box{background-color:#FD4600; height:3px;}
.titre-log p{font-family:'Open Sans'; font-size:18px}
.connect{box-shadow: 1px 11px 12px #CCCCCC; background-color:#FFF}
#footer-log{width:100%; margin:0px auto; padding:20px 0; bottom:0; position:absolute; text-align:center;border-top:2px solid #CCC; background-color:#CCC; color:#333; border-top:1px solid #999;}
#top{/*border-bottom:1px solid #CCC;*/ padding:4px; margin:0px 15px; font-size:20px; font-family:'Oswald'; font-weight:bold; color:#FD4600}
.btn{width:250px; height:48px; border-radius:5px; border:none; font-size:20px; font-family:'Merriweather sans'; transition:all 0.5s ease-in-out}

.btn-login{ background-color:#036D00; color:#FFF;  border:1px solid #036D00;}
.btn-valider{ background-color:#FD4600; color:#FFF;  border:1px solid #FD4600;}

.btn:hover{cursor:pointer; background:#093; color:#FFF}
.cds_log{width:350px; height:33px; border:none; border-bottom:1px solid #CCC; font-size:16px}
.cds{width:350px; height:33px; border:none; border:1px solid #CCC; font-size:16px}
option{padding:8px; cursor:pointer}
.msg{
	/*border-radius:5px;	*/
	text-align:center;
	padding:10px;
	margin:0px 15px 5px 15px;
}

.msg-erreur{
	border-bottom:1px solid #BF0000;
	background-color:#FFBFBF;
	color:#BF0000;
}

.msg-succes{
	border:1px solid #007500;
	background-color:#C4FFC4;
	color:#007500;
}
.VYMape {
		background: #999;
		bottom: 0;
		direction: rtl;
		left: 0;
		overflow: hidden;
		position: absolute;
		right: 0;
		top: 0;
		z-index: -1;
	}

	.VYMape svg {
		height: 100%;
		width: 100%;
		display:block;
		position:relative;
	}
</style>
</head>

<body>
 <div class="VYMape">
<svg jsname="BUfzDd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 810" preserveAspectRatio="xMinYMin slice" aria-hidden="true">
<path fill="#efefee" d="M592.66 0c-15 64.092-30.7 125.285-46.598 183.777C634.056 325.56 748.348 550.932 819.642 809.5h419.672C1184.518 593.727 1083.124 290.064 902.637 0H592.66z"></path>

<path fill="#f6f6f6" d="M545.962 183.777c-53.796 196.576-111.592 361.156-163.49 490.74 11.7 44.494 22.8 89.49 33.1 134.883h404.07c-71.294-258.468-185.586-483.84-273.68-625.623z"></path>

<path fill="#f7f7f7" d="M153.89 0c74.094 180.678 161.088 417.448 228.483 674.517C449.67 506.337 527.063 279.465 592.56 0H153.89z"></path>

<path fill="#fbfbfc" d="M153.89 0H0v809.5h415.57C345.477 500.938 240.884 211.874 153.89 0z"></path>

<path fill="#ebebec" d="M1144.22 501.538c52.596-134.583 101.492-290.964 134.09-463.343 1.2-6.1 2.3-12.298 3.4-18.497 0-.2.1-.4.1-.6 1.1-6.3 2.3-12.7 3.4-19.098H902.536c105.293 169.28 183.688 343.158 241.684 501.638v-.1z"></path>

<path fill="#e1e1e1" d="M1285.31 0c-2.2 12.798-4.5 25.597-6.9 38.195C1321.507 86.39 1379.603 158.98 1440 257.168V0h-154.69z"></path>

<path fill="#e7e7e7" d="M1278.31,38.196C1245.81,209.874 1197.22,365.556 1144.82,499.838L1144.82,503.638C1185.82,615.924 1216.41,720.211 1239.11,809.6L1439.7,810L1439.7,256.768C1379.4,158.78 1321.41,86.288 1278.31,38.195L1278.31,38.196z"></path>
</svg>
</div>

<!--<div id="top">Module d'administration MFP</div> -->

<div class="all">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="bottom"><div class="border-box">&nbsp;</div></td>
  </tr>
</table>

 <!--<div class="right-connect">  -->
        <form name="form1" method="post" action="<?php echo site_url($ctrl.'/in_admin') ?>">
          <table width="100%" border="0" cellspacing="2" cellpadding="2" class="connect">
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center"><img src="<?php echo base_url('assets/rubriques/_logo/'.$logo['image_small']) ?>" alt="logo drh"></td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center" style="font-size:20px; font-family:'Merriweather sans'"><strong>Se connecter</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center">
                <?php if(!empty($msg)){?>
                <div id="error" class="msg msg-erreur">
                  <?php echo $msg; ?>
                  </div>
                <?php }?>
                </td>
              </tr>
            <tr>
              <td colspan="2" align="center">                 <input type="text" name="acces" id="acces" class="cds_log" placeholder="Nom d'utilisateur ..." required />
                </td>
              </tr>
            <tr>
              <td colspan="2" align="center"><input type="password" name="pswd" id="pswd" class="cds_log" placeholder="Mot de passe ..." required /></td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Connexion" class="btn btn-login"></td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>

            <tr>
              <td align="center">
                <a href="#"><input type="checkbox" name="checkbox" id="checkbox">&nbsp;Rester connecté</a>
                </td>

              <td align="center"><a href="#">Mot de passe oublié ?</a></td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" align="center">Vous n'avez pas de compte ? <a href="#">faite une demande ici</a></td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              </tr>

            </table>
          </form>

<!--</div>-->
</div>

<div id="footer-log">&copy;&nbsp;<?php echo date('Y') ?>&nbsp;- <?php echo $logo['titre']; ?>, module d'administration.</div>

</body>
</html>