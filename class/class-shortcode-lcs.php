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
		$default = $wpdb->get_results("SELECT Slider_id FROM {$wpdb->prefix}lcs_category ORDER BY Slider_id LIMIT 1");
		var_dump($default);
		$atts = shortcode_atts(array('num' => $default), $atts);
		$id_shortcode = $atts["num"];
		$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_id = '$id_shortcode'");
		include_once plugin_dir_path( __FILE__ ).'../views/front/fo-display-lcs.php';
	}
}

 ?>
