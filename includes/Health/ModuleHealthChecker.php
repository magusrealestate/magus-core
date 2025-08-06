<?php
namespace Magus\Health;

use Magus\Core\ModuleRegistry;

class ModuleHealthChecker
{
    /**
     * Return health status for all modules.
     *
     * @return array
     */
    public static function report(): array
    {
        $status = [];
        foreach (ModuleRegistry::getModules() as $module) {
            $active = method_exists($module, 'isActive') ? $module::isActive() : true;
            $status[] = [
                'name'   => $module,
                'active' => $active ? 'Active' : 'Inactive',
            ];
        }
        return $status;
    }
}
