<!-- PAGE ARTICLE.PHP -->

<?php
if(isset($_POST['send'])){
	$nomFichier = 'nom'; // Génération aléatoire d'un nom en 32 caractères
	move_uploaded_file($FILES['img']['tmp_name'],'/data/images/'.$nomFichier.'.jpg');
}else{
?>
	<form method="POST" action="test.php" enctype="multipart/form-data">
		<input type="file" id="img" name="img"/>
		<input type="submit" value="envoyer" id="send" name="send"/>
	</form>
<?php
}
?>

<!-- PAGE INDEX.PHP -->
Dans le foreach :
Afficher l'image dans les articles si existante (Syntaxe Smarty), avec largeur 200px
{foreach ...}
	{if $data.image}
		<img src="{$data.image}" width="200"/>
{/foreach}