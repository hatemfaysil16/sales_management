<?php
	namespace Core\Html;

	/**
	* To Generate inputs Dynamic
	*/
	class Form
	{
		private $data;
		private $surround;

		public function __construct($data = array())
		{
			$this->data = $data;
		}

		protected function surround($index) {
			$this->surround = "<p>".$index."</p>";
			return $this->surround;
		}

		protected function getValue($index) {
			if (is_object($this->data)) {
				return $this->data->$index;
			}

			return isset($this->data[$index]) ?	$this->data[$index] : null;

		}

		public function extractAttr($attributes) {
			$attrOptions = '';

			foreach ($attributes as $key => $value) {
				$attrOptions .= $key . "='".$value."'";
			}

			return $attrOptions;
		}


		public function input($label, $name) {
			$label = "<label>".$label."</label>";
			$name = "<input type='text' name=".$name." value='".$this->getValue($name)."'/>";

			return $this->surround($label.$name);
		}

		public function button($name, $value) {
			return "<button type='submit' name=".$name.">".$value."</button>";
		}
	}
