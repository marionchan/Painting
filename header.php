<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="images/button1.png" />
		<link rel="stylesheet" href="style.css" /> 

        <title>The Artists</title>
    </head>
	<body>
		<div id="head"><?php  // ouverture d'une connection a la base de données qu'il 
            try
            {
            		// l'adresse = Localhost, base de données = dbase, utilisateur = root, mot de passe = 'palbou'
                $bdd = new PDO('mysql:host=localhost;dbname=dbase', 'root', 'david'); // sécuriser 
            }
            // si il y a une erreur mettre cette erreur(Exception) dans $e
            catch (Exception $e)
            {
            				// stop le programme et affiche l'erreur
                    die('Erreur : ' . $e->getMessage());
            }

        ?>
        <div class="artist">
	        <div>The Artists</div> 
	        Le site de référence sur les grands Maîtres de la peinture
	   	</div>
        <!-- la barre de recherche -->
        <div class="navsearch">
        	<form id="search" method="post" action="search.php" >
        		<input id="ip" type="text" name="search" placeholder="Rechercher sur le site" />
        		<input id="butt" type="submit" name="sub" value="Rechercher" />
        	</form>
        <!-- Compte en haut a droite -->
		<?php
			// test si la variable Superglobale SESSION (la personne est connecté) est vide ou pas, pour afficher le nom ou lui demander de se connecter
			if (empty($_SESSION['login'])) 
			{ ?>
				<span id="searchbar"><a href='compte.php'><b>Mon Compte</b></a>
				<br /><a href='compte.php'>Créer un compte</a>
				</span>
			<?php }
			else
			{ ?>
				<span id="searchbar"><a href='compte.php'><b><?php echo $_SESSION['name'] ?></b></a>
				<br />
				</span>
			<?php	
			}
						
			if(isset($_POST["deconnection"]))
						{
				
							$_SESSION = array();
							unset($_SESSION);
							session_destroy();
							header('location:compte.php');
						}
					?>
		</div>
		<nav>
					<ul id="menuglobal" >
						<li id="menutitre1"><a href="index.php">Accueil</a></li>
						<li id="menutitre2"><a href="peintres.php">Peintres</a></li>
						<li id="menutitre3"><a href="mouvements.php">Mouvements</a></li>
						<li id="menutitre4"><a href="themes.php">Themes</a></li>
						<li id="menutitre5"><a href="compte.php">Ma Galerie</a></li>
					</ul>
				</nav>
					<header>
							<img id='background' src='images/background2.png' />
					</header>

					</body>
					</html>
		