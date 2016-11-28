<?php
	function VerifiedSesion() {
		session_start();
		$tmp = 0;
		if(isset($_SESSION['UserName']) && isset($_SESSION['UserEmail']) && isset($_SESSION['Rol'])) {
			if(empty($_SESSION['UserName']) || empty($_SESSION['UserEmail']) || empty($_SESSION['Rol'])) {
		 		$tmp = 0;
		    }
		    else {
				$tmp = 1;
		    }
		}
		else {
	    	$tmp = 0;
		}

		//Retorna el resultado
		return $tmp;
	}
?>