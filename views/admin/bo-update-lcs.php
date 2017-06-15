<?php
if (empty($_POST["select_id"]))
	header('Location: '. admin_url("admin.php?page=lcs").')';
else :
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
 ?>
