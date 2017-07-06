<?php
class Shortcode_LCS
{
	public function __construct()
	{
		add_shortcode('category_show', array($this, 'show_html'));
	}

	public function show_html($atts)
	{
		global $wpdb;

		$default = $wpdb->get_results("SELECT LCS_id FROM {$wpdb->prefix}lcs_category ORDER BY LCS_id LIMIT 1");

		$atts = shortcode_atts(array('num' => $default), $atts);
		$id_shortcode = $atts["num"];
		$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_shortcode'");

		if ($results) {
			foreach ($results as $key) {
				$cards_options = unserialize($key->LCS_cards_options);
				$slide_options = unserialize($key->LCS_slide_options);
				var_dump($cards_options);
				var_dump($slide_options);
<<<<<<< HEAD
				$type = $key->LCS_Type;
				$categories_id = unserialize($key->Category_ID);
=======
        $type = $key->LCS_Type;
        $categories_id = unserialize($key->Category_ID);
>>>>>>> 47d1f295afce56f079c7f915e68856cd07dad419

				// Options for display Type Slider
				$display_name_slide = (string)$slide_options["name"];
				$max_count = (int)$slide_options["number"];
				$anim = (string)$slide_options["animation"];
				$order_slide = $slide_options["order"];

<<<<<<< HEAD
				// Options  for display Type Card
				$number_col = (int)count($categories_id);
				$col_size = 100 / $number_col . "%";
				$display_name_cards = $cards_options["name_display"];
				$order_cards = $cards_options["order"];
=======
        // Options  for display Type Card
				$number_col = (int)count($categories_id);
                $col_size = 100 / $number_col . "%";
				$display_name = $cards_options["name_display"];
>>>>>>> 47d1f295afce56f079c7f915e68856cd07dad419


				if ($type === "1") { // 1 = Type Slide
					ob_start();
					include_once plugin_dir_path(__FILE__).'../views/front/fo-slide-lcs.php';
					return ob_get_clean();
				} elseif ($type === "2") { // 2 = Type Card
					ob_start();
					include_once plugin_dir_path(__FILE__).'../views/front/fo-card-lcs.php';
					return ob_get_clean();
				}
			}
		}
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
				} else {
					$output .= " " . $words[$i];
					++$i;
				}
			}
			$output .= $end;
		} else {
			$output = $text;
		}
		return $output;
	}
}
