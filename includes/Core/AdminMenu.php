<?php
namespace Magus\Core;

class AdminMenu
{
    public static function init()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
    }

    public static function addMenu()
    {
        add_menu_page(
            'Magus Core',
            'Magus Core',
            'manage_options',
            'magus-core-dashboard',
            [self::class, 'dashboardPage'],
            'dashicons-admin-generic',
            2
        );
    }

    public static function dashboardPage()
    {
        echo '<div class="wrap"><h1>Magus Core Dashboard</h1>';
        // Example: Render a sample widget if exists
        if (class_exists('\Magus\Core\WidgetRegistry')) {
            \Magus\Core\WidgetRegistry::render('SampleCard');
        } else {
            echo '<p>Welcome to the Magus Core dashboard!</p>';
        }
        echo '</div>';
    }
}
