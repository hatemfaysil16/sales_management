<?php
namespace App\Controllers;


	class HomeControllers extends AppController {

	    public function __construct(){
            parent::__construct();
        }

				public function index() {
					$form = null;

					$this->rander('home', compact('form'));
				}

	}
