<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class SupplierModel extends Model {

		protected $table = 'suppleries';

		public function load($filter = null) {
			$app = new \App();
			return $app->getDb()->query("SELECT
			 suppleries.*
			FROM suppleries, users
			WHERE suppleries.created_by = users.id ".$filter."
			");
		}

	}
