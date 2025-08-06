<?php
namespace Magus\Admin;

class Dashboard
{
    public static function init()
    {
        add_action('admin_menu', [self::class, 'addDashboardPage']);
        add_action('admin_enqueue_scripts', [self::class, 'enqueueAssets']);
    }

    public static function enqueueAssets($hook)
    {
        if ($hook !== 'toplevel_page_magus-core-dashboard') return;
        wp_enqueue_style('magus-core-admin', plugins_url('../../assets/css/admin.css', __FILE__));
        wp_enqueue_script('magus-core-admin', plugins_url('../../assets/js/admin.js', __FILE__), [], false, true);
    }

    public static function addDashboardPage()
    {
        add_menu_page(
            'Magus Core Dashboard',
            'Magus Core',
            'manage_options',
            'magus-core-dashboard',
            [self::class, 'renderDashboard'],
            'dashicons-admin-generic',
            2
        );
    }

    public static function renderDashboard()
    {
        $section = $_GET['section'] ?? 'dashboard';

        echo '<div class="magus-core-admin">';
        self::renderSidebar($section);
        echo '<div class="magus-core-main">';
        self::renderHeader($section);

        // Modern, modular section routing
        $sectionClasses = [
            'seo'       => '\\Magus\\Admin\\Sections\\SeoSection',
            'backlinks' => '\\Magus\\Admin\\Sections\\BacklinksSection',
            // Add more section mappings here
        ];

        if (array_key_exists($section, $sectionClasses) && method_exists($sectionClasses[$section], 'render')) {
            call_user_func([$sectionClasses[$section], 'render']);
        } else {
            self::renderHome();
        }

        echo '</div></div>';
    }

    public static function renderSidebar($current)
    {
        ?>
        <nav class="magus-core-sidebar">
            <ul>
                <li class="<?= $current == 'dashboard' ? 'active' : '' ?>"><a href="?page=magus-core-dashboard&section=dashboard"><span class="dashicon">&#x1F3E0;</span> Dashboard</a></li>
                <li class="<?= $current == 'seo' ? 'active' : '' ?>"><a href="?page=magus-core-dashboard&section=seo"><span class="dashicon">&#x1F4C8;</span> SEO</a></li>
                <li class="<?= $current == 'backlinks' ? 'active' : '' ?>"><a href="?page=magus-core-dashboard&section=backlinks"><span class="dashicon">&#x1F517;</span> Backlinks</a></li>
                <!-- Add more sections as needed -->
                <li class="<?= $current == 'settings' ? 'active' : '' ?>"><a href="?page=magus-core-dashboard&section=settings"><span class="dashicon">&#9881;</span> Settings</a></li>
            </ul>
        </nav>
        <?php
    }

    public static function renderHeader($section)
    {
        $titles = [
            'dashboard' => 'Dashboard',
            'seo'       => 'SEO',
            'backlinks' => 'Backlinks',
            'settings'  => 'Settings',
        ];
        $title = $titles[$section] ?? 'Dashboard';
        echo '<header class="magus-core-header">';
        echo '<h1>' . esc_html($title) . '</h1>';
        // Add more header content here if needed.
        echo '</header>';
    }

    public static function renderHome()
    {
        echo '<div class="magus-core-welcome-card">';
        echo '<h2>Welcome to Magus Core!</h2>';
        echo '<p>This is your central dashboard.</p>';
        echo '</div>';
        // Add more dashboard widgets/stats if needed
    }
}
