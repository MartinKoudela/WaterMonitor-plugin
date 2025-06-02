<?php

if (!defined('ABSPATH')) exit;

class WaterMonitor_Admin
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    public function run()
    {
    }

    public function add_admin_menu()
    {
        add_menu_page(
            'Water Clarity Monitor - Administrace',
            'WCM - Admin',
            'manage_options',
            'watermonitor',
            array($this, 'html_admin_page'),
            'dashicons-admin-site-alt3',
        );
    }

    public function html_admin_page()
    {
        include WM_PLUGIN_DIR . 'Admin/Views/admin_page.php';
    }
}
