<?php
namespace Magus\Core;

use Magus\Admin\Dashboard;
use Magus\Core\ModuleRegistry;
use Magus\Core\WidgetRegistry;

/**
 * Class Bootstrap
 * Main entry point for Magus Core systems.
 */
class Bootstrap
{
    /**
     * Bootstraps the plugin's core systems and registries.
     * Called on 'plugins_loaded'.
     */
    public static function run()
    {
        // Initialize all core registries
        WidgetRegistry::init();

        // Register central dashboard (handles its own menu page)
        Dashboard::init();
    }

    public static function activate() {}
    public static function deactivate() {}
    public static function uninstall() {}
}
