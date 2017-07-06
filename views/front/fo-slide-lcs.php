
<div class="clearfix"></div>
<div class="row slide-container-lcs lcs_<?= $id_shortcode ?>">
	<input type="hidden" id="variable-anim" value="<?= $anim ?>">
	<div class="slide-in-container-lcs">
		<ul class="lcs-list">
			<?php
			$categories_id = unserialize($key->Category_ID);
			$count = 0;
			foreach ( $categories_id as $cat_id ):
				$cat_name = get_cat_name( $cat_id );
				$posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
				$id_last = $posts_last[0]->ID;
				if ($cat_id === reset($categories_id)):
					$first = "lcs-slide-first";
				endif;
				if ($count === 0): ?>
				<li class="SlidePart animated <?= esc_attr($anim) ?> <?= esc_attr($first) ?>">
					<div class="SlidePart-container">
					<?php endif; ?>
					<div class="slide-card-container">
						<!-- Insert Name Category -->
						<span class="tooltips">
							<a class="" href="<?= get_category_link($cat_id) ?>">
								<?= substrwords(get_cat_name($cat_id), 15) ?>
							</a>
						</span>
						<a class="slide-card-lcs-link" href="<?= get_category_link($cat_id) ?>">
							<?php if ( has_post_thumbnail( $id_last ) ): ?>
								<?= get_the_post_thumbnail( $id_last, 'thumbnail', array( 'class' => 'col-md-12' ) ); ?>
							<?php else:  ?>
								<img class="col-md-12" src="<?= plugin_dir_url( __FILE__ )?>default.jpg">
							<?php endif; ?>
						</a>
					</div>
					<?php $count++;
					if ($count === $max_count || $cat_id === end($categories_id)): ?>
				</div>
			</li>
			<?php
			$count = 0;
			$first = "";
			endif;
		endforeach;  ?>
		</ul>
	</div>
</div>
