<?php
global $wpdb;
if (empty($_GET["select"])):
	header('Location: /wp-admin/admin.php?page=lcs');
else :
	$id_select = $_GET["select"];
	var_dump($id_select);
	echo '<div class="wrap lcs-display">';
		echo '<h1 class="wp-heading-inline">'.get_admin_page_title().'</h1>';
		echo '<a class="page-title-action hide-if-no-customize" href="' . admin_url('admin.php?page=add_lcs') . '" class="page-title-action">Ajouter</a>';
		echo '<hr class="wp-header-end"></hr>';

	$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_select'");
	if (!is_null($row)):
		$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_select'");

		if ($results):
			foreach ($results as $key ):
				$id = $key->LCS_id;
				$type_select = $key->LCS_Type;
				$numb_select = $key->LCS_number;
				$name = sprintf("%s", $key->LCS_Name);
				$categories_id = unserialize($key->Category_ID);
					echo '<form id="update-meta" method="post" enctype="multipart/form-data">';
						echo '<div id="section-1" class="section">';
							echo '<div class="section-container">';
								echo '<label for="lcs_name_add"> <strong> Nom du Slider </strong> </label> <input type="text" id="lcs_name_add" name="lcs_name_add" value=""><br>';
							echo '</div>';
						echo '</div>';

						echo '<div id="section-2" class="section">';
							echo '<div class="section-container">';
								echo '<label for="groupe-type"> <strong> Choix du Type </strong> </label><br>';
								echo '<div id="groupe-type" class="menu-settings-input radio-input">';
									echo '<input type="radio" id="lcs_type_add" name="lcs_type_add" value="1" '. checked($type_select, 1, false) .' ><label for="lcs_type_add"> Slide </label><br>';
									echo '<input type="radio" id="lcs_type_add" name="lcs_type_add" value="2" '. checked($type_select, 2, false) .' ><label for="lcs_type_add"> Card </label><br>';
								echo '</div>';
								echo '<br>';
								echo '<br>';
							echo '</div>';
						echo '</div>';

						echo '<div id="section-3" class="section">';
							echo '<div class="section-container">';
								echo '<label for="lcs_number_add"> <strong> Nombre d\'affichage sur une ligne </strong> </label><br>';
								echo '<select id="lcs_number_add" name="lcs_number_add">';
									echo '<option value="2" ' . selected( $numb_select, 2 ) . '>2</option>';
									echo '<option value="3"' . selected( $numb_select, 3 ) . '>3</option>';
									echo '<option value="4"' . selected( $numb_select, 4 ) . '>4</option>';
								echo '</select>';
							echo '</div>';
						echo '</div>';

						echo '<div id="section-4" class="section">';
							echo '<div class="section-container">';
								echo '<label for="lcs_category_add"> <strong> Choix des Categories </strong> </label><br>';
								$categories = get_categories( array(
									'orderby' => 'id',
									'order'   => 'ASC'
								) );
								$xyz = 0;
								echo '<div class="input-checkbox">';
									echo '<ul>';
									foreach ($categories as $category):
										if (in_array($category->cat_ID, $categories_id)):
											$checked = "checked";
										else :
											$checked = "";
										endif;
										echo '<li>';
											echo '<label class="menu-item-category">';
											echo '<input type="checkbox" class="category-item-id" name"category-id" value="'.$category->cat_ID.'" '.$checked.'>';
											echo $category->name;
											echo '</label>';
										echo '</li>';
									endforeach;
									echo '</ul>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						submit_button();
					echo '</form>';
				endforeach;
			endif;
		endif;
	echo '</div>';
endif;
 ?>
<style media="screen">
	.section {
		margin: 10px;
		padding: 5px;
		background-color: #FFFFFF;
	}
	.section-container {
		padding: 10px;
		background-color: #DDDDDD;
		border-radius: 5px;
	}
	.section h3 {
		margin-top: 0px;
		background-color: #F5F5F5;
	}
</style>
