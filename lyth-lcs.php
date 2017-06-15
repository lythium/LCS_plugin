<?php
/*
Plugin Name: Lyth Category Show
Plugin URI:
Description: Un plugin d'affichage de catégorie dans un slider
Version: 0.1
Author: Lythium
Author URI: https://www.lythium.fr
License:
*/

class Lyth_CS_Plugin
{
    public function __construct()
    {
		add_action('admin_menu', array($this, 'add_admin_menu'));
		include_once plugin_dir_path( __FILE__ ).'class/class-add-lcs.php';
		new Add_LCS();
		include_once plugin_dir_path( __FILE__ ).'class/class-shortcode-lcs.php';
        new Shortcode_LCS();
		include_once plugin_dir_path( __FILE__ ).'class/class-update-lcs.php';
		new Update_LCS();
		register_activation_hook(__FILE__, array('Add_Category_Slide', 'install'));
		register_uninstall_hook(__FILE__, array('Add_Category_Slide', 'uninstall'));
    }

	public function add_admin_menu()
	{
	    add_menu_page('Category slide Plugin', 'LCS plugin', 'manage_options', 'lcs', array($this, 'menu_html'));
		add_submenu_page('lcs', 'Apercu des Slide', 'Apercu des Slide', 'manage_options', 'lcs', array($this, 'menu_html'));

	}

	public function menu_html()
	{
		include_once plugin_dir_path( __FILE__ ).'views/admin/bo-display-all-lcs.php';
	}
}

new Lyth_CS_Plugin();
