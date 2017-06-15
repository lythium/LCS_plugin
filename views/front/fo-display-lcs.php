<?php
echo '<div class="row lcs_' . $id_shortcode . '">';
if ($results):
	foreach ($results as $key ):
		echo '<h3 class="title_lcs">Name :' . $key->Slider_Name . '</h3><br>';
		echo '<br>';
		$categories_id = unserialize($key->Category_ID);
		foreach ( 	$categories_id as $cat_id ):
			$cat_name = get_cat_name( $cat_id );
			echo '<div class="col-md-4 category_lcs">';
				echo '<div class="category_name_lcs">';
					echo '<h4>Categorie</h4><br>';
					echo '<h5>Categorie  :' . $cat_name . '</h5>';
				echo '</div>';
			echo '</div>';
		endforeach;
	endforeach;
endif;
echo '</div>';
?>

<style>
.title_lcs {
	text-align: center;
}
.category_lcs {
	padding: 10px 20px;
	min-height: 200px;
}
.category_name_lcs {
	border: 2px dashed black;
}
.category_name_lcs h4 {
	text-align: center;
	border-bottom: 2px solid black;
}
.category_name_lcs h5 {
	text-align: center;
}
</style>
