<?php
global $wpdb;
if (empty($_GET["select"])):
	header('Location: /wp-admin/admin.php?page=lcs');
else :
	$id_select = $_GET["select"];
	var_dump($id_select);
	echo '<div class="wrap">';
		echo '<h1 class="wp-heading-inline">'.get_admin_page_title().'</h1>';
		echo '<a class="page-title-action hide-if-no-customize" href="' . admin_url('admin.php?page=add_lcs') . '" class="page-title-action">Ajouter</a>';
		echo '<hr class="wp-header-end"></hr>';

		$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_select'");
		if (!is_null($row)):
			$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_select'");

			if ($results):
				foreach ($results as $key ):
					$id = $key->Slider_id;
					$name = sprintf("%s", $key->Slider_Name);
					$categories_id = unserialize($key->Category_ID);
					echo '<div class="section-one">';
						echo '<h3>Options</h3>';
						echo '<form id="update-meta" method="post" enctype="multipart/form-data">';
							echo '<div class="section-title">';
								echo '<label class="menu-name-label" for="menu-name">Nom du Slide</label>';
								echo " ";
								echo '<input name="menu-name" id="menu-name" value="' . $name . '" type="text" class="menu-name regular-text menu-item-textbox">';
							echo '</div>';

							echo '<div id="menu-content" class="wp-clearfix">';
								echo '<div class="menu-settings">';
										echo '<h4> Type </h4>';
										echo '<div class="menu-settings-input radio-input">';
											echo '<input type="radio" id="type_lcs" name="type_lcs" value="1"><label for="type_lcs"> Slide </label><br>';
											echo '<input type="radio" id="type_lcs" name="type_lcs" value="2"><label for="type_lcs"> Card </label><br>';
										echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</form>';
					echo '</div>';
					echo '<div class="section-two">';
						echo '<h3> Category </h3>';
						echo '<div class="section-content">';
							echo '<ul class="categorychecklist form-no-clear"';
							foreach ($categories_id as $cat_id ):
								$cat_name = get_cat_name( $cat_id );
								echo '<li>';
									echo '<label class="menu-item-category">';
									echo '<input type="checkbox" class="category-item-id" name"category-id" value="'.$cat_id.'">';
									echo 	$cat_name;
									echo '</label>';
								echo '</li>';
							endforeach;
							echo '</ul>';
						echo '</div>';
					echo '</div>';
				endforeach;
			endif;
		endif;
	echo '</div>';
endif;
 ?>
<style media="screen">
	#menu-management-settings {
		padding-top: 15px;
	}
</style>
