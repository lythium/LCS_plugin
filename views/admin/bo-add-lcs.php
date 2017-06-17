<?php
echo '<h1>'.get_admin_page_title().'</h1>';


echo '<form action="' . admin_url('admin.php?page=lcs') . '" method="post">';
	echo '<div id="section-1" class="section">';
		echo '<label for="lcs_name_add"> <strong> Nom du Slider </strong> </label> <input type="text" id="lcs_name_add" name="lcs_name_add" value=""><br>';
	echo '</div>';

	echo '<div id="section-2" class="section">';
		echo '<label for="groupe-type"> <strong> Choix du Type </strong> </label><br>';
		echo '<div id="groupe-type" class="menu-settings-input radio-input">';
			echo '<input type="radio" id="lcs_type_add" name="lcs_type_add" value="1"><label for="lcs_type_add"> Slide </label><br>';
			echo '<input type="radio" id="lcs_type_add" name="lcs_type_add" value="2"><label for="lcs_type_add"> Card </label><br>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
	echo '</div>';

	echo '<div id="section-3" class="section">';
	echo '</div>';

	echo '<div id="section-4" class="section">';
		echo '<label for="lcs_category_add"> <strong> Choix des Categories </strong> </label><br>';
		$categories = get_categories( array(
		    'orderby' => 'id',
		    'order'   => 'ASC'
		) );
		$xyz = 0;
		echo '<div class="input-checkbox">';

			foreach ($categories as $category) {
				// ' . checked() . '
				echo '<input type="checkbox" id="lcs_category_add" name="lcs_category_add[]" value="' . $category->cat_ID . '" class="clearclass' . esc_attr( ($xyz++%3) ) . '">';
					echo '<span><strong>Catégorie : </strong>' . $category->name . '<strong> - ID : </strong>' . $category->cat_ID . '</span>';
			}
		echo '</div>';
	echo '</div>';
	submit_button();
echo '</form>';
var_dump($_POST);
  ?>
<style media="screen">
	.input-checkbox span {
		margin-right: 10px;
	}
	.section {
		margin: 10px;
		padding: 10px;
		background-color: #FFFFFF;
	}
</style>
