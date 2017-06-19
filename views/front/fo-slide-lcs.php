<?php
echo '<div class="row slide-container-lcs lcs_' . $id_shortcode . '">';
	echo '<div class="slide-in-container-lcs">';
		echo '<ul>';
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
					echo '<div class="card-container">';
						echo '<a class="card-lcs-link" href="' . get_category_link($cat_id) . '">';
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

<script>
	$=jQuery.noConflict();
	$(document).ready(function() {
		setInterval(function() {
			var widthFirst = $('.slide-in-container-lcs ul .SlidePart:first-child '),
			resizeItems = $('.SlidePart');

			$resizeItems
				.width($widthFirst.width());
		}, 3500);

		var currentIndex = 0,
		 	items = $('.SlidePart'),
		  	itemAmt = items.length;

		function cycleItems() {
			var item = $('.SlidePart').eq(currentIndex);
				items.hide(0);
				item.fadeIn("slow");
			}

			var autoSlide = setInterval(function() {
				currentIndex += 1;
			if (currentIndex > itemAmt - 1) {
				currentIndex = 0;
			}
			cycleItems();
			}, 3000);

	});
</script>

<style media="screen">
	.slide-container-lcs {

	}
	.slide-in-container-lcs {
		max-width: 90%;
		height: 170px;
		margin: 10px auto!important;
		border: 3px solid #F2F2F2;
	}
	.slide-in-container-lcs ul {
		padding: 5px 15px;
		margin:0;
		list-style: none;
		text-align: center;
	}
	.SlidePart {
		display: none;
	}
	.lcs-slide-first {
		display: block;
	}
	.SlidePart-container {
		width: 100%;
		height: 100%;
		margin: 0px;
		display: inline-flex;
		text-align: center;
	}
	.card-container {
		margin: 0px auto;
		padding-left: 10px;
		padding-right: 10px;
	}
	.card-lcs-link {
		display: block;
		width: 100%;
		height: 100%;
		border-radius: 10px;
		overflow: hidden;
		border: 3px outset #949494;
		box-shadow: 0px 0px 5px #555555, 0px 0px 10px #555555;
	}
	.card-lcs-link img {
		padding: 0px;
		width: 100%;
		height: auto;
		max-width: 100%;
		max-height: 300px;
	}
 </style>
