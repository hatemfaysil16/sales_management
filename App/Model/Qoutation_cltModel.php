<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class Qoutation_cltModel extends Model {

		protected $table = 'qoutation_clt';

		public function load($filter = null) {
			return $this->query("SELECT
			 qoutation_clt.*,
			 clients.name as client_name
			FROM qoutation_clt, clients
			WHERE qoutation_clt.client_id = clients.id ".$filter."
			");
}
		public function show($id) {
			$app = new \App();
			return $app->getDb()->query("SELECT
				articles.id, articles.ref, articles.desig, articles.thumb, articles.created_at, trv.trv as Tva,
				 suppleries.name as supplier_name, categories.name as cat_name,
				 units.unit
				FROM articles, suppleries, categories, trv, units
				WHERE articles.suplier_id = suppleries.id AND articles.category_id = categories.id AND articles.tvr = trv.trv AND articles.unit_id = units.id AND articles.id = {$id}", true);
		}


		public function find($id) {
			return $this->query("SELECT
				qoutation_clt.*,
				 clients.name as client_name,
				 clients.city,
				 clients.adress
				FROM qoutation_clt, clients WHERE qoutation_clt.client_id = clients.id AND qoutation_clt.id = ? ",[$id] , true);
		}
	}
