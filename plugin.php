<?php
/*
Plugin Name: Multisite Maintenance Mode
Plugin URI: https://github.com/DevSpace-Hosting/Multisite-Maintenance-Mode
Description: A simple maintenance mode plugin to inform your network users that you are performing maintenance.
Version: 2-9-2019
Author: DevSpace Hosting
Author URI: https://github.com/DevSpace-Hosting
*/

add_action('muplugins_loaded', 'show_maintenance_page', 999, 0);
	function show_maintenance_page() {
		if (is_user_logged_in() == flase && current_user_can('update_core') == false) {
			wp_redirect(plugins_url( 'multisite-maintenance-mode/html/maintenance.php', dirname(__FILE__) ));
			exit;
		}
}
?>
