<?php
namespace Magus\Cli;

use Magus\Health\ModuleHealthChecker;

class ModulesHealthCommand
{
    /**
     * Run health checks and print as a CLI table.
     *
     * ## EXAMPLES
     *   wp magus modules-health
     */
    public function __invoke($args, $assoc_args)
    {
        $statuses = ModuleHealthChecker::report();
        if (empty($statuses)) {
            \WP_CLI::warning('No modules found.');
            return;
        }
        \WP_CLI\Utils\format_items('table', $statuses, ['name', 'active']);
    }
}
