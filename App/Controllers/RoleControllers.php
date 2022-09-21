<?php
namespace App\Controllers;
use App\Model\UsersModel;
use App\Model\RoleModel;

	class RoleControllers extends AppController {

	    public function __construct(){
            parent::__construct();
            $this->loadModel('Users');
            $this->loadModel('Role');
        }

        public function index() {
					if ($_SESSION['user']->show_users_roles) {

			$roles = $this->Role->all();

			$this->rander('role/index', compact('roles'));
		}  else {
			$this->directly('home');

		}
		}

		public function delete() {
			if ($_SESSION['user']->aed_users_aed) {

			if (isset($_POST['id_role'])) {
				$res = $this->Role->delete($_POST['id_role']);

				if ($res) {
					return 1;
				} else {
					return 0;
				}
			}
		} else {
			$this->directly('home');

		}
		}

		public function add() {
			if ($_SESSION['user']->aed_users_aed) {

			if (! empty($_POST)) {

				$params = [
					'role_name' 		=> $_POST['role_name'],
					'show_clients' 		=> $_POST['show_clients'],
					'aed_clients' 		=> $_POST['aed_clients'],
					'show_suppliers' 	=> $_POST['show_suppliers'],
					'aed_suppliers' 	=> $_POST['aed_suppliers'],
					'show_sales'		=> $_POST['show_sales'],
					'aed_sales'			=> $_POST['aed_sales'],
					'show_purchases'	=> $_POST['show_purchases'],
					'aed_purchases'		=> $_POST['aed_purchases'],
					'show_articles'		=> $_POST['show_articles'],
					'show_stoke'		=> $_POST['show_stoke'],
					'show_users_roles'	=> $_POST['show_users_roles'],
					'aed_users_aed'		=> $_POST['aed_users_aed'],
				];



				$res = $this->Role->create($params);
			}
			$roles = $this->Role->all();
			//$roles = $this->Role->extractData('id', 'role_name');
			$this->rander('role/edit', compact('roles'));
		}else {
			$this->directly('home');

		}
		}

		public function edit() {
			if ($_SESSION['user']->aed_users_aed) {

			$id = $_GET['id'];
			if (! empty($_POST)) {

				$params = [
					'login' 		=> $_POST['login'],
					'pass' 			=> sha1($_POST['pass']),
					'fname' 		=> $_POST['fname'],
					'lname' 		=> $_POST['lname'],
					'phone' 		=> $_POST['phone'],
					'email'			=> $_POST['email'],
					'function'		=> $_POST['function'],
					'role_id'		=> $_POST['role_id'],
					'created_by'	=> $_SESSION['user']->id,
					'updated_by'	=> $_SESSION['user']->id
				];

				if (isset($_FILES['avater'])) {
					$params['avater'] = $avater_name;
				}

				$res = $this->Role->update($id, $params);
				if ($res && isset($_FILES['avater'])) {
					Upload::one(
					$_FILES['avater'],
					$avater_name,
					ROOT.'/Public/images/roles/'
					);
				}
			}

			$roles = $this->Role->find($id);

			$form = new BootstrapForm($roles);
			$this->rander('role/edit', compact('form', 'roles', 'role', 'res'));
		}else {
			$this->directly('home');

		}
	}
	}
