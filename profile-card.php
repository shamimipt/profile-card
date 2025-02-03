<?php
/**
 * Plugin Name: Profile Card
 * Plugin URI: #
 * Description: Profile Card is a simple Elementor widget to display your profile card.
 * Version: 1.0.0
 * Author: #
 * Author URI: #
 * License: GPL2
 * Text Domain: profile-card
 * Domain Path: /languages/
 * Requires at least: 6.7
 * Requires PHP: 7.4
 *
 * @package Profile Card
 * @version 1.0.0
 */

/**
 * Copyright (c) 2024
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// Don't call the file directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	die();
}

if ( ! defined( 'PC_CORE_PATH' ) ) {

	define( 'PC_CORE_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'PC_CORE_FILE' ) ) {
	/**
	 * Plugin File Ref.
	 */
	define( 'PC_CORE_FILE', __FILE__ );
}

if ( ! defined( 'PC_CORE_URL' ) ) {
	define( 'PC_CORE_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'PC_CORE_ASSETS' ) ) {
	define('PC_CORE_ASSETS', plugin_dir_url(PC_CORE_FILE) . 'assets/');
}

if ( ! class_exists( 'Profile_Card', false ) ) {
	require_once PC_CORE_PATH . 'class-profile-card.php';
}

/**
 * Initialize the plugin
 *
 * @return Profile_Card
 */
function Profile_Card() {
	return Profile_Card::get_instance();
}

// Kick it off.
Profile_Card();