<?php
/*
Plugin Name: Magus Core
Description: AI-powered modular WP system.
Version: 1.0.0
Author: Salman Farees
Text Domain: magus-core
*/

if (!defined('ABSPATH')) exit;

// 1. Composer Autoloader (check for existence)
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// 2. Namespaced Core Bootstrap
use Magus\Core\Bootstrap;

// 3. Register plugin activation/deactivation/uninstall hooks
register_activation_hook(__FILE__, [Bootstrap::class, 'activate']);
register_deactivation_hook(__FILE__, [Bootstrap::class, 'deactivate']);
register_uninstall_hook(__FILE__, [Bootstrap::class, 'uninstall']);

// 4. Main plugin boot (after all plugins loaded)
add_action('plugins_loaded', [Bootstrap::class, 'run']);

// 5. Register CLI commands (WP-CLI only, no duplicate require!)
if (defined('WP_CLI') && WP_CLI) {
    // Always use the correct relative path:
    require_once __DIR__ . '/includes/cli/ModulesHealthCommand.php';
    \WP_CLI::add_command('magus modules-health', \Magus\Cli\ModulesHealthCommand::class);
}
