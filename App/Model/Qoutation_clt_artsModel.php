<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class qoutation_clt_artsModel extends Model {

		protected $table = 'qoutation_clt_arts';

		public function load($id) {

			return $this->query("SELECT
			 qoutation_clt_arts.*,
			 (qoutation_clt_arts.qta * qoutation_clt_arts.price) as total,
			 articles.ref,
			 articles.desig
			FROM qoutation_clt_arts, articles, qoutation_clt
			WHERE qoutation_clt.id = qoutation_clt_arts.qoutation_clt_id AND qoutation_clt_arts.art_id = articles.id AND qoutation_clt.id = ?
			", [$id]);
}


		public function find($vars) {

			return $this->query("SELECT
			 qoutation_clt_arts.*,
			 (qoutation_clt_arts.qta * qoutation_clt_arts.price) as total,
			 articles.ref,
			 articles.desig,
			 qoutation_clt.num
			FROM qoutation_clt_arts, articles, qoutation_clt
			WHERE qoutation_clt.id = qoutation_clt_arts.qoutation_clt_id	
			AND qoutation_clt_arts.art_id = articles.id 
			AND qoutation_clt_arts.id = ? 
			AND qoutation_clt_arts.qoutation_clt_id = ? 
			", [ $vars['id_row_art'], $vars['qoutation_clt_id'] ], true);
		}
	}
