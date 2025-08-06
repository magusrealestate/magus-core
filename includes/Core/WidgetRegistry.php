<?php
namespace Magus\Core;

class WidgetRegistry
{
    public static $widgets = [];

    public static function init()
    {
        $widgetsDir = __DIR__ . '/../admin/widgets/';
        foreach (glob($widgetsDir . '*.php') as $widgetFile) {
            require_once $widgetFile;
            $base = basename($widgetFile, '.php');
            $class = "Magus\\Admin\\Widgets\\" . $base;
            if (class_exists($class)) {
                self::$widgets[$base] = $class;
            }
        }
    }

    public static function render($name)
    {
        if (isset(self::$widgets[$name]) && method_exists(self::$widgets[$name], 'render')) {
            call_user_func([self::$widgets[$name], 'render']);
        }
    }
}
