<?php

	namespace Core;

	/**
	* Make Singleton Design Pattern
	* Make Instance From Class just once
	*/
	class Config
	{
		private static $_instance;
		public $settigns = [];

		function __construct($config_file)
		{
			$this->settigns = include ($config_file);
		}

		public static function getInstance($config_file) {
			if (self::$_instance === null) {
				self::$_instance = new Config($config_file);
			}

			return self::$_instance;
		}

		public function get($key) {
			return $this->settigns[$key];
		}
	}
