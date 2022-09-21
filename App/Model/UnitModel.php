<?php
	namespace App\Model;
	use Core\Model;
	/**
	* to load data in database
	*/
	class UnitModel extends Model
	{
		protected $table = 'units';

		public function load($filter = null) {
			$app = new \App();
			return $app->getDb()->query("SELECT
			 units.id, units.unit
			FROM {$this->table}
			WHERE  ".$filter." ");
		}
	}
