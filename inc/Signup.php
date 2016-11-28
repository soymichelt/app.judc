<?php
	session_start();
	if(isset($_SESSION['UserName'])) {
		unset($_SESSION['UserName']);
	}
	if(isset($_SESSION['UserEmail'])) {
		unset($_SESSION['UserEmail']);
	}
	Header("Location: ../Index.php");
?>