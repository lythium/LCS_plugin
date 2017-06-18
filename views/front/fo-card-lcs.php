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
 <style media="screen">
	.card-container-lcs {
		background-color: #999999;
		border-radius: 5px;
		margin-top: 10px;
		margin-bottom: 20px;
		margin-left: auto;
		margin-right: auto;
	}
	.card-in-container-lcs {
		text-align: center;
	}
	.card_lcs {
		background-color: rgba(0, 0, 0, 0);
		margin: 0px auto;
		display: inline-block;
		float: none;
	}
	.inter-card-lcs {
		margin: 10px;
		border-radius: 10px;
		box-shadow: 0px 0px 10px rgba(0,0,0,0.9);
	}
	.in-card_lcs {
		padding: 10px 20px 20px 20px;
		background-color: #ebebeb;
		border-radius: 10px;
		box-shadow: inset 0px 0px 10px rgba(0,0,0,0.9);
	}
	.category_name_lcs h3 {
		margin-top: 0px;
		font-weight: 900;
		background-color: #555555;
		color: transparent;
		text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
		-webkit-background-clip: text;
		 -moz-background-clip: text;
		      background-clip: text;
	}
	.img-card-lcs {
		padding: 0 6px;
	}
	.card-lcs-last-post {

	}
	.card-lcs-link {
		display: block;
		width: 100%;
		height: 56.25%;
		border-radius: 10px;
		overflow: hidden;
		border: 3px outset #949494;
		box-shadow: 0px 0px 5px #555555, 0px 0px 10px #555555;
	}
	.card-lcs-link img {
		padding: 0px;
		width: 100%;
		height: auto;
		max-width: 600px;
		max-height: 300px;
	}
 </style>
