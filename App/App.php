<?php

use Core\Database;
use Core\Config;

	class App {
		private $db;
		private static $_instance;
		public static $path;
		public $cur_page = 'index';

		public static function getInstance() {
			if (self::$_instance === null) {
				self::$_instance = new App();
			}
			return self::$_instance;
		}

		public static function load() {
			include(ROOT.'/App/Autoloader.php');
			\App\Autoloader::register();
		}

		public function getDb() {
			if ($this->db === null) {
				$config = Config::getInstance(ROOT.'/config/config.php');
				$this->db = new Database($config->get('db_name'));
			}

			return $this->db;
		}

		public function getModel($name) {
		    $model = '\App\Model\\'.ucfirst($name).'Model';
		    return new $model($this->getDb());
        }

        public static function nFormat($number = 0) {
            return number_format($number, 2, ".", "");
        }
	}
