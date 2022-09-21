<?php
namespace Core;

/*class Upload{
	public static function one($filename, $save_as, $output) {
		if (file_exists($output.$save_as)) {
			unlink($output.$save_as);
		}

		move_uploaded_file($filename['tmp_img'], $output.$save_as);
	}
}*/

class Upload{
	public static function one($filename, $save_as, $output) {
		$file = $output.$save_as ;

		if (file_exists($file)) {
			unlink($output.$save_as);
		}

		move_uploaded_file($filename['tmp_name'], $file);
	}
}
