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
    $this->version = $version;
		add_action('admin_menu', array($this, 'add_admin_menu'));
		include_once plugin_dir_path( __FILE__ ).'class/class-add-lcs.php';
		new Add_LCS();
		include_once plugin_dir_path( __FILE__ ).'class/class-shortcode-lcs.php';
	  new Shortcode_LCS();
		include_once plugin_dir_path( __FILE__ ).'class/class-update-lcs.php';
		new Update_LCS();
    add_action( 'wp_enqueue_scripts', $this->enqueue_lcs_styles() );
    add_action( 'wp_enqueue_scripts', $this->enqueue_lcs_scripts() );
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
		include_once plugin_dir_path( __FILE__ ).'views/admin/bo-display-all-lcs.php';
	}

  public function enqueue_lcs_styles()
  {
    wp_enqueue_script(
            'lcs_style',
            plugin_dir_url( __FILE__ ) . 'css/lcs_style.css',
            array(),
            $this->version,
            FALSE
        );
  }

  public function enqueue_lcs_scripts()
  {
    wp_enqueue_script(
            'lcs_style',
            plugins_url( '/js/demo.js', __FILE__ ),
            array('jquery'),
            $this->version,
            FALSE
          );
  }


}

new Lyth_CS_Plugin();
