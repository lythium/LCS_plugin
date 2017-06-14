<?php
echo '<h1>'.get_admin_page_title().'</h1>';


echo '<form action="' . admin_url('admin.php?page=lcs') . '" method="post">';
	echo '<label for="lcs_name_add"> <strong> Nom du Slider </strong> </label> <input type="text" id="lcs_name_add" name="lcs_name_add" value=""><br>';
	echo '<label for="lcs_category_add"> <strong> Choix des Categories </strong> </label>';


	$categories = get_categories( array(
	    'orderby' => 'id',
	    'order'   => 'ASC'
	) );
	$xyz = 0;
	echo '<div class="input-checkbox">';

		foreach ($categories as $category) {
			// ' . checked() . '
			echo '<input type="checkbox" id="lcs_category_add" name="lcs_category_add[]" value="' . $category->cat_ID . '" class="clearclass' . esc_attr( ($xyz++%3) ) . '">
						<span><strong>Catégorie : </strong>' . $category->name . '<strong> - ID : </strong>' . $category->cat_ID . '</span>';
		}
	echo '</div>';
	submit_button();
echo '</form>';
var_dump($_POST);
  ?>
<style media="screen">
	.input-checkbox span {
		margin-right: 10px;
	}
</style>
