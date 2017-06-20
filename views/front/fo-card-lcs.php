<?php
echo '<div class="row card-container-lcs lcs_' . $id_shortcode . '">';
	echo '<div class="card-in-container-lcs">';
	$categories_id = unserialize($key->Category_ID);
	foreach ( $categories_id as $cat_id ):
		$cat_name = get_cat_name( $cat_id );
		echo '<div class="'.esc_attr($col_size).' card_lcs">';
			echo '<div class="inter-card-lcs">';
				echo '<div class="in-card_lcs">';
					echo '<div class="category_name_lcs inline text-center">';
						echo '<a class="" href="' . get_category_link($cat_id) . '">';
							echo '<h3>' . substrwords($cat_name, 15) . '</h3>';
						echo'</a>';
					echo '</div>';
					echo '<div class="col-md-12 img-card-lcs">';
						$posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
						$id_last = $posts_last[0]->ID;
						echo '<div class="card-lcs-last-post">';
							echo '<a class="card-lcs-link" href="' . get_category_link($cat_id) . '">';
								if ( has_post_thumbnail( $id_last ) ):
									echo get_the_post_thumbnail( $id_last, 'thumbnail', array( 'class' => 'col-md-12' ) );
								else :
									echo '<img class="col-md-12" src="'.plugin_dir_url( __FILE__ ).'default.jpg">';
								endif;
							echo'</a>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	endforeach;
	echo '</div>';
echo '</div>';


 ?>
