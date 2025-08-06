<?php
namespace Magus\Admin\Widgets;

class BacklinksStatsCard
{
    public static function render()
    {
        echo '<div style="background:#e7f7ee;padding:1.5rem;margin:2rem 0;border-radius:8px;">';
        echo '<h2>Backlink Stats</h2>';
        echo '<p>Show live backlink metrics here!</p>';
        echo '</div>';
    }
}
