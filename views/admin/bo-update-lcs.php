<?php
$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category");
if ($results):
	foreach ($results as $key ):
		$id = $key->Slider_id;
		$name = $key->Slider_Name;
		$categories_id = unserialize($key->Category_ID);
		echo '<span>ID : '. $id .' - Name : '. $name .'</span>';
	endforeach;
endif;
 ?>
