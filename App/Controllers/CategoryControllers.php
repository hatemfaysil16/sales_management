<?php
namespace App\Controllers;
use App\Model\CategoryModel;
use Core\Html\BootstrapForm;

	class CategoryControllers extends AppController {

	    public function __construct(){
            parent::__construct();
            $this->loadModel('Category');
        }

        public function search() {
        	$filter = '';

			if ($_POST['name'] && $_POST['name'] !='')
				$filter .= " name like '%{$_POST['name']}%'";
			$categories = $this->Category->load($filter);
			$res = '';
			foreach($categories as $category) {

       			$res = '<tr>
		          <td>'.$category->id.'</td>
		          <td>'.$category->name.'</td>
		          <td>
		            <a href="" class="btn btn-danger btn-xs" id_cat="'.$category->id .'" onclick="deleteArt(this, event);">Delete</a>
		            <a href="<?= App::$path; ?>categories/edit/'.$category->id.'" class="btn btn-primary btn-xs">Edit</a>
		          </td>
		        </tr>';
		         }

			return $res;
		}

        public function index() {
			$categories = $this->Category->all();

			$form = new BootstrapForm($_POST);

			$this->rander('category/index', compact('form', 'categories'));
		}

		public function delete() {

			if (isset($_POST['id_cat'])) {
				$res = $this->Category->delete($_POST['id_cat']);

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
					'name' => $_POST['name'],
				];

				$res = $this->Category->create($params);
				if($res) {
					$this->directly('<?= App::$path; ?>category/index');
				}
			}

			$form = new BootstrapForm($_POST);
			$this->rander('category/edit', compact('form', 'categories'));

		}

		public function edit() {
			$id = $_GET['id'];

			if($_POST) {
				$name = $_POST['name'];

				$res = $this->Category->update($id, [
					'name' 	=> $_POST['name']
					]);

				if($res) {
					$this->directly('<?= App::$path; ?>category/index');
				}
			}

			$category = $this->Category->find($id);

			$form = new BootstrapForm($category);
			$this->rander('category/edit', compact('form'));
		}
	}
