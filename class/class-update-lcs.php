<?php
class Update_LCS
{

	function __construct()
	{
		add_action('admin_menu', array($this, 'update_admin_menu'));
		add_action('admin_init', array($this, 'update_settings'));
	}
	public function update_admin_menu()
	{
		add_submenu_page('lcs', 'Update LCS', 'Update LCS', 'manage_options', 'update_lcs', array($this, 'menu_html'));
	}
	public function menu_html()
	{
		include_once plugin_dir_path( __FILE__ ).'../views/admin/bo-update-lcs.php';
	}
	public function update_settings()
	{
		global $wpdb;
		if (isset($_POST['lcs_name_add']) && !empty($_POST['lcs_name_add'])):
			if (isset($_POST['lcs_type_add']) && !empty($_POST['lcs_type_add'])):
				if (isset($_POST['lcs_category_add']) && !empty($_POST['lcs_category_add'])):
					$name_slide = $_POST['lcs_name_add'];
					$all_id = serialize($_POST['lcs_category_add']);
					$slider_type = $_POST['lcs_type_add'];
					$slider_numder = $_POST['lcs_number_add'];
					$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_Name = '$name_slide'");
					if (is_null($row)):
						$wpdb->insert("{$wpdb->prefix}lcs_category", array('LCS_Name' => $name_slide, 'LCS_Type' => $slider_type, 'LCS_number' => $slider_numder, 'Category_ID' => $all_id));
					endif;
				endif;
			endif;
		endif;
	}
}

 ?>
