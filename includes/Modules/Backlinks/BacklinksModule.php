<?php
namespace Magus\Modules\Backlinks;

class BacklinksModule
{
    public static function register()
    {
        // Example: Hook a notice to prove module loads
        add_action('admin_notices', function () {
            if (isset($_GET['page']) && $_GET['page'] === 'magus-core-dashboard') {
                echo '<div class="notice notice-success"><p>Backlinks Module Loaded!</p></div>';
            }
        });
        // You can add CPTs, REST endpoints, etc here
    }
}
