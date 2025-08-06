<?php
namespace Magus\Admin\Widgets;

use Magus\Health\ModuleHealthChecker;

class ModuleStatusWidget
{
    public static function render()
    {
        $statuses = ModuleHealthChecker::report();
        ?>
        <div class="magus-status-widget" style="padding:16px;background:#fff;border-radius:10px;box-shadow:0 1px 4px rgba(0,0,0,0.04);margin-bottom:20px;">
            <h3 style="margin-top:0;">Module Status</h3>
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left;padding:6px;">Module</th>
                        <th style="text-align:left;padding:6px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($statuses as $s): ?>
                    <tr>
                        <td style="padding:6px;"><?php echo esc_html($s['name']); ?></td>
                        <td style="padding:6px;">
                            <?php if ($s['active'] === 'Active'): ?>
                                <span style="color:#4caf50;font-weight:bold;">Active</span>
                            <?php else: ?>
                                <span style="color:#f44336;font-weight:bold;">Inactive</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
