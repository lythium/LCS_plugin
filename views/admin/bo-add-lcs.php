<div id="acf-field-group-wrap" class="wrap lcs-display">
    <h1><?php get_admin_page_title() ?></h1>

    <form action="<?= admin_url('admin.php?page=lcs') ?>" method="post" class="display-section">
		<div id="left">
	        <div id="section-1" class="section">
	            <div class="section-container">
	                <label for="lcs_name_add"> <strong> Nom du Slider </strong> </label>
	                <input type="text" id="lcs_name_add" name="lcs_name_add" value=""><br>
	            </div>
	        </div>

	        <div id="section-2" class="section">
	            <div class="section-container">
	                <label for="groupe-type"> <strong> Choix du Type </strong> </label><br>
	                <div id="groupe-type-add" class="menu-settings-input radio-input">
						<label for="lcs_type_add" > Slide </label>
	                    <input type="radio" id="lcs_type_add" name="lcs_type_add" value="1" checked><br>
						<label for="lcs_type_add"> Card </label>
	                    <input type="radio" id="lcs_type_add" name="lcs_type_add" value="2"><br>
	                </div>

	                <br>
	            </div>
	        </div>

	        <div id="section-3" class="section">
				<div class="section-container">
				<label for="" id="label-option"> <strong> Options </strong></label><br>
					<!-- Options for Slide -->
					<div id="slide-op" class="option-slide" style="display:block;">
						<label for="lcs_number_slide_add"> <strong> Nombre d'affichage sur un slide </strong> </label><br>
						<select id="lcs_number_slide_add" name="lcs_number_slide_add">
							<option value="2" selected>2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select><br>
						<label for="lcs_anim_slide_add"> <strong> Animation de la transition </strong> </label><br>
						<select id="lcs_anim_slide_add" name="lcs_anim_slide_add">
							<option value="fadeIn" selected>fadeIn</option>
							<option value="slideInLeft">slideInLeft</option>
							<option value="slideInDown">slideInDown</option>
						</select><br>
					</div>
					<!-- Options for Card -->
					<div id="cards-op" class="option-cards">
						<label for="groupe-display-name-card"> <strong> Display Name </strong> </label><br>
						<div id="groupe-display-name-card" class="menu-settings-input radio-input">
							<label for="lcs_display_name_card_add"> Yes </label>
							<input type="radio" id="lcs_display_name_card_add" name="lcs_display_name_card_add" value="yes"  checked><br>
							<label for="lcs_display_name_card_add"> None </label>
							<input type="radio" id="lcs_display_name_card_add" name="lcs_display_name_card_add" value="none"><br>
						</div>

						<label for="lcs_number_cards_add"> <strong> Nombre d'affichage sur une ligne </strong> </label><br>
						<select id="lcs_number_cards_add" name="lcs_number_cards_add">
							<option value="2" selected>2</option>
							<option value="3">3</option>
							<option value="4">4</option>
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
					$categories = get_categories( array(
						'orderby' => 'id',
						'order'   => 'ASC'
					) );
					?>
					<!-- Option Category slide -->
					<div id="cat_option_slide" class="input-checkbox" style="display:block;">
						<ul  class="list-group">
						<?php
						foreach ($categories as $category):
						?>
							<li class="list-group-item">
								<label class="menu-item-category">
								<input type="checkbox" id="lcs_category_slide_add" name="lcs_category_slide_add[]" value="<?= $category->cat_ID ?>">
								<?php echo 'Catégorie :'. $category->name; ?>
								</label>
							</li>
						<?php endforeach; ?>

						</ul>
					</div>
					<!-- Option Category card -->
					<div id="cat_option_cards" class="input-checkbox" style="display:none;">
						<ul id="list-chk" class="list-group">
						<?php
						$i = 0;
						foreach ($categories as $category):
						?>
							<li class="list-group-item">
								<label class="menu-item-category">
								<input type="checkbox" id="lcs_category_card_add <?= "check".$i ?>" name="lcs_category_cards_add[]" value="<?= $category->cat_ID ?>">
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
</div>
<?php var_dump($_POST); ?>
