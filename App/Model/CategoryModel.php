<?php
	namespace App\Model;
	use Core\Model;
	/**
	* to load data in database
	*/
	class CategoryModel extends Model
	{
		protected $table = 'categories';

		public function load($filter = null) {
			$app = new \App();
			return $app->getDb()->query("SELECT
			 categories.id, categories.name
			FROM {$this->table}
			WHERE  ".$filter." ");
		}
	}
