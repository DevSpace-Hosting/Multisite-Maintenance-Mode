<?php
/*
Plugin Name: Multisite Maintenance Mode
Plugin URI: https://marcwoodyard.com
Description: A simple maintenance mode plugin to inform your network users that you are performing maintenance.
Version: 0.0.1 (10-7-2016)
Author: Marc Woodyard
Author URI: https://marcwoodyard.com
*/

add_action('muplugins_loaded', 'show_maintenance_page', 999, 0);
	function show_maintenance_page() {
		//If the user is not logged in and not on a login page.
		if (!is_user_logged_in() && !current_user_can('update_core')) {
			wp_redirect( content_url('/maintenance.html/'));
			exit();
		}
}
?>
