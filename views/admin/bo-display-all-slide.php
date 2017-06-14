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
							echo '<span>Name Slide</span>';
							echo '<span class="sorting-indicator"></span>';
						echo '</a>';
					echo '</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">ID Slide</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">Categories</th>';
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
							echo '<th scope="row" class="check-column">';
								echo '<label class="screen-reader-text" for="cb-select-17">Sélectionner '. $key->Slider_Name .'</label>';
								echo '<input id="'.$select_id.'" name="post[]" value="17" type="checkbox">';
								echo '<div class="locked-indicator">';
									echo '<span class="locked-indicator-icon" aria-hidden="true"></span>';
									echo '<span class="screen-reader-text">\"'. $key->Slider_Name .'\" est verrouillé</span>';
								echo '</div>';
							echo '</th>';
							echo '<td class="title column-title has-row-actions column-primary page-title" data-colname="Titre">';
								echo '<div class="locked-info">';
									echo '<span class="locked-avatar"></span> ';
									echo '<span class="locked-text"></span>';
								echo '</div>';
								echo '<strong><a class="row-title" href="">'. $key->Slider_Name .'</a></strong>';
								echo '<div class="row-actions">';
									echo '<span class="edit"><a href="">Modifier</a> | </span>';
									echo '<span class="trash">';
										echo '<form action="' . admin_url('admin.php?page=lcs') . '" method="post">';
											echo '<input type="hidden" name="delete" value="'.$id.'">';
											// echo '<input type="submit" class="delete" value="Delete" />';
											echo '<a type="submit" href="" class="submitdelete" value="Delete">Supprimer</a>';
										echo '</form>';
									echo '</span>';
								echo '</div>';
							echo '</td>';
							echo '<td class="id-column column">';
								echo '<strong><span>'.$id.'</span></strong>';
							echo '</td>';
							echo '<td class="category-column column">';
								foreach ( 	$categories_id as $cat_id ):
									$cat_name = get_cat_name( $cat_id );
									echo '<span>' . $cat_name . '</span><br>';
								endforeach;
							echo '</td>';
							echo '<td class="id-column column">';
								echo '<span>';
								echo '<strong>[category_show num=' . $key->Slider_id . ']</strong>';
								echo '</span>';
							echo '</td>';
						echo'</th>';
					endforeach;
				else:
					echo '<tr class="no-items">';
						echo '<td class="colspanchange" colspan="7">Sorry, None Category Slide</td>';
					echo '</tr>';
				endif;
			echo '</tbody>';
		echo '</table>';
	echo '</div>';
echo '</div>';
 ?>
<style media="screen">

</style>
