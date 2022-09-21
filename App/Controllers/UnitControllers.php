<?php
namespace App\Controllers;
use App\Model\UnitModel;
use Core\Html\BootstrapForm;

	class UnitControllers extends AppController {

	    public function __construct(){
            parent::__construct();
            $this->loadModel('Unit');
        }

        public function search() {
        	$filter = '';

			if ($_POST['unit'] && $_POST['unit'] !='')
				$filter .= " unit like '%{$_POST['unit']}%'";
			$units = $this->Unit->load($filter);
			$res = '';
			foreach($units as $unit) {

       			$res = '<tr>
		          <td>'.$unit->id.'</td>
		          <td>'.$unit->unit.'</td>
		          <td>
		            <a href="" class="btn btn-danger btn-xs" id_unit="'.$unit->id .'" onclick="deleteArt(this, event);">Delete</a>
		            <a href="<?= App::$path; ?>unit/edit/'.$unit->id.'" class="btn btn-primary btn-xs">Edit</a>
		          </td>
		        </tr>';
		         }

			return $res;
		}

        public function index() {
			$units = $this->Unit->all();

			$form = new BootstrapForm($_POST);

			$this->rander('unit/index', compact('form', 'units'));
		}

		public function delete() {

			if (isset($_POST['id_unit'])) {
				$res = $this->Unit->delete($_POST['id_unit']);

				if ($res) {
					return 1;
				} else {
					return 0;
				}


			}
		}

		public function add() {
			if (! empty($_POST)) {
				$params = [
					'unit' => $_POST['unit'],
				];

				$res = $this->Unit->create($params);
				if($res) {
					$this->directly('<?= App::$path; ?>unit/index');
				}
			}

			$form = new BootstrapForm($_POST);
			$this->rander('unit/edit', compact('form', 'units'));

		}

		public function edit() {
			$id = $_GET['id'];

			if($_POST) {
				$unit = $_POST['unit'];

				$res = $this->Unit->update($id, [
					'unit' 	=> $_POST['unit']
					]);

				if($res) {
					$this->directly('<?= App::$path; ?>unit/index');
				}
			}

			$unit = $this->Unit->find($id);

			$form = new BootstrapForm($unit);
			$this->rander('unit/edit', compact('form'));
		}
	}
