<?php
namespace App\Controllers;
use App\Model\ClientssModel;
use Core\Html\BootstrapForm;

	class ClientsControllers extends AppController {

	    public function __construct()
        {
            parent::__construct();
            $this->loadModel('Clients');
        }

				public function index() {
					$clients = $this->Clients->load();

					$form = new BootstrapForm($_POST);
					$this->rander('clients/index', compact('form', 'clients'));
				}

				public function delete() {
					if (isset($_POST['id_client'])) {
						$res = $this->Clients->delete($_POST['id_client']);
						if ($res) {
							return 1;
						} else {
							return 0;
						}
					}
				}

				public function search() {
					$filter = '';

			if (isset($_POST['name']) && $_POST['name'] !='')
				$filter .= " AND name like '%{$_POST['name']}%'";

			if (isset($_POST['adress']) && $_POST['adress'] !='')
				$filter .= " AND adress like '%{$_POST['adress']}%'";

			if (isset($_POST['tel']) && $_POST['tel'] != '')
				$filter .= " AND tel = {$_POST['tel']}";

			if (isset($_POST['city']) && $_POST['city'] != '')
				$filter .= " AND city = {$_POST['city']}";


			$clients = $this->Clients->load($filter);

			$res = '';
			foreach($clients as $client) {

						$res = '<tr>
							<td>'.$client->id.'</td>
							<td>'.$client->name.'</td>
							<td>'.$client->adress.'</td>
							<td>'.$client->tel.'</td>
							<td>'.$client->adress.'</td>
							<td>'.$client->city.'</td>
							<td>'.$client->email.'</td>
							<td>'.$client->zip_code.'</td>
							<td>
								<a href="" class="btn btn-danger btn-xs" id_client="'.$client->id .'" onclick="deleteElement(this, event);">Delete</a>
								<a href="<?= App::$path; ?>clients/edit/'.$client->id.'" class="btn btn-primary btn-xs">Edit</a>
								<a href="" class="btn btn-success btn-xs">Show</a>
							</td>
						</tr>';
						 }

			return $res;
		}

				public function add() {
					if ($_SESSION['user']->aed_clients) {
					if (! empty($_POST)) {
						$params = [
							'name' 			=> $_POST['name'],
							'tel' 		=> $_POST['tel'],
							'email' 	=> $_POST['email'],
							'adress' 		=> $_POST['adress'],
							'city' 			=> $_POST['city'],
							'zip_code'	=> $_POST['zip_code'],
							'created_by'	=> $_SESSION['user']->id,
							'updated_by'	=> $_SESSION['user']->id
						];
						$res = $this->Clients->create($params);
						if ($res) {
							$this->directly('clients/index');
						}

					}



					$form = new BootstrapForm($_POST);
					$this->rander('clients/edit', compact('form'));


					}else {
						$this->directly('<?= App::$path; ?>home');
					}
				}

				public function edit() {
					if ($_SESSION['user']->aed_clients) {

					$id = $_GET['id'];

					if ($_POST) {
						$res = $this->Clients->update($id, [
							'name' 			=> $_POST['name'],
							'tel' 		=> $_POST['tel'],
							'email' 	=> $_POST['email'],
							'adress' 		=> $_POST['adress'],
							'city' 			=> $_POST['city'],
							'zip_code'	=> $_POST['zip_code'],
							'created_by'	=> $_SESSION['user']->id,
							'updated_by'	=> $_SESSION['user']->id
							]);

							if ($res) {
								$this->directly("clients/index");
							}
					}

					$client = $this->Clients->find($id);

					$form = new BootstrapForm($client);

					$this->rander('clients/edit', compact('form','clients','clients' ,'categories', 'units', 'tva'));
				} else {
					$this->directly('home');

				}
				}

				public function model() {
					$clients = $this->Clients->all();
					$rs = "";

					foreach ($clients as $client) {
						$rs .= "<tr>
							<td><a href='#' client_select_id='".$client->id."' class='client_select btn btn-primary btn-xs' onclick='selectClient(this, event);'>Select</a>
 							</td>
									<td class='client-name'>".$client->name."</td>
									<td class='client-city'>".$client->city."</td>
									<td class='client-adress'>".$client->adress."</td>
									</tr>
						";
					}

					return $rs;
				}

	}
