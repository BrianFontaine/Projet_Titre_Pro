<?php
    // require_once dirname(__FILE__).'/../models/';
    session_start();
    if (isset($_GET['logout'])) {
		// vide le tableau session
		$_SESSION['user'] = [];
		// vide la variable session
		unset($_SESSION['user']);
		// détruit la session
		session_destroy();
	}
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $_SESSION['user'] = ['auth' => true, 'login' => $_POST['login']];
        header("Location: ../profile/");
    }
    require_once dirname(__FILE__).'/../views/login_views.php';
?>