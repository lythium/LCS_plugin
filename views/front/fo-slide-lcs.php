<?php
echo '<div class="row slide-container-lcs lcs_' . $id_shortcode . '">';
	echo '<div class="slide-in-container-lcs">';
		$width = "400%";
		echo '<ul style="width:'.$width.';">';
		$categories_id = unserialize($key->Category_ID);
		foreach ( $categories_id as $cat_id ):
			$cat_name = get_cat_name( $cat_id );
			$posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
			$id_last = $posts_last[0]->ID;

			echo '<li class="SlidePart row">';
				echo '<a class="card-lcs-link" href="' . get_category_link($cat_id) . '">';
					if ( has_post_thumbnail( $id_last ) ):
						echo get_the_post_thumbnail( $id_last, 'thumbnail', array( 'class' => 'col-md-12' ) );
					else :
						echo '<img class="col-md-12" src="'.plugin_dir_url( __FILE__ ).'default.jpg">';
					endif;
				echo'</a>';
			echo '</li>';

		endforeach;
		echo '</ul>';

		echo '<div class="slide-lcs-nav .lcs-white lcs-section">';
			echo '<div class="lcs-left" onclick="plusDivs(-1)">❮</div>';
			echo '<div class="lcs-right" onclick="plusDivs(1)">❯</div>';
			for ($i=1; $i < 4 ; $i++):
				echo '<span class="lcs-badge span-lcs lcs-hover-white" onclick="currentDiv('.$i.')"></span>';
				echo ' ';
			endfor;
		echo '</div>';

	echo '</div>';
echo '</div>';

?>

<script>
	$=jQuery.noConflict();
	$(document).ready(function() {
		$(function(){
			setInterval(function(){
				$(".slide-in-container-lcs ul li:first-child").animate({"margin-left": -350}, 800, function(){
				 $(this).css("margin-left",0).appendTo(".slide-in-container-lcs ul");
				});
			}, 3500);
		});
	});
</script>

<style media="screen">
	.slide-container-lcs {

	}
	.slide-in-container-lcs {
		max-width: 600px;
		margin: 10px auto!important;
		overflow: hidden;
		border: 3px solid #F2F2F2;
	}
	.slide-in-container-lcs ul {
		padding:0; margin:0;
		list-style: none;
	}
	.SlidePart {
		float: left;
		margin: 0px;
	}
	.slide-lcs-nav {
		width: 100%;
		text-align: center;
		font-size: 18px!important;
		position: absolute;
		left: 50%;
		bottom: 0;
		transform: translate(-50%,0%);
		-ms-transform: translate(-50%,0%);
		padding: 0.01em 16px;
	}
	.lcs-left {
		float: left!important;
		cursor: pointer;
	}
	.lcs-right {
		float: right!important;
		cursor: pointer;
	}
	.lcs-white {
		color: #000!important;
		background-color: #ffffff!important;
	}
	.lcs-hover-white {
		color: #ffffff;
	}
	.lcs-badge {
		display: inline-block;
		border-radius: 50%;
		border: 1px solid #cccccc!important;
		background-color: transparent;
		height: 13px;
		width: 13px;
		padding: 0;
		color: #fff;
		text-align: center;
	}
	.lcs-section {
		margin-top: 16px !important;
		margin-bottom: 16px !important;
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
		max-width: 100%;
		max-height: 300px;
	}
 </style>
