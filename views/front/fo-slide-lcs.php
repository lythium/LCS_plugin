<?php
echo '<div class="row slide-container-lcs lcs_' . $id_shortcode . '">';
	echo '<div class="slide-in-container-lcs">';
		echo '<ul class="lcs-list">';
		$categories_id = unserialize($key->Category_ID);

		$count = 0;
		foreach ( $categories_id as $cat_id ):
			$cat_name = get_cat_name( $cat_id );
			$posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
			$id_last = $posts_last[0]->ID;
			if ($cat_id === reset($categories_id)):
				$first = "lcs-slide-first";
			endif;
			if ($count === 0):
			echo '<li class="SlidePart '.esc_attr($first).'">';
				echo '<div class="SlidePart-container">';
			endif;
					echo '<div class="slide-card-container">';
						echo '<a class="slide-card-lcs-link" href="' . get_category_link($cat_id) . '">';
							if ( has_post_thumbnail( $id_last ) ):
								echo get_the_post_thumbnail( $id_last, 'thumbnail', array( 'class' => 'col-md-12' ) );
							else :
								echo '<img class="col-md-12" src="'.plugin_dir_url( __FILE__ ).'default.jpg">';
							endif;
						echo'</a>';
					echo '</div>';
					$count++;
			if ($count === $max_count || $cat_id === end($categories_id)):
				echo '</div>';
			echo '</li>';
			$count = 0;
			$first = "";
			endif;
		endforeach;
		echo '</ul>';


	echo '</div>';
echo '</div>';

?>
