<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class ArticlesModel extends Model {

		protected $table = 'articles';

		public function load($filter = null) {
			$app = new \App();
			return $app->getDb()->query("SELECT
			 articles.id, articles.ref, articles.desig, trv.trv as Tva,
			 suppleries.name as supplier_name, categories.name as cat_name,
			 units.unit
			FROM articles, suppleries, categories, trv, units
			WHERE articles.suplier_id = suppleries.id AND articles.category_id = categories.id AND articles.tvr = trv.trv AND articles.unit_id = units.id ".$filter."
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
			return $this->query("SELECT * FROM {$this->table} WHERE id = ? ", [$id], true);
		}
	}
