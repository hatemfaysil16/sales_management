<?php

		session_start();


	define('ROOT', dirname(__DIR__));
	include(ROOT.'/App/App.php');
	App::$path = 'http://'.$_SERVER['SERVER_NAME'].'/try/public/';
	App::load();

	use \App\Controllers\ArticlesControllers;

	if (isset($_POST['ajax_action'])) {
		$request = explode('.', $_POST['ajax_action']);

		$controller = '\App\Controllers\\'.ucfirst($request[0]).'Controllers';
		$action = $request[1];

		$controller = new $controller();
		echo $controller->$action();

	} else {

	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = 'home';
	}

	$p = explode('/', rtrim($p, '/'));
	$action = 'index';

	if (isset($p[0])) {
		$controllerName = $p[0];
		App::getInstance()->cur_page = strtolower($p[0]);
	}

	if(isset($p[1])) {
		$action = $p[1];
	}


	if (!isset($_SESSION['user'])) {
		$controllerName = 'users';
		$action = 'login';
	} else {
		if (($p[0] == 'users') && ($p['1'] == 'login')) {
			$controllerName = 'home';
			$action = 'index';
				}
	}

		$controller = '\App\Controllers\\'.ucfirst($controllerName).'Controllers';

		$controller = new $controller();
		$controller->$action();
	}
