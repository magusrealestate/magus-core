<?php
namespace Tests\Modules;

use PHPUnit\Framework\TestCase;
use Magus\Modules\Seo\SeoModule;

class SeoModuleTest extends TestCase
{
    public function testSeoModuleHasRender()
    {
        $this->assertTrue(method_exists(SeoModule::class, 'render'), 'SeoModule is missing a render method');
    }
}
