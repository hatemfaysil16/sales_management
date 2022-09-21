<?php
namespace App\Controllers;
use App\Model\Prs_cltModel;
use Core\Html\BootstrapForm;

	class Prs_cltControllers extends AppController {

	    public function __construct(){
            parent::__construct();
            $this->loadModel('Prs_clt');
            $this->loadModel('Prs_clt_arts');
            $this->loadModel('Clients');
            $this->loadModel('Users');
        }

        public function search() {
        	$filter = '';

			if (isset($_POST['num']) && $_POST['num'] !='')
				$filter .= " AND num like '%{$_POST['num']}%'";

			if (isset($_POST['discr']) && $_POST['discr'] !='')
				$filter .= " AND discr like '%{$_POST['discr']}%'";

			if (isset($_POST['date']) && $_POST['date'] != '')
				$filter .= " AND date = {$_POST['date']}";

			if (isset($_POST['subject']) && $_POST['subject'] != '')
				$filter .= " AND subject = {$_POST['subject']}";

			if (isset($_POST['created_by']) && $_POST['created_by'] != '')
				$filter .= " AND created_by = {$_POST['created_by']}";

			if (isset($_POST['trv']) && $_POST['trv'] != '')
				$filter .= " AND trv = {$_POST['trv']}";

			$prs_clt = $this->Prs_clt->load($filter);

			$res = '';
			foreach($prs_clt as $article) {

       			$res = '<tr>
		          <td>'.$article->id.'</td>
		          <td>'.$article->num.'</td>
		          <td>'.$article->discr.'</td>
		          <td>'.$article->Tva.'</td>
		          <td>'.$article->supplier_name.'</td>
		          <td>'.$article->cat_name.'</td>
		          <td>'.$article->unit.'</td>
		          <td>
		            <a hnum="" class="btn btn-danger btn-xs" id_prs_clt="'.$article->id .'" onclick="deleteArt(this, event);">Delete</a>
		            <a hnum="<?= App::$path; ?>prs_clt/edit/'.$article->id.'" class="btn btn-primary btn-xs">Edit</a>
		            <a hnum="" class="btn btn-success btn-xs">Show</a>
		          </td>
		        </tr>';
		         }

			return $res;
		}

        public function index() {
			$prs_clt = $this->Prs_clt->load();

			$form = new BootstrapForm($_POST);

			$this->rander('prs_clt/index', compact('form', 'prs_clt', 'clients'));
		}

		public function articles() {
			$id = $_GET['id'];
			if (isset($id)) {


			$prs_clt = $this->Prs_clt->find($id);
			$prs_clt_arts = $this->Prs_clt_arts->load($id);
			$form = new BootstrapForm($_POST);



			$this->rander('prs_clt/articles', compact('form', 'prs_clt', 'prs_clt_arts'));
			}
		}

        public function addArt() {
            $prs_clt_id = $_GET['id'];

            $prs_clt = $this->Prs_clt->find($prs_clt_id);

                if (! empty($_POST)) {
                    $params = [
                        'pr_clt_id' 		=> $prs_clt_id,
                        'art_id' 			=> $_POST['article_id'],
                        'qta' 				=> $_POST['qta'],
                        'created_by'	=> $_SESSION['user']->id,
                        'updated_by'	=> $_SESSION['user']->id
                    ];

                    $res = $this->Prs_clt_arts->create($params);

                    if ($res) {
                        $this->directly('prs_clt/articles/'.$prs_clt_id);
                    }
                }


                $prs_clt_arts = $this->Prs_clt_arts->load($prs_clt_id);
                $form = new BootstrapForm($_POST);

                $this->rander('prs_clt/addArt', compact('form', 'prs_clt', 'prs_clt_arts'));

        }

        public function editArt() {
            $prs_clt_id = $_GET['id'];
            $id_row_art = $_GET['id_row_art'];

            $prs_clt = $this->Prs_clt->find($prs_clt_id);

            if (! empty($_POST)) {
                $params = [
                    'qta' 			=> $_POST['qta'],
                    'updated_by'	=> $_SESSION['user']->id
                ];

                $res = $this->Prs_clt_arts->update($id_row_art, $params);

                if ($res) {
                    $this->directly('prs_clt/articles/'.$prs_clt_id);
                }
            }


            $prs_clt_arts = $this->Prs_clt_arts->find(['id_row_art' => $id_row_art, 'prs_clt_id' => $prs_clt_id]);
            $form = new BootstrapForm($prs_clt_arts);
            var_dump($prs_clt_arts);
            $this->rander('prs_clt/editArt', compact('form', 'prs_clt', 'prs_clt_arts'));

        }

		public function delete() {
			if (isset($_POST['id_prs_clt'])) {
				$res = $this->Prs_clt->delete($_POST['id_prs_clt']);

				if ($res) {
					return 1;
				} else {
					return 0;
				}
			}
		}

        public function deleteArt() {
            if (isset($_POST['id_clt_art'])) {
                $res = $this->Prs_clt_arts->delete($_POST['id_clt_art']);

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
					'num' 		=> $_POST['num'],
					'discr' 	=> $_POST['discr'],
					'date' 		=> $_POST['date'],
					'subject' 	=> $_POST['subject'],
					'client_id' => $_POST['client_id_info'],
					'created_by'=> $_SESSION['user']->id,
					'updated_by'=> $_SESSION['user']->id
				];

				$res = $this->Prs_clt->create($params);

				if ($res) {
					$this->directly('prs_clt/index');
				}
			}



			$form = new BootstrapForm($_POST);
			$this->rander('prs_clt/edit', compact('form'));
		}

		public function edit() {
			if ($_SESSION['user']->aed_sales) {

			$id = $_GET['id'];

			if (! empty($_POST)) {
				$params = [
					'num' 				=> $_POST['num'],
					'discr' 			=> $_POST['discr'],
					'date' 				=> $_POST['date'],
					'subject' 		=> $_POST['subject'],
					'client_id' => $_POST['client_id_info'],
					'updated_by'	=> $_SESSION['user']->id
				];

				$res = $this->Prs_clt->update($id, $params);

				if ($res) {
					$this->directly('prs_clt/index');
				}
			}

			$prs_clt = $this->Prs_clt->find($id);

			$form = new BootstrapForm($prs_clt);
			$this->rander('prs_clt/edit', compact('form', 'prs_clt'));
		} else {
			$this->directly('home');

		}
		}

		public function show() {
			$id = $_GET['id'];

			$article = $this->Prs_clt->show($id);

			$this->rander('prs_clt/show', compact('article'));
		}
	}
