<?php

	namespace Core;
	use Core\Database;

	/**
	* The Main Model Class
	*/
	class Model
	{
		protected $db;
		protected $table;

		public function __construct(Database $db)
		{
			$this->db = $db;
		}

		public function all() {
			return $this->query("SELECT * FROM ".$this->table);
		}

		public function max() {
			$res = $this->query("SELECT max(id) as maxid FROM ".$this->table);
			return intval($res[0]->maxid);
		}

		public function extractData($key, $value) {
			$records = $this->all();
			$arr = [];

			foreach ($records as $row) {
				$arr[$row->$key] = $row->$value;
			}

			return $arr;
		}

		public function create($fields) {

			$sql_pairs 	= [];
			$attributes = [];

			foreach ($fields as $k => $v) {
				$sql_pairs[] 	= "$k = ?";
				$attributes[] 	= $v;
			}

			$sql_pairs = implode(", ", $sql_pairs);

			return $this->query("INSERT INTO {$this->table} SET $sql_pairs ", $attributes);

		}

		public function update($id, $fields) {
			$sql_pairs = [];
			$attributes = [];

			foreach ($fields as $k => $v) {
				$sql_pairs[] = "$k = ?";
				$attributes[] = $v;
			}





			$attributes[] = $id;
			$sql_pairs = implode(', ', $sql_pairs);

			$res = $this->query("UPDATE {$this->table} SET $sql_pairs  WHERE id = ?", $attributes);
			return $res;
		}

		public function delete($id) {
			return $this->query("DELETE FROM {$this->table} WHERE id = ? ", [$id], true);
		}

		public function serach($id, $fields = null) {
		}

		public function find($id) {
			return $this->query("SELECT * FROM {$this->table} WHERE id = ? ", [$id], true);
		}

		public function query($statement, $attributes = null, $one = false) {
			if ($attributes != null) {
				return $this->db->prepare($statement, $attributes, $one, str_replace('Model', 'Entity', get_class($this)));
			} else {
				return $this->db->query($statement, $one, str_replace('Model', 'Entity', get_class($this)));
			}
		}
	}
