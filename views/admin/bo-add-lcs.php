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
	                <div id="groupe-type" class="menu-settings-input radio-input">
	                    <input type="radio" id="lcs_type_add" name="lcs_type_add" value="1"><label for="lcs_type_add"> Slide </label><br>
	                    <input type="radio" id="lcs_type_add" name="lcs_type_add" value="2"><label for="lcs_type_add"> Card </label><br>
	                </div>
	                <br>
	                <br>
	            </div>
	        </div>

	        <div id="section-3" class="section">
				<div class="section-container">
				<label for="" id="label-option"> <strong> Options </strong></label><br>
					<!-- Options for Card -->
					<div id="cards-op" class="option-cards">

						<label for="lcs_number_add"> <strong> Nombre d'affichage sur une ligne </strong> </label><br>
						<select id="lcs_number_add" name="lcs_number_add">
							<option value="2" selected>2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>

					<!-- Options for Slide -->
					<div id="slide-op" class="option-cards">
						<label for="lcs_number_add"> <strong> Nombre d'affichage sur un slide </strong> </label><br>
						<select id="lcs_number_add" name="lcs_number_add">
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
						?>
							<li class="list-group-item">
								<label class="menu-item-category">
								<input type="checkbox" id="lcs_category_add" name="lcs_category_add[]" value="<?= $category->cat_ID ?>">
								<?php echo 'Catégorie :'. $category->name; ?>
								</label>
							</li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
        </div>

    </form>
</div>
<?php var_dump($_POST); ?>
