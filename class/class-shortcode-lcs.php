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
				echo $cards_options;
				echo $slide_options;
                $type = $key->LCS_Type;

				// Options for display Type Slider
				$max_count = (int)$slide_options["number"];
				$anim = $slide_options["animation"];

                // Options  for display Type Card
				$number_col = (int)$cards_options["number"];
                $col_size = sprintf("col-md-%s", 12 / $number_col);


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
