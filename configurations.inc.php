
<?php


   function Connection_mySql(){

       $hote = "localhost";

      
       $user = "root";
      
	   $pwd = "";

       $connexion = mysql_connect($hote, $user, $pwd)

	     or die("erreur de connexion au serveur");

	   return $connexion;	 

   }

   function Get_id_Client($client){
       	$cnx = Connection_mySql();
		mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");
		$query = 'SELECT `idclient` FROM `Client` WHERE `pseudo` = \''.$client.'\';';
		$result = mysql_query($query) or die("erreur!!");
		$row = mysql_fetch_row($result);
		return $row[0];
		
   }
   
   function GET_Max_IdCmd(){
   		$cnx = Connection_mySql();
		mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");
		$query = 'SELECT MAX(idCmd) FROM `categorie` ;';
		$result = mysql_query($query) or die("erreur!!");
		$row = mysql_fetch_row($result);
		return $row[0];
   }
   
   function Get_Cat_Description($cat){

   		$cnx = Connection_mySql();
		mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");
		$query = 'SELECT description FROM `categorie` WHERE `idCat` = '.$cat.';';
		$result = mysql_query($query) or die("erreur!!");
		if($row = mysql_fetch_row($result)){
				return $row[0];
		}else{
		    return "\0";
		}
   }

   

   function Get_Art_ref($art){

   		$cnx = Connection_mySql();

		mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

		$query = 'SELECT ref FROM `article` WHERE `idArticle` = '.$art.';';

		$result = mysql_query($query) or die("erreur!!");

		if($row = mysql_fetch_row($result)){

				return $row[0];

		}else{

		    return "\0";

		}

   }

   

   function chercherCategorie($kwd){

   		if($kwd != ""){

   			$cnx = Connection_mySql();

			mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

			$query = 'SELECT * FROM `categorie` WHERE `description` like \'%'.$kwd.'%\';';

			$result = mysql_query($query) or die("erreur!!");

			while($row=mysql_fetch_row($result)){

		    	echo "<table bordder=0>";

				echo "<tr>";

				echo "<td><a href=\"index.php?cat=".$row[0]."\"><img src=\"administration/media/".$row[3]."\" height=120 width=120 /></td><td>".$row[1]."</td>";

				echo "</tr>";

				echo "</table>";

			}

		    mysql_close();

		}else{

				echo "<script language=\"javascript\" type=\"text/javascript\">";

                      

                                echo "window.location.replace(\"index.php\");";

					

				echo "</script>" ;

		}

   } 

   

   function chercherArticle($kwd){

      if($kwd != ""){

   		$cnx = Connection_mySql();

	mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

		$query = 'SELECT * FROM `article` WHERE `ref` like \'%'.$kwd.'%\' OR `description` like \'%'.$kwd.'%\';';

		$result = mysql_query($query) or die("erreur!!");

		while($row=mysql_fetch_row($result)){

		    echo "<table bordder=0>";

			echo "<th colspan=\"2\">".$row[1]."</th>";

			echo "<tr>";

			echo "<td><a href=\"index.php?art=".$row[0]."\"><img src=\"administration/media/".$row[7]."\" height=120 width=120 /></td><td>".$row[2]."</td>";

			echo "</tr>";

			echo "</table>";

		}

		mysql_close();

		}else{

				echo "<script language=\"javascript\" type=\"text/javascript\">";

                      

                echo "window.location.replace(\"index.php\");";

					

				echo "</script>" ;

		}

   } 

   

   function verifuser($user, $pwd){

   		$cnx = Connection_mySql();

 mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

$query = 'SELECT * FROM `Client` WHERE `pseudo` = \''.$user.'\' AND `pwd` = \''.$pwd.'\';';

		$result = mysql_query($query) or die("erreur!!");

		if($row = mysql_fetch_row($result)){

			return TRUE;

		}else{

			return FALSE;

		}

		

   }

   

   function is_mail($mail){

       return preg_match("/^(\\w|-|_|\\.)+@((\\w|-)+\\.)+([a-z]|[A-Z]){2,6}$/i",$mail);

   }

   

   function Pseudo_existe($pseudo){

          $cnx = Connection_mySql();
 		  mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");
		  $query = 'SELECT `pseudo` FROM `Client` WHERE `pseudo` = \''.$pseudo.'\' ;';
		  $result = mysql_query($query) or die("erreur!!");
		  if($row = mysql_fetch_row($result)){

			 return TRUE;

		  }else{

			return FALSE;

		  }

   }

   function Pseudo_existeb($pseudo,$id){

   		

   		$cnx = Connection_mySql();

        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        $query = 'SELECT * FROM `Client` WHERE `pseudo` = \''.$pseudo.'\' AND `idclient` <> \''.$id.'\';';

		$result = mysql_query($query) or die("erreur!!");

		if($row = mysql_fetch_row($result)){

			return TRUE;

		}else{

			return FALSE;

		}

   }

   

   function mail_existe($mail){

          $cnx = Connection_mySql();

 		  mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

		  $query = 'SELECT * FROM `Client` WHERE `email` = \''.$mail.'\' ;';

		  $result = mysql_query($query) or die("erreur!!");

		  if($row = mysql_fetch_row($result)){

			 return TRUE;

		  }else{

			return FALSE;

		  }

   }

   

   function mail_existeb($mail,$id){

   		

   		$cnx = Connection_mySql();

        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        $query = 'SELECT * FROM `Client` WHERE `email` = \''.$mail.'\' AND `idclient` <> \''.$id.'\';';

		$result = mysql_query($query) or die("erreur!!");

		if($row = mysql_fetch_row($result)){

			return TRUE;

		}else{

			return FALSE;

		}

   }

   

   function select_new(){

   		$cnx = Connection_mySql();

        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        $query = 'SELECT idArticle,img FROM `article` ORDER BY `idArticle` DESC LIMIT 0,3;';

		$result = mysql_query($query) or die("erreur!!");

		while($row = mysql_fetch_row($result)){

		        echo "<a href=\"index.php?art=".$row[0]."\">";

				echo "<img src=\"administration/media/".$row[1]."\" alt=\"article\" width=250 height=90/>";

				echo "</a>";

		}

   }

   

   function select_popular(){

   		$cnx = Connection_mySql();

        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        
		$sql = 'SELECT DISTINCT article.idArticle, article.img, SUM(Contient.QteArt) AS total FROM article, Contient WHERE article.idArticle = Contient.idArticle GROUP BY article.ref ORDER BY total DESC LIMIT 0,3';

		$result = mysql_query($sql) or die("erreur!!");

		while($row = mysql_fetch_row($result)){

		        echo "<a href=\"index.php?art=".$row[0]."\">";

				echo "<img src=\"administration/media/".$row[1]."\" alt=\"article\" width=250 height=90/>";

				echo "</a>";

		}

   }

   function select_new_Cat(){

   		$cnx = Connection_mySql();

        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        $query = 'SELECT idCat,img FROM `categorie` ORDER BY `idCat` DESC LIMIT 0,2;';

		$result = mysql_query($query) or die("erreur!!");

		while($row = mysql_fetch_row($result)){

		        echo "<a href=\"index.php?cat=".$row[0]."\">";

				echo "<img src=\"administration/media/".$row[1]."\" alt=\"article\" width=194 height=90/>";

				echo "</a>";

		}

   }

   

   function nombre_article(){

         

   		$cnx = Connection_mySql();

      mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        $query = 'SELECT COUNT(*) FROM `article`;';

		$result = mysql_query($query) or die("erreur!!");

		$row = mysql_fetch_row($result);

		return $row[0];

   }

   

   function alea(){

        

   		$nb  = rand(1, nombre_article()); 

		

   	    $cnx = Connection_mySql();

        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

        $query = 'SELECT idArticle,img FROM `article` WHERE 1 LIMIT '. ($nb-1) .','.$nb.';';

		

		$result = mysql_query($query) or die("erreur!!");

		$row = mysql_fetch_row($result);

		echo "<a href=\"index.php?art=".$row[0]."\">";

		echo "<img src=\"administration/media/".$row[1]."\" alt=\"article\" width=194 height=90/>";

		echo "</a>";

   }
   
   function Existe_dans_Panier($id){
        $d = FALSE;
   		$ligne = explode('#', $_SESSION['panier']); 
		foreach($ligne as $tmp){
			$mot = explode(';', $tmp);
			if($mot[0] == $id){
			    $d = TRUE;
			}   
		}
		return $d;
   }
   
   
   function inc_qte($id){
   		$ligne = explode('#', $_SESSION['panier']);
		$l = ""; 
		foreach($ligne as $tmp){
			$mot = explode(';', $tmp);
			if($mot[0] == $id){
			    $mot[4]++;
			}   
			$tmpb = implode(';', $mot);
			if($l == ""){
			   $l = $tmpb;
			}else{
			   $l .= "#".$tmpb;
			}   
		}
		$_SESSION['panier'] = $l; 
   }
   
    function delArtFromPanier($id){
   		$ligne = explode('#', $_SESSION['panier']);
		$l = ""; 
		foreach($ligne as $tmp){
			$mot = explode(';', $tmp);
			if($mot[0] != $id){
			   $tmpb = implode(';', $mot);
			   if($l == ""){
			     $l = $tmpb;
			   }else{
			    $l .= "#".$tmpb;
			   }    
			}   
			   
		}
		$_SESSION['panier'] = $l;
		if($_SESSION['panier'] == ""){
			unset($_SESSION['panier']);
		}
		 echo "<script language=\"javascript\" type=\"text/javascript\">";
                      
         echo "window.location.replace(\"index.php?user=2&task=affiche\");";
					
		 echo "</script>";
   }
   
   function change_qte($id, $qte){
   		$ligne = explode('#', $_SESSION['panier']);
		$l = ""; 
		foreach($ligne as $tmp){
			$mot = explode(';', $tmp);
			if($mot[0] == $id){
			    $mot[4] = $qte;
			}   
			$tmpb = implode(';', $mot);
			if($l == ""){
			   $l = $tmpb;
			}else{
			   $l .= "#".$tmpb;
			}   
		}
		$_SESSION['panier'] = $l; 
   }
   
   function choix_qte($id){
   		  $cnx = Connection_mySql();
		  $key = 1;
		  if(isset($_POST['qte'])){
		  		if($_POST['id'] == $id){
		  			$key = $_POST['qte'];
					
				}
				
		  }
 		  mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");
		  $query = 'SELECT `QteStock` FROM `article` WHERE `idArticle` = \''.$id.'\' ;';
		  $result = mysql_query($query) or die("erreur!!");
		  if($row = mysql_fetch_row($result)){
		  	echo "<form action=\"index.php?user=2&task=affiche\" method=\"post\" name=\"form\">";
			echo "<input type=\"hidden\"name=\"id\" value=\"".$id."\">";
		  	echo "<select name=\"qte\" onchange=\"javascript:this.form.submit();\" >";
			for($i=1; $i<= $row[0]; $i++){
				echo "<option value=\"$i\"";
				if($i == $key){
					echo "selected";
				}
				echo " > $i";
			}
		  	echo "</select>";
		  	echo "</form>";
		 }else{
		 	echo "non disponible";
		 }
   		
   }
   
   function affiche_panier(){
   		if(isset($_POST['qte'])){
				change_qte($_POST['id'], $_POST['qte']);
		}
        echo "<br><center>";
   		echo "<table border=0 width=650>";
		echo "<tr><td></td><td>Article</td><td>prix HT(en &euro;)</td><td>TVA (en %)</td><td>Qte</td><td>prix &aacute; pay&eacute;(en &euro;)</td><td>changer la Qte</td><td>Supprimer</td></tr>";
		$Total = 0;
		$ligne = explode('#', $_SESSION['panier']); 
		foreach($ligne as $tmp){
			$mot = explode(';', $tmp);
			echo "<tr>";
			   foreach($mot as $t){
			   		echo "<td>$t</td>";
			   }
			   echo "<td>";
			   echo round(((($mot[2] * $mot[3])/100) + $mot[2])*$mot[4],2);
			   $Total += round(((($mot[2] * $mot[3])/100) + $mot[2])*$mot[4],2);
			   echo "</td>";
			   echo "<td>";
			   choix_qte($mot[0]);
			   echo "</td>";
			   echo "<td>";
			   echo "<a href=\"index.php?user=2&task=del&id=".$mot[0]."\">";
			   echo "<img src=\"images/b_drop.png\" />";
			   echo "<a>";
			   echo "</td>";
			echo "</tr>";
		}
		echo "<tr><td></td><td></td><td></td><td></td><td>Total &Aacute; Pay&eacute;(En &euro;)</td><td>$Total</td></tr>";
		echo "</table>";
		echo "</center>";
   }
   
   function SommeAPayer(){
   		$Total = 0;
		$ligne = explode('#', $_SESSION['panier']); 
		foreach($ligne as $tmp){
			$mot = explode(';', $tmp);
			$Total += round(((($mot[2] * $mot[3])/100) + $mot[2])*$mot[4],2);
		}
		return $Total;	
   }
   
   

?>

