<?php require "header.php"; ?>	
		<section>
			<h1>Mot de passe oublié</h1>
			
			<article id="formcompte">
				<?php

					if (empty($_SESSION['login']))
					{
						if (isset($_POST['submit'])) 
						{
							// vérification sur l'email si elle existe dans la BDD pour recherché le mot de passe
							$req = $bdd->prepare("SELECT count(login) FROM identification WHERE login = ?");
					    	$req->execute(array($_POST['email']));
					    	if($req->fetchColumn() > 0)
					    	{ 	
					    		$req = $bdd->prepare('SELECT password FROM identification WHERE login = ?');
								$req->execute(array($_POST['email']));
								$donnees = $req->fetch();

								// affichage du mot de passe
								echo "Votre mot de passe est: " . $donnees['password'];
					    	
					    	}

					    	else
					    	{
					    		// message d'érreur si aucun compte n'est associé au email
					    		echo "<span class='failpass'>" . "Attention Aucun compte n'est associé à cette email." . "</span><br /><br />";
					    	?>
					    		<h2>Mot de passe</h2><br />
								<p>Nous allons l'envoyer dans votre boite mail:</p>
								<form method="post" action="motdepasse.php">
								<label for="email">E-mail:</label><input type="email" name="email" id="email" required="required" /><br><br>
								<input type="submit" value="Valider" name="submit"/>
						<?php
							}
						}
						else
						{ ?>
							<h2>Mot de passe</h2><br />
							<p>Nous allons l'envoyer dans votre boite mail:</p>
							<form method="post" action="motdepasse.php">
							<label for="email">E-mail:</label><input type="email" name="email" id="email" required="required" /><br><br>
							<input type="submit" value="Valider" name="submit"/>

						<?php }
					}
					else
					{
						// redirection sur comptes.php
						header('location:comptes.php');
					}
					?>
			</article>
		</section>
		
<?php require "footer.php"; ?>