<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class Prs_clt_artsModel extends Model {

		protected $table = 'pr_clt_arts';

		public function load($id) {

			return $this->query("SELECT
			 pr_clt_arts.*,
			 articles.ref,
			 articles.desig
			FROM pr_clt_arts, articles, prs_clt
			WHERE prs_clt.id = pr_clt_arts.pr_clt_id AND pr_clt_arts.art_id = articles.id AND prs_clt.id = ?
			", [$id]);
}


		public function find($vars) {

			return $this->query("SELECT
			 pr_clt_arts.*,
			 articles.ref,
			 articles.desig,
			 prs_clt.num
			FROM pr_clt_arts, articles, prs_clt
			WHERE prs_clt.id = pr_clt_arts.pr_clt_id 
			AND pr_clt_arts.art_id = articles.id 
			AND pr_clt_arts.id = ? 
			AND pr_clt_arts.pr_clt_id = ? 
			", [ $vars['id_row_art'], $vars['prs_clt_id'] ], true);
		}
	}
