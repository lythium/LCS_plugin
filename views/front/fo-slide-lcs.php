<?php
echo '<div class="row slide-container-lcs lcs_' . $id_shortcode . '">';
	echo '<div class="slide-in-container-lcs">';
	$categories_id = unserialize($key->Category_ID);
	foreach ( $categories_id as $cat_id ):
		$cat_name = get_cat_name( $cat_id );
		$posts_last = get_posts(array("cat" => $cat_id, "showposts" => 1));
		$id_last = $posts_last[0]->ID;

		echo '<div class="lcs-slide-part row">';
		if ( has_post_thumbnail( $id_last ) ):
			echo get_the_post_thumbnail( $id_last, 'thumbnail', array( 'class' => 'col-md-12' ) );
		else :
			echo '<img class="col-md-12" src="'.plugin_dir_url( __FILE__ ).'default.jpg">';
		endif;
		echo '</div>';

	endforeach;

		echo '<div class="slide-lcs-nav .lcs-white lcs-section">';
			echo '<div class="lcs-left" onclick="plusDivs(-1)">❮</div>';
			echo '<div class="lcs-right" onclick="plusDivs(1)">❯</div>';
			for ($i=1; $i < 4 ; $i++):
				echo '<span class="lcs-badge span-lcs lcs-white-hover" onclick="currentDiv('.$i.')"></span>';
				echo '';
			endfor;
		echo '</div>';

	echo '</div>';
echo '</div>';

?>

<script>
	$=jQuery.noConflict();
	$(document).ready(function() {
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function currentDiv(n) {
		  showDivs(slideIndex = n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("lcs-slide-part");
		  var dots = document.getElementsByClassName("span-lcs");
		  if (n > x.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		     x[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
		     dots[i].className = dots[i].className.replace("lcs-white", "");
		  }
		  x[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += "lcs-white";
	  };
  });
</script>

<style media="screen">
	.slide-container-lcs {

	}
	.slide-in-container-lcs {
		max-width: 800px;
		margin: 10 auto;
		position: relative;
	}
	.lcs-slide-part {
		width: 100%;
		display: block;
		margin: 0px;
	}
	.slide-lcs-nav {
		width: 100%;
		text-align: center;
		font-size: 18px !important;
		position: absolute;
		left: 50%;
		bottom: 0;
		transform: translate(-50%,0%);
		-ms-transform: translate(-50%,0%);
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
		color: #ffffff;
	}
	.lcs-white-hover {
		color: #ffffff;
	}
	.lcs-badge {
		display: inline-block;
		border-radius: 50%;
		border: 1px solid #ccc !important;
		background-color: transparent !important;
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
 </style>
