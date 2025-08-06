<?php
namespace Magus\AI;

class ModuleAdvisor
{
    public static function suggestActions(array $statuses)
    {
        foreach ($statuses as $s) {
            if ($s['active'] !== 'Active') {
                echo "🧠 Suggestion: Reactivate or debug module {$s['name']}\n";
            }
        }
    }
}
