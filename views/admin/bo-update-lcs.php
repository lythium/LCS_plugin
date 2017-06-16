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

		echo '<div id="nav-menus-frame" class="wp-clearfix">';
			echo '<div id="menu-settings-column" class="metabox-holder">';
				echo '<div class="clear"></div>';
				echo '<form id="nav-menu-meta" class="nav-menu-meta" method="post" enctype="multipart/form-data">';
					echo '<div id="side-sortables" class="accordion-container">';
						echo '<ul class="outer-border">';
							echo '<li class="control-section accordion-section select-category" id="select-category">';
								echo '<h3 class="accordion-section-title hndle" tabindex="0"> Category </h3>';
								echo '<div class="accordion-section-content posttypediv" style="display:block;">';
									echo '<div class="inside">';
										echo '<div class="tabs-panel tabs-panel-active">';
											echo '<ul class="categorychecklist form-no-clear"';

											$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_select'");
											if (!is_null($row)):
												$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_select'");

												if ($results):
													foreach ($results as $key ):
														$id = $key->Slider_id;
														$name = $key->Slider_Name;
														$categories_id = unserialize($key->Category_ID);

														foreach ($categories_id as $cat_id ):
															$cat_name = get_cat_name( $cat_id );
															echo '<li>';
																echo '<label class="menu-item-title">';
																	echo '<input type="checkbox" class="category-item-id" name"category-id" value="'.$cat_id.'">';
																	echo 	$cat_name;
																echo '</label>';
															echo '</li>';
														endforeach;
													endforeach;
												endif;
											endif;
											echo '</ul>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</li>';
						echo '</ul>';
					echo '</div>';
				echo '</form>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
endif;
 ?>
