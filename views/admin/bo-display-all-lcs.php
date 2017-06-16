<?php
// Remove the event with specified delete
global $wpdb;
$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category");
if (!is_null($row)):
var_dump($_GET);
	if (!empty($_GET['delete'])):
		$delete_id = $_GET['delete'];
		var_dump($delete_id);
		$wpdb->delete("{$wpdb->prefix}lcs_category", array("Slider_id" => $delete_id));
	endif;
endif;

echo '<div id="acf-field-group-wrap" class="wrap">';
	echo '<div class="acf-columns-2">';
		echo '<h1 class="wp-heading-inline">'.get_admin_page_title().'</h1>';
		echo '<a class="page-title-action" href="' . admin_url('admin.php?page=add_lcs') . '" class="page-title-action">Ajouter</a>';
		echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
		echo '<table class="wp-list-table widefat fixed striped pages">';
			echo '<thead>';
				echo '<tr>';
					echo '<th scope="col" id="fields" class="manage-column column-title column-primary column-fields">Name Slide</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">ID Slide</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">Categories</th>';
					echo '<th scope="col" id="fields" class="manage-column column-fields">Shortcode</th>';
				echo '</tr>';
			echo '</thead>';
			echo '<tbody id"the-list">';
			$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category");
			if (!is_null($row)):
				$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category");
				if ($results):
					foreach ($results as $key ):
						$id = $key->Slider_id;
						$url_update =  "admin.php?page=update_lcs&select=".$id;
						$url_delete = "admin.php?page=lcs&delete=".$id;
						$categories_id = unserialize($key->Category_ID);
						$select_id = "cb-select-" . $id;

						echo '<tr class="iedit level-0 type-page status-publish hentry">';
							echo '<td class="title column-title has-row-actions column-primary page-title" data-colname="Titre">';
								echo '<div class="locked-info">';
									echo '<span class="locked-avatar"></span> ';
									echo '<span class="locked-text"></span>';
								echo '</div>';
								echo '<strong><a class="row-title" href="">'. $key->Slider_Name .'</a></strong>';
								// Row action
								echo '<div class="row-actions">';
									echo '<span class="edit inline">';
									// update lcs
										echo '<input type="hidden" name="select_id" value="'.$id.'">';
										echo '<a href="' . admin_url($url_update) . '" >modifier</a>';
									echo '</span><span class="inline"> | </span>';
									echo '<span class="trash inline">';
									// delete lcs
										echo '<input type="hidden" name="delete" value="'.$id.'">';
										echo '<a href="' . admin_url($url_delete) . '">Supprimer</a>';
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
				endif;
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
