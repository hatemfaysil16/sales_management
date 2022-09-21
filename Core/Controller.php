<?php


namespace Core;


class Controller
{
	protected $viewPath;
	protected $templetes = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/App/Views/';
    }

    public function loadModel($model_name) {
        $this->$model_name = \App::getInstance()->getModel($model_name);
    }

    protected function rander($view, $vars = []) {
    	ob_start();
        extract($vars);
		include($this->viewPath . $view . '.php');
		$content = ob_get_clean();
		include($this->viewPath.'templates/'.$this->templetes.'.php');
    }

    protected function directly($link) {
        header("Location: http://localhost/try/public/{$link}");
				exit();
    }
}
