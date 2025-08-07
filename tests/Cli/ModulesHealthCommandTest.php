<?php
namespace Tests\Cli;

use PHPUnit\Framework\TestCase;

class ModulesHealthCommandTest extends TestCase
{
    public function testInvokeOutputsModuleStatusTable()
    {
        // Skip test if not running in WP-CLI environment
        if (!class_exists('\WP_CLI')) {
            $this->markTestSkipped('WP_CLI is not available');
            return;
        }

        ob_start();
        try {
            $cmd = new \Magus\Cli\ModulesHealthCommand();
            $cmd->__invoke([], []);
            $output = ob_get_clean();
            $this->assertStringContainsString('Module', $output, 'Table header missing in output');
        } finally {
            while (ob_get_level() > 0) { ob_end_clean(); }
        }
    }
}
