<?php
/*
Plugin Name: Water Clarity Monitor
Description: This custom plugin is for monitoring water clarity in Zlín and surrounding areas.
Version: 1.0
Author: koudela_martin
*/

if (!defined('ABSPATH')) {
    exit;
}

define('WM_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WM_PLUGIN_URL', plugins_url('', __FILE__));

require_once WM_PLUGIN_DIR . 'includes/class-watermonitor-loader.php';
require_once WM_PLUGIN_DIR . 'Admin/class-watermonitor-admin.php';

function run_plugin_loader()
{
    $loader = new WaterMonitor_loader();
    $loader->run();

}
add_action('plugins_loaded', 'run_plugin_loader');

function admin_run_plugin()
{
    $admin = new WaterMonitor_admin();
    $admin->run();
}

add_action('plugins_loaded', 'admin_run_plugin');

