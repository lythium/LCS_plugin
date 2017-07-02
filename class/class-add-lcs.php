<?php
class Add_LCS
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
        include_once plugin_dir_path(__FILE__).'../views/admin/bo-add-lcs.php';
    }

    public static function install()
    {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}lcs_category (LCS_id INT AUTO_INCREMENT PRIMARY KEY, LCS_Name varchar(255) NOT NULL,LCS_Type INT NOT NULL,LCS_cards_options varchar(255), LCS_slide_options varchar(255), Category_ID varchar(255) NOT NULL);");
    }

    public static function uninstall()
    {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}lcs_category;");
    }

    public function save_settings()
    {
        global $wpdb;
        if (isset($_POST['lcs_name_add']) && !empty($_POST['lcs_name_add'])
            && isset($_POST['lcs_type_add']) && !empty($_POST['lcs_type_add'])
            && isset($_POST['lcs_category_add']) && !empty($_POST['lcs_category_add'])
        ) {
            $lcs_name = $_POST['lcs_name_add'];
            $all_id = serialize($_POST['lcs_category_add']);
            $lcs_type = $_POST['lcs_type_add'];
			if ($lcs_type == 1) {
				$cards_options = NULL;
				$slide_options = serialize(array('number' => $_POST['lcs_number_slide_add'], 'animation' => $_POST['lcs_anim_slide_add']));
			} elseif ($lcs_type == 2) {
				$slide_options = NULL;
				$cards_options = serialize(array('number' => $_POST['lcs_number_cards_add'], ));
			}
            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_Name = '$lcs_name'");

            if (is_null($row)) {
                $wpdb->insert("{$wpdb->prefix}lcs_category", array('LCS_Name' => $lcs_name, 'LCS_Type' => $lcs_type, 'LCS_cards_options' => $cards_options,'LCS_slide_options' => $slide_options, 'Category_ID' => $all_id));
            }
        }
    }
}
