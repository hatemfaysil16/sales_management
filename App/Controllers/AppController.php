<?php


namespace App\Controllers;
use Core\Controller;

class AppController extends Controller
{
	protected $viewPath;
	protected $templetes = 'default';

    public function __construct()
    {
        parent::__construct();
    }

}
