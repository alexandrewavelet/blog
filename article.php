<?php
	include('includes/connexion.inc.php');
	if(isset($_POST['titre']) && $_POST['titre']){
		$titre = mysql_real_escape_string($_POST['titre']);
		$texte = mysql_real_escape_string($_POST['texte']);
		if(isset($_POST['id'])){
			$id = (isset($_POST['id']))? (int) $_POST['id'] : false ;
			$req = 'UPDATE articles SET titre = "'.$titre.'", texte = "'.$texte.'", date = UNIX_TIMESTAMP() WHERE id = '.$id;
		}else{
			$req = 'INSERT INTO articles VALUES (0,"'.$titre.'","'.$texte.'", UNIX_TIMESTAMP())';
			$res = mysql_query($req);
			$id = mysql_insert_id();
			move_uploaded_file($FILES['img']['tmp_name'],dirname(__FILE__).'/data/images/'.$id.'.jpg');
			$req = 'UPDATE articles SET image = "'.$id.'.jpg" WHERE id = '.$id;
		}
		$res = mysql_query($req);
		header("Location:index.php");
		exit();
	}else{
		include('includes/haut.inc.php');
?>
		<form action="article.php" method="POST" enctype="multipart/form-data">
		<?php
			if(isset($_GET['id']) && $_GET['id']){
				$req = 'SELECT * FROM articles WHERE id = '.mysql_real_escape_string($_GET['id']);
				$res = mysql_query($req);
				$data = mysql_fetch_array($res);
				// extract($data); => créée les variables d'un tableau associatif
				// forme ternaire : $var = (cond)? valeurVrai : valeurFaux ;
				$t = $data[1];
				$tx = $data[2];
				$btn= "modifier";
				echo '<input type="hidden" name="id" id="id" value="'.mysql_real_escape_string($_GET['id']).'"/>';
			}else{
				$t = "";
				$tx = "";
				$btn = "ajouter";
			}
		?>
			<div class="clearfix">
				<label for="titre">Titre : </label>
				<div class="input"><input type="text" name="titre" id="titre" <?php echo "value='".$t."'"; ?> /></div>
			</div>
			<div class="clearfix">
				<label for="texte">Contenu : </label>
				<div class="input"><textarea id="texte" name="texte"><?php echo $tx; ?></textarea></div>
			</div>
			<div class="clearfix">
				<label for="img">Image : </label>
				<input type="file" id="img" name="img"/>
			</div>
			<div class="clearfix">
				<div class="form-actions"><input class="btn btn-large btn-primary" type="submit" <?php echo "value='".$btn."'"; ?> name="ajouter" id="ajouter"/></div>
			</div>
		</form>
<?php
		include('includes/bas.inc.php');
	}
?>