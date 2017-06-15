<?php
class Update_LCS
{

	function __construct(argument)
	{
		add_action('admin_menu', array($this, 'update_admin_menu'));
	}
	public function update_admin_menu()
	{
		add_submenu_page('lcs', 'Update LCS', 'Update LCS', 'manage_options', 'update_lcs', array($this, 'menu_html'));
	}
	public function menu_html()
	{
		include_once plugin_dir_path( __FILE__ ).'../views/admin/bo-update-lcs.php';
	}
}

 ?>
