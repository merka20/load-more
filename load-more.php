<?php
/*
 Plugin Name: Load More
 Plugin URI: https://merka20.com
 Description: Cargar articulos mediante botón cargar más.
 Version: 1.1.0
 Requires at least: 6.2
 Requires PHP: 7.4
 Author: Merka20
 Author URI: https://merka20.com
 License: GPL v2 or later
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Update URI:  https://example.com/my-plugin/
 Text Domain: MK20_loadmore
 Domain Path: /languages
 */

 if (!defined('ABSPATH')) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
} 

// Custom variables

define('MI_PLUGIN_VERSION', '1.0');
define('MI_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MI_PLUGIN_PATH', plugin_dir_path(__FILE__));


// Function that is executed when the plugin is activated
function MK20_loadmore_plugin_activar() {
    // Realizar tareas de activación aquí
}

// Function that is executed when the plugin is deactivated
function MK20_loadmore_plugin_desactivar() {
    // Realizar tareas de desactivación aquí
}

// Incluye el archivo ajax-functions.php
include(plugin_dir_path(__FILE__) . 'includes/ajax-functions.php');

// Add hooks for on and off functions
register_activation_hook(__FILE__, 'MK20_loadmore_plugin_activar');
register_deactivation_hook(__FILE__, 'MK20_loadmore_plugin_desactivar');

// Enqueue scripts
function MK20_loadmore_cargar_scripts() {

    $plugin_url = plugin_dir_url( __FILE__ );

    // Registra el archivo CSS del plugin
    wp_register_style( 'plugin-styles', $plugin_url . 'assets/css/estilos.css' );

    // Enqueue (cargar) el archivo CSS
    wp_enqueue_style( 'plugin-styles' );

    wp_enqueue_script('load-more', plugins_url('assets/js/scroll_more.js', __FILE__), array('jquery'), '1.0', true);
    wp_localize_script('load-more', 'loadmoreajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'MK20_loadmore_cargar_scripts');
