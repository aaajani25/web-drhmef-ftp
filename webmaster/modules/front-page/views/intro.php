<?php 
$path_fic = base_url().'assets/rubriques/';

list($width, $height, $type, $attr) = getimagesize($path_fic.'_intro/'.$intro['image_small']); 
 
// logo                                              
	$logo = $this->nav_mod->read_row_l
	(
		'_logo',
		array('etat' => 'on'),
		array('id','desc'),
		1
	);
// -- logo

// redirection apres 10 secondes
$accueil = site_url('front-page/navigator/accueil');
header("refresh:10;url=".$accueil);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $logo['titre'] ?>&nbsp;- Côte d'Ivoire</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/') ?>/rubriques/_logo/<?php echo $logo['image_small'] ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/') ?>/css/style_003.css" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
<style>
 body{margin:0px; padding:0px; background-color:#333}
 #container-intro {
	margin: 0 auto;	
	width: 1000px;
	height:auto; 
	 }
  
  img{	  	 
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.83);
	border-radius:0px;
	 }
	 
  #link{position:relative; width:<?php echo $width; ?>px; color:#333; font-family:Oswald; bottom:<?php echo $height; ?>px}
  
  .dlink{padding:15px 18px; background-color:#333; opacity:0.8; color:#FFF; font-weight:bold; transition: all 200ms ease-out;}
  .dlink:hover{text-decoration:none; color:#FFF; opacity:1}
  
/*  @media (max-width:400px){
	  #container-intro {
		width: 100%;	 
	  }
	 
	  #container-intro img {
		width: 100%;
		height:auto;	 
	 }
  }*/
</style>
</head>

<body>
<div id="container-intro" align="center">
  <div class="intro-img"><img src="<?php echo $path_fic ?>_intro/<?php echo $intro['image_small'] ?>" alt="intro"></div>
    
    <div id="link" align="right">
        <a href="<?php echo site_url('front-page/navigator/accueil') ?>" class="dlink">Accédez directement au site [<span id="rebours"></span>]</a>    
	</div>
</div>

<script type="text/javascript">
  var seconds = 15;
  
  setInterval(
   function(){
    if(seconds>=1)document.getElementById('rebours').innerHTML = "" + --seconds;
  }, 1000);
    </script>
</body>
</html>