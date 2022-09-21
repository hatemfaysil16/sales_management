<?php
namespace App\Controllers;
use App\Model\SuppliersModel;
use Core\Html\BootstrapForm;

	class SupplierControllers extends AppController {

	    public function __construct()
        {
            parent::__construct();
            $this->loadModel('Supplier');
        }

				public function index() {
					$suppliers = $this->Supplier->load();

					$form = new BootstrapForm($_POST);
					$this->rander('supplier/index', compact('form', 'suppliers'));
				}

				public function delete() {
					if (isset($_POST['id_supplier'])) {
						$res = $this->Supplier->delete($_POST['id_supplier']);
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


			$suppliers = $this->Supplier->load($filter);

			$res = '';
			foreach($suppliers as $supplier) {

						$res = '<tr>
							<td>'.$supplier->id.'</td>
							<td>'.$supplier->name.'</td>
							<td>'.$supplier->adress.'</td>
							<td>'.$supplier->tel.'</td>
							<td>'.$supplier->adress.'</td>
							<td>'.$supplier->city.'</td>
							<td>'.$supplier->email.'</td>
							<td>'.$supplier->zip_code.'</td>
							<td>
								<a href="" class="btn btn-danger btn-xs" id_supplier="'.$supplier->id .'" onclick="deleteElement(this, event);">Delete</a>
								<a href="<?= App::$path; ?>supplier/edit/'.$supplier->id.'" class="btn btn-primary btn-xs">Edit</a>
								<a href="" class="btn btn-success btn-xs">Show</a>
							</td>
						</tr>';
						 }

			return $res;
		}

				public function add() {
					if ($_SESSION['user']->aed_suppliers) {
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
						$res = $this->Supplier->create($params);
						if ($res) {
							$this->directly('supplier/index');
						}

					}



					$form = new BootstrapForm($_POST);
					$this->rander('supplier/edit', compact('form'));


					}else {
						$this->directly('<?= App::$path; ?>home');
					}
				}

				public function edit() {
					if ($_SESSION['user']->aed_suppliers) {

					$id = $_GET['id'];

					if ($_POST) {
						$res = $this->Supplier->update($id, [
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
								$this->directly("supplier/index");
							}
					}

					$supplier = $this->Supplier->find($id);

					$form = new BootstrapForm($supplier);

					$this->rander('supplier/edit', compact('form','suppliers','suppliers' ,'categories', 'units', 'tva'));
				} else {
					$this->directly('home');

				}
				}


		public function model() {
			$suppliers = $this->Supplier->all();
			$rs = "";

			foreach ($suppliers as $supplier) {
				$rs .= "<tr>
				  <td><button  supplier_select_id='".$supplier->id."' class='supplier_select btn btn-primary btn-xs' onclick='selectSupplier(this, event);'>Select</button></td>
		          <td class='supplier-name'>".$supplier->name."</td>
		          <td class='supplier-city'>".$supplier->city."</td>
		          <td class='supplier-adress'>".$supplier->adress."</td>
		          </tr>
				";
			}

			return $rs;
		}

	}
