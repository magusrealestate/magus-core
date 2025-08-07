<?php
namespace Magus\Core;

class ModuleRegistry
{
    /**
     * Discover all Magus module classes in /includes/Modules/, recursively.
     *
     * @return array
     */
    public static function getModules(): array
    {
        $modules = [];
        $modulesDir = realpath(__DIR__ . '/../Modules/');
        if (!$modulesDir) {
            return [];
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($modulesDir)
        );

        foreach ($iterator as $file) {
            if (
                $file->isFile() &&
                preg_match('/([A-Za-z0-9]+)Module\.php$/', $file->getFilename(), $m)
            ) {
                // Example: Seo/SeoModule.php => Magus\Modules\Seo\SeoModule
                $relativePath = str_replace($modulesDir . DIRECTORY_SEPARATOR, '', $file->getPathname());
                $parts = explode(DIRECTORY_SEPARATOR, $relativePath);
                $classPath = [];
                foreach ($parts as $part) {
                    if (substr($part, -4) === '.php') {
                        $classPath[] = basename($part, '.php');
                    } else {
                        $classPath[] = $part;
                    }
                }
                // Remove the file extension from the last part
                $class = 'Magus\\Modules\\' . str_replace(DIRECTORY_SEPARATOR, '\\', implode('\\', $classPath));
                if (class_exists($class)) {
                    $modules[] = $class;
                }
            }
        }
        return $modules;
    }

    /**
     * Initialize all discovered modules that have an init() method.
     */
    public static function init()
    {
        foreach (self::getModules() as $module) {
            if (method_exists($module, 'init')) {
                $module::init();
            }
        }
    }
}
