<?php

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $app;

    public function setUp()
    {
        parent::setUp();

        $this->app = new Lib\Core\Application(
            realpath(__DIR__.'/../')
        );
    }
}
