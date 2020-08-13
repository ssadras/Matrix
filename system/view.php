<?php
class View {
	public static function render ($path, $css_path ,$title="Home", $data=array()){
		extract($data);
		ob_start();
		require_once ("./mvc/view$path");
		$content = ob_get_clean();

		require_once ("./theme/defualt.php");
	}
}