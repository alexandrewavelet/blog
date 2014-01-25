					</div>
					<nav class="span4">

						<h2>Menu</h2>

						<ul>
							<li><a href="index.php">Accueil</a></li>
						</ul>

						<h2>Recherche</h2>
						<form role="form" action="index.php" method="GET">
							<input type="hidden" id="action" name="action" value="recherche">
							<div class="form-group">
								<input type="text" class="form-control" id="q" name="q" placeholder="Recherche">
							</div>
							<input type="submit" class="btn btn-primary" id="rechercher" name="rechercher" value="rechercher">
						</form>

						<?php
							if (estConnecte()) { // Si l'utilisateur est connecté, on affiche le panel d'administration, sinon le formulaire de connexion
						?>
								<h2>Gérer le blog</h2>

								<p>Vous êtes connecté en tant que <?php echo $_SESSION['utilisateur']; ?>

								<ul>
									<li><a href="cAdministrateur.php?action=rediger">Rédiger un article</a></li>
									<li><a href="index.php?action=deconnexion">Se déconnecter</a></li>
								</ul>

						<?php
							}else{
						?>
								<h2>Connexion</h2>

								<form role="form" action="index.php?action=connexion" method="POST">
									<div class="form-group">
										<label for="identifiant">Identifiant</label>
										<input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Identifiant">
									</div>
									<div class="form-group">
										<label for="mdp">Mot de passe</label>
										<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="seSouvenir" value="oui"> Se souvenir de moi
										</label>
									</div>
									<input type="submit" class="btn btn-primary" id="valider" name="valider" value="Se connecter"/>
								</form>
						<?php
							}
						?>

					</nav>

				</div>
		
			</div>

			<footer>

				<p>&copy; AW <?php echo date('Y'); ?></p>

			</footer>

		</div>

	</body>
</html>