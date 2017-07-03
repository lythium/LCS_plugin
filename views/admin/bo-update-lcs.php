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
		<hr class="wp-header-end"></hr>

	<?php
	$results = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_select'");
	// var_dump($results);
	if (!is_null($results)):
		$id = $results->LCS_id;
		$url_update =  "admin.php?page=update_lcs&select=".$id;
		$type_select = $results->LCS_Type;
		if (!is_null($results->LCS_slide_options)):
		$slide_options_select = unserialize($results->LCS_slide_options);
			$numb_slide_select = $slide_options_select["number"];
			$anim_slide_select = $slide_options_select["animation"];
		endif;
		if (!is_null($results->LCS_cards_options)):
			$cards_options_select = unserialize($results->LCS_cards_options);
			$numb_cards_select = $cards_options_select["number"];
			$display_name_card_select = $cards_options_select["name_display"];
		endif;
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
							<div id="groupe-type-update" class="menu-settings-input radio-input">
								<input type="radio" id="lcs_type_update" name="lcs_type_update" value="1" <?= checked($type_select, 1, false) ?> >
								<label for="lcs_type_update"> Slide </label><br>
								<input type="radio" id="lcs_type_update" name="lcs_type_update" value="2" <?= checked($type_select, 2, false) ?> >
								<label for="lcs_type_update"> Card </label><br>
							</div>
							<br>
							<br>
						</div>
					</div>

					<div id="section-3" class="section">
						<div class="section-container">
						<label for="" id="label-option"> <strong> Options </strong></label><br>
							<!-- Options for Slide -->
							<div id="slide-op" class="option-slide" <?php if ($type_select == 1){ echo 'style="display:block;"'; }; ?> >
								<label for="lcs_number_slide_update"> <strong> Nombre d'affichage sur un slide </strong> </label><br>
								<select id="lcs_number_slide_update" name="lcs_number_slide_update">
									<option value="2" <?= selected( $numb_slide_select, 2 ) ?> >2</option>
									<option value="3" <?= selected( $numb_slide_select, 3 ) ?> >3</option>
									<option value="4" <?= selected( $numb_slide_select, 4 ) ?> >4</option>
								</select><br>
								<label for="lcs_anim_slide_update"> <strong> Animation de la transition </strong> </label><br>
								<select id="lcs_anim_slide_update" name="lcs_anim_slide_update">
									<option value="fadeIn" <?= selected( $anim_slide_select, "fadeId" ) ?> >fadeIn</option>
									<option value="slideInLeft" <?= selected( $anim_slide_select, "slideInLeft" ) ?> >slideInLeft</option>
									<option value="slideInDown" <?= selected( $anim_slide_select, "slideInDown" ) ?> >slideInDown</option>
								</select><br>
							</div>

							<!-- Options for Card -->
							<div id="cards-op" class="option-cards" <?php if ($type_select == 2){ echo 'style="display:block;"'; }; ?> >
								<label for="groupe-display-name-card"> <strong> Display Name </strong> </label><br>
								<div id="groupe-display-name-card" class="menu-settings-input radio-input">
									<input type="radio" id="lcs_display_name_card_update" name="lcs_display_name_card_update" value="yes" <?= checked( $display_name_card_select, "yes", false )?> >
									<label for="lcs_display_name_card_update"> Yes </label><br>
									<input type="radio" id="lcs_display_name_card_update" name="lcs_display_name_card_update" value="none" <?= checked( $display_name_card_select, "none", false )?> >
									<label for="lcs_display_name_card_update"> None </label><br>
								</div>

								<label for="lcs_number_cards_update"> <strong> Nombre d'affichage sur une ligne </strong> </label><br>
								<select id="lcs_number_cards_update" name="lcs_number_cards_update">
									<option value="2" <?= selected( $numb_cards_select, 2 ) ?> >2</option>
									<option value="3" <?= selected( $numb_cards_select, 3 ) ?> >3</option>
									<option value="4" <?= selected( $numb_cards_select, 4 ) ?> >4</option>
								</select>
							</div>
						</div>
			        </div>

					<div class="section section-btn">
						<?php submit_button(); ?>
					</div>
				</div>
				<div id="right">
					<div id="section-4" class="section">
						<div class="section-container">
							<label for="toggle" id="label-toggle"> <strong> Choix des Categories </strong></label><br>

							<?php
							if ($type_select == 1) {
								$displaySlide = 'display:block;';
								$displayCards = 'display:none;';
							} elseif ($type_select == 2) {
								$displaySlide = 'display:none;';
								$displayCards = 'display:block;';
							}
							$categories = get_categories( array(
								'orderby' => 'id',
								'order'   => 'ASC'
							) );
							$xyz = 0;
							?>
							<!-- Option Category slide -->
							<div id="cat_option_slide" class="input-checkbox" style="<?= $displaySlide ?>">
								<ul  class="list-group">
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
										<input type="checkbox" id="lcs_category_slide_update" name="lcs_category_slide_update[]" value="<?= $category->cat_ID ?>" <?= $checked ?> >
										<?php echo 'Catégorie :'. $category->name; ?>
										</label>
									</li>
								<?php endforeach; ?>

								</ul>
							</div>
							<!-- Option Category card -->
							<div id="cat_option_cards" class="input-checkbox" style="<?= $displayCards ?>">
								<ul id="list-chk" class="list-group">
								<?php
								$i = 0;
								foreach ($categories as $category):
									if (in_array($category->cat_ID, $categories_id)):
										$checked = "checked";
									else :
										$checked = "";
									endif;
								?>
									<li class="list-group-item">
										<label class="menu-item-category">
										<input type="checkbox" id="lcs_category_card_update <?= "check".$i ?>" name="lcs_category_cards_update[]" value="<?= $category->cat_ID ?>" <?= $checked ?> >
										<?php echo 'Catégorie :'. $category->name; ?>
										</label>
									</li>
								<?php $i++; ?>
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
