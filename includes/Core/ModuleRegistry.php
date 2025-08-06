<?php
namespace Magus\Core;

class ModuleRegistry
{
    /**
     * Discover and return all Magus module class names.
     *
     * @return array
     */
    public static function getModules(): array
    {
        $modules = [];
        $modulesDir = __DIR__ . '/../modules/';
        foreach (glob($modulesDir . '*Module.php') as $file) {
            $class = 'Magus\\Modules\\' . basename($file, '.php');
            if (class_exists($class)) {
                $modules[] = $class;
            }
        }
        return $modules;
    }

    public static function init()
{
    foreach (self::getModules() as $module) {
        if (method_exists($module, 'init')) {
            $module::init();
        }
    }
}

}
