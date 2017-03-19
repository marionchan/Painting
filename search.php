<?php include("header.php"); ?>


	<section id="allindex">
	<?php
			if (isset($_POST['sub'])) {
				$search = $_POST['search'];
				$req = $bdd->prepare('SELECT id, nom, nom_peintre, mouvement, theme, url FROM peintures WHERE nom = ? OR nom_peintre = ? OR mouvement = ? OR theme = ?');
				$req->execute(array($search, $search, $search, $search));
				while ($donnees = $req->fetch()){
					$check = true;
		?>

		<div id="title" ><h2 class="titre" ><?php echo utf8_encode($donnees['nom']) ?> - <?php echo utf8_encode($donnees['nom_peintre']) ?></div>
		<aside id="contents"><img class="contenu" src="<?php echo utf8_encode($donnees['url']) ?>"></aside>
		<?php if (isset($_SESSION['login'])) { ?>
						<form method="post" action="favoris.php">
								<input type="hidden" name="id_peinture" value="<?php echo $donnees['id'] ?>" />
								<input type="submit" name="submit" value="Favoris">
						</form>

		<?php	}
				}

				if (!isset($check))
					echo "<h1>DESOLE, RIEN N'A ETE TROUVE</h1>";
			}
			else
				echo "<h1>ERROR 404</h1>";
		?>
	</section>

		
<?php include("footer.php"); ?>