<?php

declare(strict_types=1);

namespace Piotzkhider\FirebaseModule;

use Kreait\Firebase;
use PHPUnit\Framework\TestCase;
use Ray\Compiler\DiCompiler;
use Ray\Compiler\ScriptInjector;
use Ray\Di\Injector;

class FirebaseModuleTest extends TestCase
{
    public function testModule(): void
    {
        $instance = (new Injector(new FirebaseModule(__DIR__ . '/dummy.json'), __DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $instance);
    }

    public function testCompile(): void
    {
        (new DiCompiler(new FirebaseModule(__DIR__ . '/dummy.json'), __DIR__ . '/tmp'))->compile();
        $firebase = (new ScriptInjector(__DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $firebase);
    }

    public function testFromJsonFile(): void
    {
        $instance = (new Injector(new FirebaseModule(__DIR__ . '/dummy.json'), __DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $instance);
    }

    public function testFromJson(): void
    {
        $json = file_get_contents(__DIR__ . '/dummy.json');
        $instance = (new Injector(new FirebaseModule($json), __DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $instance);
    }

    public function testFromArray(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/dummy.json');
        $array = json_decode($json, true);
        $instance = (new Injector(new FirebaseModule($array), __DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $instance);
    }
}
