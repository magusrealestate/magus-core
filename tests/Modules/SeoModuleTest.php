<?php
namespace Tests\Modules;

use PHPUnit\Framework\TestCase;

class SeoModuleTest extends TestCase
{
    public function testSeoModuleExists()
    {
        $this->assertTrue(class_exists('Magus\Modules\Seo\SeoModule'), 'SeoModule class does not exist.');
    }
}
