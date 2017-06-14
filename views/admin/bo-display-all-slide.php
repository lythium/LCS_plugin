<?php
// Remove the event with specified delete
global $wpdb;
if (!empty($_POST['delete'])):
	$delete_id = $_POST['delete'];
	var_dump($delete_id);
	$wpdb->delete("{$wpdb->prefix}lcs_category", array("Slider_id" => $delete_id));
endif;
echo '<div id="acf-field-group-wrap" class="wrap">';
	echo '<div class="acf-columns-2">';
		echo '<h1 class="wp-heading-inline">'.get_admin_page_title().'</h1>';
		echo '<a class="page-title-action" href="' . admin_url('admin.php?page=add_lcs') . '" class="page-title-action">Ajouter</a>';
		echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
		echo '<table class="wp-list-table widefat fixed striped pages">';
			echo '<thead>';
				echo '<tr>';
					echo '<td id="cd" class="manage-column column check-column">';
						echo '<label class="screen-reader-text" for="cb-select-all-1">Tout sélectionner</label>';
						echo '<input id="cb-select-all-1" type="checkbox">';
					echo '</td>';
					echo '<th id="title" class="manage-column column-title column-primary sortable desc" scope="col" >';
						echo '<a href="" >';
							echo '<span>Titre</span>';
							echo '<span class="sorting-indicator"></span>';
						echo '</a>';
					echo '</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">ID Slide</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">Name Slide</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">Shortcode</th>';
				echo '</tr>';
			echo '</thead>';
					echo '<tbody id"the-list">';
						$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category");
						if ($results):
							foreach ($results as $key ):
								$id = $key->Slider_id;
								$categories_id = unserialize($key->Category_ID);
								$select_id = "cb-select-" . $id;
								echo '<tr class="iedit level-0 type-page status-publish hentry">';
									echo'<th scope="row" class="check-column">';
										echo'<label class="screen-reader-text" for="cb-select-17">Sélectionner '. $key->Slider_Name .'</label>'
										echo'<input id="cb-select-17" name="post[]" value="17" type="checkbox">';
									echo'</th>';
								echo '<td class="manage-column column check-column">';
									echo '<span>';
										echo '<h2>Name : ' . $key->Slider_Name . '</h2>';
										echo '<form action="' . admin_url('admin.php?page=lcs') . '" method="post">';
											echo '<input type="hidden" name="delete" value="'.$id.'">';
											echo '<input type="submit" class="delete" value="Delete" />';
										echo '</form>';
									echo '</span><br>';
									foreach ( 	$categories_id as $cat_id ):
										$cat_name = get_cat_name( $cat_id );
										echo '<span>Categorie  : ' . $cat_name . '</span><br>';
										echo '<br>';
									endforeach;
									echo '<p><strong>[category_show num=' . $key->Slider_id . ']</strong></p>';
									echo '<br>';
								echo'</th>';
							endforeach;
						else:
							echo '<tr class="no-items">Sorry, None Category Slide</tr>';
						endif;
					echo '<tbody id"the-list">';

		echo '</table>';
	echo '</div>';
echo '</div>';
 ?>
<style media="screen">

</style>
