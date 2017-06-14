<?php
class Add_Category_Slide
{
    public function __construct()
    {
		add_action('admin_menu', array($this, 'add_admin_menu'), 20);
		add_action('admin_init', array($this, 'save_settings'));
		// add_action('admin_init', array($this, 'register_settings'));
	}

	public function add_admin_menu()
	{
		add_submenu_page('lcs', 'Add category slide', 'Add category slide', 'manage_options', 'add_lcs', array($this, 'menu_html'));
	}

	public function menu_html()
	{
		include_once plugin_dir_path( __FILE__ ).'../views/admin/bo-add-category-slide.php';
	}

	public static function install()
	{
	    global $wpdb;

	    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}lcs_category (Slider_id INT AUTO_INCREMENT PRIMARY KEY, Slider_Name varchar(255) NOT NULL, Category_ID varchar(255) NOT NULL);");
	}

	public static function uninstall()
	{
	    global $wpdb;

	    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}lcs_category;");
	}

	// public function register_settings()
	// {
	//     register_setting('lcs_add_settings', 'lcs_name_add');
	// 	register_setting('lcs_add_settings', 'lcs_category_add[]');
	// }
	public function save_settings()
	{
		global $wpdb;
		if (isset($_POST['lcs_name_add']) && !empty($_POST['lcs_name_add'])):
			if (isset($_POST['lcs_category_add']) && !empty($_POST['lcs_category_add'])):
				$name_slide = $_POST['lcs_name_add'];
				$all_id = serialize($_POST['lcs_category_add']);
				$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE Slider_Name = '$name_slide'");
				if (is_null($row)):
					$wpdb->insert("{$wpdb->prefix}lcs_category", array('Slider_Name' => $name_slide, 'Category_ID' => $all_id));
				endif;
			endif;
		endif;
	}
}



 ?>
