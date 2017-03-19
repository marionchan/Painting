<?php require "header.php"; ?>

<h1>
	<?php if (isset($_POST['submit']))
				{
					$id_peinture = $_POST['id_peinture'];
					$email = $_SESSION['login'];
					$modif = $bdd->prepare('INSERT INTO favoris(id_peinture, email) VALUES(:id_peinture,:email)');
					$modif->execute(array( 'id_peinture' => $id_peinture, 'email' => $email ));

					?>
					<script type="text/javascript">
									
						window.location.replace("compte.php");  <!-- redirection vers gallerie  -->
									
					</script>
					<?php
				}
				elseif (isset($_POST['submit2'])) {
					$id = $_POST['id'];
					$modif = $bdd->prepare('DELETE FROM favoris WHERE id = ?');
					$modif->execute(array( $id ));

					?>
					<script type="text/javascript">
									
					window.location.replace("compte.php");
									
					</script>
					<?php
				}
				else
					echo "ERROR 404";
				?>
</h1>

<?php require "footer.php"; ?>