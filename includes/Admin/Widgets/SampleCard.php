<?php
namespace Magus\Admin\Widgets;

class SampleCard
{
    public static function render()
    {
        echo '<div style="background:#fff;padding:2rem;margin:2rem 0;border-radius:8px;box-shadow:0 2px 8px #ddd;">';
        echo '<h2>Sample Magus Widget</h2>';
        echo '<p>This widget proves auto-discovery and registry are working.</p>';
        echo '</div>';
    }
}
