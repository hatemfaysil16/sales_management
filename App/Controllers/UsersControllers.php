<?php
namespace App\Controllers;
use App\Model\UsersModel;
use Core\Html\BootstrapForm;
use Core\Upload;

	class UsersControllers extends AppController {

	    public function __construct(){
            parent::__construct();
            $this->loadModel('Users');
            $this->loadModel('Role');
        }

		public function login() {
			$error = false;

			if (isset($_SESSION['user'])) {

				$this->directly("articles/index");
			} else {
				if ($_POST) {
					$login = $_POST['login'];
					$pass = $_POST['pass'];

					$res = $this->Users->login($login, $pass);
					if ($res) {
						$this->directly("articles/index");
					} else {
						$error = true;
					}
				}
			}
			$form = new BootstrapForm($_POST);
			$this->rander('users/login', compact('form', 'error'));
		}

		public function logout() {
			$_SESSION = array();
			session_destroy();
			unset($_COOKIE['cm-user-id']);
			setcookie('cm-user-id', null, -1, '/');

			$this->directly("users/login");
		}


        public function index() {
					if ($_SESSION['user']->show_clients) {

			$users = $this->Users->load();

			$form = new BootstrapForm($_POST);

			$this->rander('users/index', compact('form', 'users'));
		} else {
			$this->directly('home');

		}
		}

		public function search() {
        	$filter = '';

			if (isset($_POST['ref']) && $_POST['ref'] !='')
				$filter .= " AND ref like '%{$_POST['ref']}%'";

			if (isset($_POST['desig']) && $_POST['desig'] !='')
				$filter .= " AND desig like '%{$_POST['desig']}%'";

			if (isset($_POST['category_id']) && $_POST['category_id'] != '')
				$filter .= " AND category_id = {$_POST['category_id']}";

			if (isset($_POST['unit_id']) && $_POST['unit_id'] != '')
				$filter .= " AND unit_id = {$_POST['unit_id']}";

			if (isset($_POST['suplier_id']) && $_POST['suplier_id'] != '')
				$filter .= " AND suplier_id = {$_POST['suplier_id']}";

			if (isset($_POST['trv']) && $_POST['trv'] != '')
				$filter .= " AND trv = {$_POST['trv']}";




			$articles = $this->Users->load($filter);

			$res = '';
			foreach($articles as $article) {

       			$res = '<tr>
		          <td>'.$article->id.'</td>
		          <td>'.$article->ref.'</td>
		          <td>'.$article->desig.'</td>
		          <td>'.$article->Tva.'</td>
		          <td>'.$article->supplier_name.'</td>
		          <td>'.$article->cat_name.'</td>
		          <td>'.$article->unit.'</td>
		          <td>
		            <a href="" class="btn btn-danger btn-xs" id_user="'.$article->id .'" onclick="deleteArt(this, event);">Delete</a>
		            <a href="<?= App::$path; ?>articles/edit/'.$article->id.'" class="btn btn-primary btn-xs">Edit</a>
		            <a href="" class="btn btn-success btn-xs">Show</a>
		          </td>
		        </tr>';
		         }

			return $res;
		}

		public function delete() {
			if ($_SESSION['user']->aed_clients) {

			if (isset($_POST['id_user'])) {
				$res = $this->Users->delete($_POST['id_user']);

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
			if ($_SESSION['user']->aed_clients) {

			if (! empty($_POST)) {
				$avater_name = $this->Users->max() + 1 . '.jpg' ;
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

				$res = $this->Users->create($params);
				if ($res && isset($_FILES['avater'])) {
					Upload::one(
					$_FILES['avater'],
					$avater_name,
					ROOT.'/Public/images/users/'
					);
				}
			}

			$roles = $this->Role->extractData('id', 'role_name');

			$form = new BootstrapForm($_POST);
			$this->rander('users/edit', compact('form', 'roles', 'res'));
		} else {
			$this->directly('home');

		}
		}

		public function edit() {
			if ($_SESSION['user']->aed_clients) {

			$id = $_GET['id'];
			if (! empty($_POST)) {

				$avater_name = $id.'.jpg' ;
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

				$res = $this->Users->update($id, $params);
				if ($res && isset($_FILES['avater'])) {
					Upload::one(
					$_FILES['avater'],
					$avater_name,
					ROOT.'/Public/images/users/'
					);
				}
			}

			$roles = $this->Role->extractData('id', 'role_name');
			$users = $this->Users->find($id);

			$form = new BootstrapForm($users);
			$this->rander('users/edit', compact('form', 'users', 'roles', 'res'));
		} else {
			$this->directly('home');

		}
		}

		public function profileedit() {
			$id = $_GET['id'];
			$error = false;
			if (! empty($_POST) && $_POST['new_pass'] == $_POST['conf_pass']) {

				$avater_name = $id.'.jpg' ;
				$params = [
					'login' 		=> $_POST['login'],
					'pass' 			=> sha1($_POST['new_pass']),
					'fname' 		=> $_POST['fname'],
					'lname' 		=> $_POST['lname'],
					'phone' 		=> $_POST['phone'],
					'email'			=> $_POST['email']
				];

				if (isset($_FILES['avater'])) {
					$params['avater'] = $avater_name;
				}

				$res = $this->Users->update($id, $params);

				if ($res && isset($_FILES['avater'])) {
					$_SESSION['user']->pass = sha1($_POST['new_pass']);
					Upload::one(
					$_FILES['avater'],
					$avater_name,
					ROOT.'/Public/images/users/'
					);
				}
			} elseif(! empty($_POST) && $_POST['new_pass'] != $_POST['conf_pass']) {
				$error = true;
			}




			$roles = $this->Role->extractData('id', 'role_name');
			$users = $this->Users->find($id);

			$form = new BootstrapForm($users);
			$this->rander('users/profileedit', compact('form', 'users', 'roles', 'res', 'error'));
		}

		public function profile() {
			$id = $_GET['id'];

			$profile = $this->Users->show($id);

			$this->rander('users/profile', compact('profile'));
		}
	}
