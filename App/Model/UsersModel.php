<?php

	namespace App\Model;
	use Core\Model;
	use Core\Database;


	class UsersModel extends Model {

		protected $table = 'users';


		public function load() {
			$res =  $this->db->query("SELECT
			 users.*, roles.role_name
			FROM users, roles
			WHERE users.role_id = roles.id ");

			return $res;
		}

		public function login($log, $pass) {
			$user = $this->db->query("SELECT users.*,
				roles.role_name,
				roles.show_clients,
				roles.show_suppliers,
				roles.show_sales,
				roles.show_purchases,
				roles.show_articles,
				roles.show_stoke,
				roles.show_users_roles,
				roles.aed_clients,
				roles.aed_suppliers,
				roles.aed_sales,
				roles.aed_purchases,
				roles.aed_users_aed,
				roles.aed_articles
				FROM $this->table, roles
				WHERE users.role_id = roles.id AND login = '{$log}' " , true);

			if ($user) {

				if ($user->pass == sha1($pass)) {
					$_SESSION['user'] = $user;
					setcookie("cm-user-id", $user->id, time() + 3600, '/');
					return true;
				} else {
					return false;
				}
			}
		}

		public function show($id) {
			$app = new \App();
			return $app->getDb()->query("SELECT
				users.*, roles.role_name
				FROM users, roles
				WHERE users.role_id = roles.id AND users.id = {$id}", true);
		}

		public function find($id) {
			return $this->query("SELECT * FROM {$this->table} WHERE id = ? ", [$id], true);
		}
	}
