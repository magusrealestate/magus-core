<?php
namespace Magus\Admin;

class SettingsPage
{
    public static function init()
    {
        add_action('admin_menu', [self::class, 'addSettingsPage']);
    }

    public static function addSettingsPage()
    {
        add_submenu_page(
            'magus-core-dashboard',   // parent slug (must match main dashboard)
            'Magus Core Settings',    // page title
            'Settings',               // menu title
            'manage_options',         // capability
            'magus-core-settings',    // slug
            [self::class, 'render']   // callback
        );
    }

    public static function render()
    {
        echo '<div class="wrap"><h1>Magus Core Settings</h1>';
        echo '<p>Settings form will go here.</p>';
        echo '</div>';
    }
}
