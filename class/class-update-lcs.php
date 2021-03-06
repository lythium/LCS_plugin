<?php
class Update_LCS
{
    public function __construct()
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
        include_once plugin_dir_path(__FILE__).'../views/admin/bo-update-lcs.php';
    }

    public function update_settings()
    {
        global $wpdb;

        if (isset($_POST['lcs_name_update']) && !empty($_POST['lcs_name_update'])
            && isset($_POST['lcs_type_update']) && !empty($_POST['lcs_type_update'])
            && isset($_POST['lcs_category_slide_update']) || isset($_POST['lcs_category_cards_update']) && !empty($_POST['lcs_category_slide_update']) || !empty($_POST['lcs_category_cards_update']))
		{
            $id_update = $_POST['select_id'];
            $lcs_name = $_POST['lcs_name_update'];
            $lcs_type = $_POST['lcs_type_update'];
			if ($lcs_type == 1) {
				$orderSlide = $_POST['lcs_order_slide_update'];
				$orderCards = "0";
			} elseif ($lcs_type == 2) {
				$orderSlide = "0";
				$orderCards = $_POST['lcs_order_cards_update'];
			};
			// Serialize Options
			$slide_options = serialize(array(
				'name' => $_POST['lcs_name_update'],
				'number' => $_POST['lcs_number_slide_update'],
				'animation' => $_POST['lcs_anim_slide_update'],
				'order' => $orderSlide
			));
			$cards_options = serialize(array(
				'name_display' => $_POST['lcs_display_name_card_update'],
				'order' => $orderCards
			));
			if ($lcs_type == 1) {
				$all_id = serialize($_POST['lcs_category_slide_update']);
			} elseif ($lcs_type == 2) {
				$all_id = serialize($_POST['lcs_category_cards_update']);
			};
            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}lcs_category WHERE LCS_id = '$id_update'");

            if (!is_null($row)) {
                $wpdb->update(
					"{$wpdb->prefix}lcs_category",
					array(
						'LCS_Name' => $lcs_name,
						'LCS_Type' => $lcs_type,
						'LCS_cards_options' => $cards_options,
						'LCS_slide_options' => $slide_options,
						'Category_ID' => $all_id
					),
					array('LCS_id' => $id_update),
					array( "%s", "%d", "%s", "%s","%s" ),
					array( "%d")
				);
			}
        }
    }
}
