<?php
     
	 setcookie("login","login", time()+3600*24);
	 setcookie("pwd","pwdpwd", time()+3600*24);
	 if((isset($_POST['save'])) && ($_POST['save'] == "save")){
	 		setcookie("login",$_POST['login'], time()+3600*24);
	        setcookie("pwd",$_POST['pw'], time()+3600*24);
	 }
	 
	
	 session_start();

     include_once("configurations.inc.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, CSS Website Layout</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            <li><a href="index.php" class="current">Home</a></li>
            <li><a href="subpage.html">Search</a></li>
            <li><a href="subpage.html">Books</a></li>            
            <li><a href="subpage.html">New Releases</a></li>  
            <li><a href="#">Company</a></li> 
            <li><a href="#">Contact</a></li>
    	</ul>
    </div> <!-- end of menu -->
    
    <div id="templatemo_header">
    	<div id="templatemo_special_offers">
        	<p>
                <span>25%</span> discounts for
        purchase over $80
        	</p>
			<a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
        
        
        <div id="templatemo_new_books">
        	<ul>
                <li>Suspen disse</li>
                <li>Maece nas metus</li>
                <li>In sed risus ac feli</li>
            </ul>
            <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->
    
    <div id="templatemo_content">
    	
        <div id="templatemo_content_left">
        	<div class="templatemo_content_left_section">
            	<h1>Categories</h1>
                <ul><?php

			    $cnx = Connection_mySql();

		        mysql_select_db("moonsolutions13f",$cnx) or die("erreur de connexion a la base de donnees");

	           $query = 'SELECT * FROM `categorie` WHERE `supCat`=1 AND `idCat` <> 1';

				$result = mysql_query($query) or die("erreur!!");

				

				while($row = mysql_fetch_row($result)){

					

echo "<li><a href=\"".$_SERVER['PHP_SELF']."?cat=".$row[0]."\">".strtoupper($row[1])."</a></li>";

					

				}

				mysql_close();

               ?>

            	</ul>
            </div>
			<div class="templatemo_content_left_section">
            	<h1>Utilisateur</h1>
<?php

		  		if(isset($_SESSION['user'])){

		   ?>

                <ul>

                <li><font color="#996699">Bienvenue. <?php echo $_SESSION['user']; ?>

                (<?php

		    		print date("d/m/Y");

		        ?>)

                </font>

                </li>

                <li><a href="index.php?user=1">Mon Profil</a></li>

                <li><a href="index.php?user=2&task=affiche">Mon Panier</a></li>

                

                <li><a href="modules/dcnx.php">Deconnexion</a></li>

                 </ul>   

           

           <?php		

						

				}else{

		        	if((isset($_POST['login'])) && (isset($_POST['pw']))){

							if(verifuser($_POST['login'], $_POST['pw'])){

								$_SESSION['user'] = $_POST['login'];

								?>

 				 <ul>

                <li><font color="#996699">Bienvenue. <?php echo $_SESSION['user']; ?>

                <?php

		  			  print date("d/m/Y");

				?>

                </font>

                </li>

                <li><a href="index.php?user=1">Mon Profil</a></li>

                <li><a href="index.php?user=2&task=affiche">Mon Panier</a></li>

               

                <li><a href="modules/dcnx.php">Deconnexion</a></li>

                 </ul>                                

                                
                             <?php
								 
							}else{

							?>

           <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                    <ul>

<li><center><input type="text" name="login" value="<?php echo $_COOKIE['login'];?>" onfocus="javascript:this.value='';"></center></li>

<li><center><input type="password" name="pw" value="<?php echo $_COOKIE['pwd'];?>" onfocus="javascript:this.value='';"/></center></li>

                	<li>
					<input type="hidden" name="save" value="no">
                    <input type="checkbox" name="save" value="save" checked="checked"/>

                    <font color="#996600" size="0.9em">Enregistrez votre mot de passe

                    </font>

                     </li>

                    <li><center><input type="submit" value="connexion"></center></li>

                    <li class="last"><center><a href="index.php?user=4">Enrgistrer-vous</a></center></li>

                    </ul>

</form>

                            <?php

							}

					?>

                    	

                    <?php

					}else{

		  ?>

          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                    <ul>

               <li><center><input type="text" name="login" value="<?php echo $_COOKIE['login'];?>" onfocus="javascript:this.value='';"></center></li>

               <li><center>
                 <input type="password" name="pw" value="<?php echo $_COOKIE['pwd'];?>" onfocus="javascript:this.value='';"/>
               </center></li>

                	<li>
					<input type="hidden" name="save" value="no">
                    <input type="checkbox" name="save" value="save" checked="checked"/>

                    <font color="#996600" size="0.9em">Enregistrez votre mot de passe

                    </font>

                     </li>

                    <li><center><input type="submit" value="connexion"></center></li>

                    <li class="last"><center><a href="index.php?user=4">Enrgistrer-vous</a></center></li>

                    </ul>

</form>

<?php

}

}

?>            </div>
          
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        	<div class="topright">

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

      <input type="text" value="Recherche..." name="kwd" onfocus="javascript:this.value='';"/>

      <select name="choix">

      		<option value="art">par Article

            <option value="cat">par Cat&eacute;gorie

            

      </select>

      <input type="submit" value="chercher" />

    </form>

    

    

</div>
			<div class="templatemo_product_box">
            	<h1>Photography  <span>(by Best Author)</span></h1>
   	      <img src="images/templatemo_image_01.jpg" alt="image" />
                <div class="product_info">
                	<p>Etiam luctus. Quisque facilisis suscipit elit. Curabitur...</p>
                  <h3>$55</h3>
                    <div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>
                    <div class="detail_button"><a href="subpage.html">Detail</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
            
            <div class="cleaner_with_width">&nbsp;</div>
            
            <div class="templatemo_product_box">
            	<h1>Cooking  <span>(by New Author)</span></h1>
       	    <img src="images/templatemo_image_02.jpg" alt="image" />
                <div class="product_info">
                	<p>Aliquam a dui, ac magna quis est eleifend dictum.</p>
                    <h3>$35</h3>
                    <div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>
                    <div class="detail_button"><a href="subpage.html">Detail</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
            
            <div class="cleaner_with_height">&nbsp;</div>
            
            <div class="templatemo_product_box">
            	<h1>Gardening <span>(by Famous Author)</span></h1>
   	      <img src="images/templatemo_image_03.jpg" alt="image" />
                <div class="product_info">
                	<p>Ut fringilla enim sed turpis. Sed justo dolor, convallis at.</p>
                    <h3>$65</h3>
                    <div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>
                    <div class="detail_button"><a href="subpage.html">Detail</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
            
            <div class="cleaner_with_width">&nbsp;</div>
            
            <div class="templatemo_product_box">
            	<h1>Sushi Book  <span>(by Japanese Name)</span></h1>
            	<img src="images/templatemo_image_04.jpg" alt="image" />
                <div class="product_info">
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    <h3>$45</h3>
                    <div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>
                    <div class="detail_button"><a href="subpage.html">Detail</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
            
            <div class="cleaner_with_height">&nbsp;</div>
            
            <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" /></a>
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="templatemo_footer">
    
	       <a href="subpage.html">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
        Copyright © 2024 <a href="#"><strong>Your Company Name</strong></a> 
        <!-- Credit: www.templatemo.com -->	</div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
<!-- templatemo 086 book store -->
<!-- 
Book Store Template 
http://www.templatemo.com/preview/templatemo_086_book_store 
-->
</body>
</html>