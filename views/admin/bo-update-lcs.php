<?php
global $wpdb;
// var_dump($_POST);
// echo $this->update_settings();
if (empty($_GET["select"])):
	header('Location: /wp-admin/admin.php?page=lcs');
else :
	$id_select = $_GET["select"]; ?>
	<?php var_dump($_POST); ?>

	<div class="wrap lcs-display">
		<h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
		<a class="page-title-action hide-if-no-customize" href="<?= admin_url('admin.php?page=add_lcs') ?>" class="page-title-action">Ajouter</a>
		<hr class="wp-header-end"><?= $alerts ?></hr>

	<?php
	$results = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_select'");
	// var_dump($results);
	if (!is_null($results)):
		$id = $results->LCS_id;
		$url_update =  "admin.php?page=update_lcs&select=".$id;
		$type_select = $results->LCS_Type;
		$numb_select = $results->LCS_number;
		$name = sprintf("%s", $results->LCS_Name);
		$categories_id = unserialize($results->Category_ID);
 	?>

			<form action="<?= admin_url($url_update) ?>" id="update-meta" method="post" class="display-section" enctype="multipart/form-data">
				<div id="left">
					<div id="section-1" class="section">
						<div class="section-container">
							<input type="hidden" name="select_id" value="<?= $id ?>">
							<label for="lcs_name_update"> <strong> Nom du Slider </strong> </label> <input type="text" id="lcs_name_update" name="lcs_name_update" value="<?= $name ?>"><br>
						</div>
					</div>

					<div id="section-2" class="section">
						<div class="section-container">
							<label for="groupe-type"> <strong> Choix du Type </strong> </label><br>
							<div id="groupe-type" class="menu-settings-input radio-input">
								<input type="radio" id="lcs_type_update" name="lcs_type_update" value="1" <?= checked($type_select, 1, false) ?> ><label for="lcs_type_update"> Slide </label><br>
								<input type="radio" id="lcs_type_update" name="lcs_type_update" value="2" <?= checked($type_select, 2, false) ?> ><label for="lcs_type_update"> Card </label><br>
							</div>
							<br>
							<br>
						</div>
					</div>

					<div id="section-3" class="section">
						<div class="section-container">
							<label for="lcs_number_update"> <strong> Nombre d'affichage sur une ligne </strong> </label><br>
							<select id="lcs_number_update" name="lcs_number_update">
								<option value="2" <?= selected( $numb_select, 2 ) ?> >2</option>
								<option value="3"<?= selected( $numb_select, 3 ) ?> >3</option>
								<option value="4"<?= selected( $numb_select, 4 ) ?> >4</option>
							</select>
						</div>
					</div>
					<div class="section section-btn">
						<?php submit_button(); ?>
					</div>
				</div>
				<div id="right">
					<div id="section-4" class="section">
						<div class="section-container">
							<input type="checkbox" id="toggle">
							<label for="toggle" id="label-toggle"> <strong> Choix des Categories </strong></label><br>

							<?php
							$categories = get_categories( array(
								'orderby' => 'id',
								'order'   => 'ASC'
							) );
							$xyz = 0;
							?>
							<div id="droplist" class="input-checkbox">
								<ul class="list-group">
								<?php
								foreach ($categories as $category):
									if (in_array($category->cat_ID, $categories_id)):
										$checked = "checked";
									else :
										$checked = "";
									endif;
								?>
									<li class="list-group-item">
										<label class="menu-item-category">
										<input type="checkbox" id="lcs_category_update" name="lcs_category_update[]" value="<?= $category->cat_ID ?>" <?= $checked ?> >
										<?php echo $category->name; ?>
										</label>
									</li>
								<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php endif; ?>
	</div>
<?php endif; ?>
