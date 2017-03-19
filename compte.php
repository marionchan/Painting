<?php require "header.php"; ?>

		<section id="allindex">
				<?php

				if(isset($_POST["deconnection"]))
					{
						$_SESSION = array();
						unset($_SESSION);
						session_destroy();
					}
				
				if(isset($_SESSION['login']))
				{ ?>
					
					<form method='post' action='compte.php'>
					<input type='submit' name='deconnection' value='Déconnection' />
					</form><br />

					<p id='namecompte'>Salut! <b id='namecompte'>Voici ci-dessous tes peintures favorites.</b></p><br /><br />
			 <?php
					$rep = $bdd->prepare('SELECT id, id_peinture FROM favoris WHERE email = ?');
					$rep->execute(array($_SESSION['login']));
					while ($id_peinture = $rep->fetch())
					{
						$req = $bdd->prepare('SELECT nom, nom_peintre, url FROM peintures WHERE id = ?');
						$req->execute(array($id_peinture['id_peinture']));
						$donnees = $req->fetch();
				?>

						<div id="title" ><h2 class="titre" ><?php echo utf8_encode($donnees['nom']) ?> - <?php echo utf8_encode($donnees['nom_peintre']) ?></div>
						<aside id="contents"><img class="contenu" src="<?php echo utf8_encode($donnees['url']) ?>"></aside>
						<form method="post" action="favoris.php">
							<input type="hidden" name="id" value="<?php echo $id_peinture['id'] ?>" />
							<input type="submit" name="submit2" value="Enlever des favoris">
						</form>
						<br /><br />

					<?php
					}
				}
				else
				{
						// Le traitement de quand la personne se connecte et qu'elle est déja inscrite
					// on vérifie que la personne a bien appuyer sur le boutton Envoyer(Submit)
						if (isset($_POST["submit"])) 
						{
							$rep = $bdd->prepare('SELECT * FROM identifications WHERE login = ? and password = ?');
							$rep->execute(array($_POST['email'], $_POST['password']));
							$donnees = $rep->fetch();
								if ($donnees) 
									{
										// requete SQL pour récuperer le compte
										$rep = $bdd->prepare('SELECT pseudos, lieu FROM pseudos WHERE email = ?');
										$rep->execute(array($_POST['email']));
										$donnees2 = $rep->fetch();

										// on rempli la variable Superglobal en lui indiquant que la personne est connecté AUTH : OK etcs...
										$_SESSION['auth']="AUTH : OK";
										$_SESSION['login'] = $donnees['login'];
										$_SESSION['name'] = $donnees2['pseudos'];
										header("location:compte.php");
									?>
									<!-- redirection a la page compte.php -->
									
										
					<?php								
									}
								else
									{
						?>
										<!-- affichage si l'email ou les mots de passes ne sont pas idendtique -->
										<aside id="secompte">
										<article id="formcompte">
										<h2 id="deja" >Déjà Inscrit</h2><br /><br />
										<span class='failpass'>Attention le mot de passe ou l'email n'est pas bon ou vous n'avez pas validé votre inscription.</span><br /><br />				
										
										<form method="post" action="compte.php">
										<label for="email">E-mail:</label><input type="email" name="email" id="email" required="required" /><br><br>
										<label for="password">Mot de passe:</label><input type="password" name="password" id="password" required="required" /><br><br>
									 	<input id="inputimage" src="images/button.png" type="image" Value="submit" name="submit" /><br><br>
										
								 			<a href="motdepasse.php">Mot de passe oublié?</a>
								 		</form>
										</article>
					<?php			
									}

						}
						else
						{ ?>
							<article id="formcompte">
								<h2 id="deja" >Déjà Inscrit</h2><br />
								<form method="post" action="compte.php">
								<label for="email">E-mail:</label><input type="email" name="email" id="email" required="required" /><br><br>
								<label for="password">Mot de passe:</label><input type="password" name="password" id="password" required="required" /><br><br>
								<input id="inputimage" src="images/button.png" type="image" Value="submit" name="submit" /> <br><br>
								
								 	<a href="motdepasse.php">Mot de passe oublié?</a>
								</form>
							</article>
				<?php	}

				}



?>
					<?php
				if (empty($_SESSION['login'])) 
				{
					if(isset($_POST['submit1']))
					{
							// vérifie dans la base de données si le login n'existe pas déja
						 	$modif = $bdd->prepare("SELECT count(login) FROM identifications WHERE login = ?");
						    $modif->execute(array($_POST['email']));
						    if($modif->fetchColumn() > 0)
						    {  ?>
									     
									  <article id="formcompte2">
											<form method="post" action="compte.php">
												<h2>Créer un compte</h2><br />
												<b class='failpass'>Attention L'email <?php $_POST['email'] ?> est déja utilisé.</b>
												<label for="pseudo">Pseudo:</label><input type="text" name="pseudo" id="pseudo" required="required" /><br><br>
												<label for="email1">E-mail:</label><input type="email" name="email" id="email1" required="required" /><br><br>
												<label for="password1">Mot de passe:</label><input type="password" name="password" id="password1"  required="required" /><br><br>
												<label for="password2">Répétez votre mot de passe:</label><input type="password" name="password2" id="password2"  required="required" /><br><br>
										 		<input id="inputimage" src="images/button.png" type="image" Value="submit" name="submit1" />
										</form>
								 		</article>
							<?php
						    }
					    else
					    {
					    	//Affichage si les mots de passe ne sont pas identique
					    	if (isset($_POST["submit1"]) && $_POST['password'] != $_POST['password2'] ) 
					    		{ ?>
							 			<b class='failpass'> Attention les mots de passe ne sont pas identiques.</b>	
								<?php	}

									//Opération d'ajout dans la base de donnée et connection si tout ce passe bien
								if (isset($_POST["submit1"]) && $_POST['password'] == $_POST['password2'] )
									{
													$pseudo = $_POST['pseudo'];
													$login = $_POST['email'];
													$password = $_POST['password'];
													$modif = $bdd->prepare('INSERT INTO identifications(login, password) VALUES(:login,:password)');
													$modif->execute(array( 'login' => $login, 'password' => $password ));
													$modif = $bdd->prepare('INSERT INTO pseudos(email, pseudos) VALUES(:email, :pseudos)');
													$modif->execute(array( 'email' => $login , 'pseudos' => $pseudo));

														//Connection au site et création des variables Superglobales $_SESSION
															$rep = $bdd->prepare('SELECT pseudos, lieu FROM pseudos WHERE email = ?');
															$rep->execute(array($_POST['email']));
															$donnees2 = $rep->fetch();

																$_SESSION['auth']="AUTH : OK";
																$_SESSION['login'] = $login;
																$_SESSION['name'] = $pseudo;
																header("location:compte.php");
															?>
															<!-- redirection a la page compte.php -->
															
													 <?php
										}
					
					    }
					} 
					else
							{ ?>
								<!-- Formulaire d'inscription -->
								<article id="formcompte2">
								<form method="post" action="compte.php">
								<h2>Créer un compte</h2><br />
									<label for="pseudo">Pseudo:</label><input type="text" name="pseudo" id="pseudo" required="required" /><br><br>
									<label for="email1">E-mail:</label><input type="email" name="email" id="email1" required="required" /><br><br>
									<label for="password1">Mot de passe:</label><input type="password" name="password" id="password1"  required="required" /><br><br>
									<label for="password2">Répétez votre mot de passe:</label><input type="password" name="password2" id="password2"  required="required" /><br><br>
							 		<input id="inputimage" src="images/button.png" type="image" Value="submit" name="submit1" /> 
							 	</form>
							 	</article>
					<?php } ?>
				</form>
			</aside>
			</article>
		</section>
	<?php } ?>
<?php require "footer.php"; ?>