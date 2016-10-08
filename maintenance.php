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
	function show_maintenance_page()
	{
		//If the user is not logged in and not on a login page.
		if (!is_user_logged_in())
		{
			//Tell them the network is under maintence.
			wp_redirect( content_url('/maintenance.html/'));
			exit(); 
			//Then 
		}
		else
		{
			if((current_user_can( 'update_core'))
			{
				//Do nothing because this is a super admin working on the network.
			}
			else
			{
				//This isn't a super admin, so redirect them to the maintenance page.
				wp_redirect( content_url('/maintenance.html/'));

				/*
				We could store the maintenance page in the plugin files, but I prefer to 
				keep it with my other error page files.

				wp_redirect( plugins_url('/maintenance.html/'));
				*/
		
				// always call `exit()` after `wp_redirect`
	            exit(); 
			}
		}
	}
?>
