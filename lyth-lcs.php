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

        include_once plugin_dir_path(__FILE__).'class/class-add-lcs.php';
        new Add_LCS();

        include_once plugin_dir_path(__FILE__).'class/class-shortcode-lcs.php';
        new Shortcode_LCS();

        include_once plugin_dir_path(__FILE__).'class/class-update-lcs.php';
        new Update_LCS();

        add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_lcs_styles' ));
        add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_lcs_scripts' ));

		add_action('admin_enqueue_scripts', array( __CLASS__, 'enqueue_lcs_styles_admin' ));

        register_activation_hook(__FILE__, array('Add_LCS', 'install'));
        register_uninstall_hook(__FILE__, array('Add_LCS', 'uninstall'));
    }

    public function add_admin_menu()
    {
        add_menu_page('Category slide Plugin', 'LCS plugin', 'manage_options', 'lcs', array($this, 'menu_html'));
        add_submenu_page('lcs', 'Apercu des Slide', 'Apercu des Slide', 'manage_options', 'lcs', array($this, 'menu_html'));
    }

    public function menu_html()
    {
        include_once plugin_dir_path(__FILE__).'views/admin/bo-display-all-lcs.php';
    }

    public static function enqueue_lcs_styles()
    {
        $css_file = plugins_url('css/lcs_style.css', __FILE__);
        wp_enqueue_style('lcs_style', $css_file, false, "0.1");
    }

    public static function enqueue_lcs_scripts()
    {
        $js_file = plugins_url('javascript/lcs_script.js', __FILE__);
        wp_enqueue_script('lcs_style', $js_file, array('jquery'), false, "0.1");
    }

	public static function enqueue_lcs_styles_admin()
	{
		$css_admin_file = plugins_url('css/lcs_style_admin.css', __FILE__);
		wp_enqueue_style('lcs_style_admin', $css_admin_file, false, "0.1");
	}

}

new Lyth_CS_Plugin();
