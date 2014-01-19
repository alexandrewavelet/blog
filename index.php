<?php
	include('includes/haut.inc.php');
	include('includes/connexion.inc.php');
	$que=mysql_query("SELECT * FROM articles ORDER BY date DESC");
	while($data=mysql_fetch_array($que))
	{
		$date = date("d/m/Y, G:i", $data[3]);
		echo "<h3>".$data[1]." - ".$date."</h3><BR>";
		$texte=$data['texte'];
		// htmlspecialchars();
		echo str_replace("\n","<BR>",$texte); // nl2br($data['text'];
		echo "<br/><a href='article.php?id=".$data[0]."' class='btn btn-primary'>Modifier</a><br/>";
		
	}
	include('includes/bas.inc.php');
?>