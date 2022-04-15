<?php 
class Config 
{
    protected $Serveur     = '10.100.103.38';
    protected $Bdd         = 'bd_sigfae_web';
	protected $Bdd2        = 'dba_mfprasitepro';
	protected $Bdd3        = 'bd_concours';
    protected $Identifiant = 'cockpit';
    protected $Mdp         = 'c033@ndeR';
	  
	function __construct() 
	{
       
    }
	
	function get_Serveur() 
	{
       return $this->Serveur; 
    }

	function get_Identifiant() 
	{
       return $this->Identifiant; 
    }
	
	function get_Mdp() 
	{
       return $this->Mdp; 
    }
 
    function get_Bdd() 
	{
       return $this->Bdd; 
    }
	function get_Bdd2() 
	{
       return $this->Bdd2; 
    }
	
	function get_Bdd3() 
	{
       return $this->Bdd3; 
    }
	

	public function executeSQL($sql) //sigfaeweb
	{
	  mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp) or die ('Erreur de connexion au serveur MySql!!!');
	  mysql_select_db($this->Bdd) or die ('Erreur de connexion à la base de donnees!!!');
  
	  mysql_query("SET NAMES 'utf8'");	
	  $reponse = mysql_query($sql);//or die ( '<p style="border:1px solid; background-color:#AA5555"><b>Erreur....pppppppp de Requete SQL:</b><br/>'.$sql.'<br/><i>'.mysql_error().'</i></p>' );
  
      mysql_close();
	
	 return $reponse;
	  
	}

   public function executeSQL2($sql) //dba_mfprasitepro
	{
	  mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp) or die ('Erreur de connexion au serveur MySql!!!');
	  mysql_select_db($this->Bdd2) or die ('Erreur de connexion à la base de donnees!!!');
  
	  mysql_query("SET NAMES 'utf8'");	
	  $reponse = mysql_query($sql);//or die ( '<p style="border:1px solid; background-color:#AA5555"><b>Erreur....pppppppp de Requete SQL:</b><br/>'.$sql.'<br/><i>'.mysql_error().'</i></p>' );
  
      mysql_close();
	
	 return $reponse;
	  
	}

  public function executeSQL3($sql) //bd_concours
	{
	  mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp) or die ('Erreur de connexion au serveur MySql!!!');
	  mysql_select_db($this->Bdd3) or die ('Erreur de connexion à la base de donnees!!!');
  
	  mysql_query("SET NAMES 'utf8'");	
	  $reponse = mysql_query($sql);//or die ( '<p style="border:1px solid; background-color:#AA5555"><b>Erreur....pppppppp de Requete SQL:</b><br/>'.$sql.'<br/><i>'.mysql_error().'</i></p>' );
  
      mysql_close();
	
	 return $reponse;
	  
	}
	
	
	
}

?>