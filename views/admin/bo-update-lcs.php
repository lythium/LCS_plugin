<?php
global $wpdb;
if (empty($_POST["select_id"])):
	header('Location: /wp-admin/admin.php?page=lcs');
else :
	$id_select = $_POST["select_id"];
	echo '<div class="warp">'
		echo '<h1 class="wp-heading-inline">'.get_admin_page_title().'</h1>';
		echo '<a class="page-title-action" href="' . admin_url('admin.php?page=add_lcs') . '" class="page-title-action">Ajouter</a>';
		echo '<hr class="wp-header-end"></hr>';

			echo '<div id="menu-settings-column" class="metabox-holder">';
				echo '<div class="clear"></div>';
					echo '<form id="nav-menu-meta" class="nav-menu-meta" method="post" enctype="multipart/form-data">';
						
						$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_select'");
						if (!is_null($row)):
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
			echo '</form>';
		echo '</div>';
	echo '</div>';
endif;
 ?>
