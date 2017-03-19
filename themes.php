<?php require "header.php"; ?>


	<section id="allindex">
		<?php
		if (!isset($_GET['nom'])) {

				$rep = $bdd->query('SELECT theme as nom, url_theme as url FROM peintures GROUP BY theme');
		?>
		<?php while ($donnees = $rep->fetch()) { ?>
			<aside id="team2">

				<a href="<?php echo 'themes.php?nom=' . $donnees['nom'] ?> "><img id="imgindex" src="<?php echo utf8_encode($donnees['url']) ?>" /></a>
				<p id="paraindex" >
					<a href=""><b id="indextitle" ><?php echo utf8_encode($donnees['nom']) ?></b></a>
				</p>

			</aside>
			<?php }
			} else {
					$rep = $bdd->prepare('SELECT id, url, nom, nom_peintre FROM peintures WHERE theme = ?');
					$rep->execute(array($_GET['nom']));
				?>

						<?php while ($donnees = $rep->fetch()) { ?>

											<div id="title" ><h2 class="titre" ><?php echo utf8_encode($donnees['nom']) ?> - <?php echo utf8_encode($donnees['nom_peintre']) ?></div>
											<aside id="contents"><img class="contenu" src="<?php echo utf8_encode($donnees['url']) ?>"></aside>
											<?php if (isset($_SESSION['login'])) { ?>
															<form method="post" action="favoris.php">
																	<input type="hidden" name="id_peinture" value="<?php echo $donnees['id'] ?>" />
																	<input type="submit" name="submit" value="Favoris">
															</form>
											<br /><br />

				<?php								}
								}
						} ?>
	</section>

		
<?php require "footer.php"; ?>