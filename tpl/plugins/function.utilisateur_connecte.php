<?php

	function smarty_function_utilisateur_connecte(&$smarty)
	{
		$booleen = false;
		if (isset($_SESSION['connecte']) && $_SESSION['connecte']) {
			$booleen = true;
		}
		return $booleen;
	}

?>