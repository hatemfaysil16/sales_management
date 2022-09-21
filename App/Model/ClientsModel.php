<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class ClientsModel extends Model {

		protected $table = 'clients';

		public function load($filter = null) {
			$app = new \App();
			return $app->getDb()->query("SELECT
			 clients.*
			FROM clients, users
			WHERE clients.created_by = users.id ".$filter."
			");
		}

		public function find($id) {
			$app = new \App();
			return $app->getDb()->query("SELECT
			 clients.*
			FROM clients, prs_clt
			WHERE prs_clt.client_id = clients.id AND prs_clt.id = {$id}
			");
		}

	}
