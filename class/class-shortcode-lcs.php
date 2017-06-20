<?php
class Shortcode_LCS
{

	function __construct()
	{
		add_shortcode('category_show', array($this, 'show_html'));
	}

	public function show_html($atts)
	{
		global $wpdb;
		$default = $wpdb->get_results("SELECT LCS_id FROM {$wpdb->prefix}lcs_category ORDER BY LCS_id LIMIT 1");
		var_dump($default);
		$atts = shortcode_atts(array('num' => $default), $atts);
		$id_shortcode = $atts["num"];
		$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_shortcode'");
		if ($results):
			foreach ($results as $key ):
				$type = $key->LCS_Type;
				$number = $key->LCS_number;

				// for display Type Card
				if ($number === "2"):
					$col_size = "col-md-6";
				elseif ($number === "3"):
					$col_size = "col-md-4";
				elseif ($number === "4"):
					$col_size = "col-md-3";
				endif;
				// for display Type Slider
				if ($number === "2"):
					$max_count = 2;
				elseif ($number === "3"):
					$max_count = 3;
				elseif ($number === "4"):
					$max_count = 4;
				endif;

				if ($type === "1"): // 1 = Type Slide
					include_once plugin_dir_path( __FILE__ ).'../views/front/fo-slide-lcs.php';
				elseif ($type === "2"): // 2 = Type Card
					include_once plugin_dir_path( __FILE__ ).'../views/front/fo-card-lcs.php';
				endif;
			endforeach;
		endif;
	}
	
	public function substrwords($text, $maxchar, $end='...')
	{
		// Cut string function
	    if (strlen($text) > $maxchar || $text == '') {
	        $words = preg_split('/\s/', $text);
	        $output = '';
	        $i      = 0;
	        while (1) {
	            $length = strlen($output)+strlen($words[$i]);
	            if ($length > $maxchar) {
	                break;
	            }
	            else {
	                $output .= " " . $words[$i];
	                ++$i;
	            }
	        }
	        $output .= $end;
	    }
	    else {
	        $output = $text;
	    }
	    return $output;
	}
}

 ?>
