<?php

use PHPUnit\Framework\TestCase;

class BootstrapTest extends TestCase
{

    public function testRun():void
    {
        //$app = new App\Bootstrap();
        //$this->assertTrue($app->run('img/', 'json/'));
        $app= new \App\Bootstrap('img/', 'json/');

        $this->assertTrue($app->run());
        //$this->assertInstanceOf(

            //\App\Bootstrap::class,
            //\App\Bootstrap::run('/img','/json')
            //);
    }
}
