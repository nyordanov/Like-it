<?php
/*
Plugin Name: Like-it
Plugin URI: http://nyordanov.com
Description: Like-it allows post readers mark their approval of a post by clicking the Like-it button, instead of posting yet another "I like this post" comment
Version: 1.0
Author: Nikolay Yordanov
Author URI: http://nyordanov.com
License: GPLv2

This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by 
the Free Software Foundation; version 2 of the License.

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License 
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
*/

if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

$likes_table = $wpdb->prefix . 'likeit_likes';
$likeit_dbVersion = '1.0';

register_activation_hook( __FILE__, 'likeit_activate' );
function likeit_activate() {
	global $wpdb;
	global $likeit_dbVersion;
	
	$table_name = $wpdb->prefix . "likeit";
	if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
		$sql = "CREATE TABLE  $table_name  (
			id INT(20) NOT NULL AUTO_INCREMENT,
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			post_id INT(20) NOT NULL,
			ip VARCHAR(15) NOT NULL,
			UNIQUE KEY id (id)
		);";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		add_option("likeit_dbVersion", $likeit_dbVersion);
	}
	
	add_option('likeit-text', 'Like!', '', 'yes');
}

add_action('admin_menu', 'likeit_config_page');
function likeit_config_page() {
	if ( function_exists('add_options_page') )
		add_options_page(__('Like-it Configuration'), __('Like-it Configuration'), 'manage_options', 'likeit-config', 'likeit_conf');
}

function likeit_conf() {
	require('tpl/config.php');
}

add_action('admin_head', likeit_add_header_links);
function likeit_add_header_links() {
	echo '<link rel="stylesheet" type="text/css" href="'.WP_PLUGIN_URL.'/css/likeit.css" media="screen" />'."\n";
}

add_action('admin_init', 'likeit_register_settings');
function likeit_register_settings() {
	register_setting( 'likeit_options', 'likeit-text' );
}
