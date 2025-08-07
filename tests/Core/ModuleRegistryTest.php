<?php
namespace Tests\Core;

use PHPUnit\Framework\TestCase;
use Magus\Core\ModuleRegistry;

class ModuleRegistryTest extends TestCase
{
    public function testGetModulesReturnsNonEmptyArray()
    {
        $modules = ModuleRegistry::getModules();
        $this->assertIsArray($modules, 'Modules should be returned as an array');
        $this->assertNotEmpty($modules, 'No modules were found by registry');
    }
}
