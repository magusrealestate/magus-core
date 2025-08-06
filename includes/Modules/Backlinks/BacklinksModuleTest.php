<?php
namespace Tests\Modules;

use PHPUnit\Framework\TestCase;
use Magus\Modules\Backlinks\BacklinksModule;

class BacklinksModuleTest extends TestCase
{
    public function testBacklinksModuleHasRender()
    {
        $this->assertTrue(method_exists(BacklinksModule::class, 'render'), 'BacklinksModule is missing a render method');
    }
}
