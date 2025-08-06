<?php
namespace Magus\Modules\Seo;

class SeoModule
{
    public static function register()
    {
        // Register SEO stats card for the dashboard
        add_action('magus_dashboard_widgets', ['Magus\Admin\Widgets\SeoStatsCard', 'render']);
    }
}

