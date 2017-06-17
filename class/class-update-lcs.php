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
		if (isset($_POST['lcs_name_update']) && !empty($_POST['lcs_name_update'])):
			if (isset($_POST['lcs_type_update']) && !empty($_POST['lcs_type_update'])):
				if (isset($_POST['lcs_category_update']) && !empty($_POST['lcs_category_update'])):
					$id_update = $_POST['select_id'];
					$name_slide = $_POST['lcs_name_update'];
					$all_id = serialize($_POST['lcs_category_update']);
					$slider_type = $_POST['lcs_type_update'];
					$slider_numder = $_POST['lcs_number_update'];
					$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_update'");
					if (!is_null($row)):
						$wpdb->update("{$wpdb->prefix}lcs_category", array('LCS_Name' => $name_slide, 'LCS_Type' => $slider_type, 'LCS_number' => $slider_numder, 'Category_ID' => $all_id), array('LCS_id' => $id_update), array( "%s", "%d", "%d", "%s", ), array( "%d"));
						return true;
					endif;
				endif;
			endif;
		endif;
	}
}

 ?>
