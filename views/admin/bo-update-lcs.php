<?php
global $wpdb;
if (empty($_POST["select_id"])):
	header('Location: /wp-admin/admin.php?page=lcs');
else :
	$id_select = $_POST["select_id"];
	$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_select'");
	if (!is_null($row)):
		$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category");
		if ($results):
			foreach ($results as $key ):
				$id = $key->Slider_id;
				$name = $key->Slider_Name;
				$categories_id = unserialize($key->Category_ID);
				echo '<span>ID : '. $id .' - Name : '. $name .'</span>';
			endforeach;
		endif;
	endif;
endif;
 ?>
