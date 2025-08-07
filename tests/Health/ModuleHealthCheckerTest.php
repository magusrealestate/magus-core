<?php
namespace Tests\Health;

use PHPUnit\Framework\TestCase;

class ModuleHealthCheckerTest extends TestCase
{
    public function testReportReturnsStatusArray()
    {
        $status = \Magus\Health\ModuleHealthChecker::report();
        if (empty($status)) {
            $this->markTestSkipped('No modules found, skipping health checker test.');
            return;
        }
        $this->assertIsArray($status, 'Health report should be an array');
        $this->assertArrayHasKey('name', $status[0], 'No name key in health status');
        $this->assertArrayHasKey('active', $status[0], 'No active key in health status');
    }
}
