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
    /**
     * @dataProvider credentialsDataProvider
     */
    public function testModule($credentials): void
    {
        $instance = (new Injector(new FirebaseModule($credentials), __DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $instance);
    }

    public function testCompile(): void
    {
        (new DiCompiler(new FirebaseModule(__DIR__ . '/dummy.json'), __DIR__ . '/tmp'))->compile();
        $firebase = (new ScriptInjector(__DIR__ . '/tmp'))->getInstance(Firebase::class);
        $this->assertInstanceOf(Firebase::class, $firebase);
    }

    public function testInject(): void
    {
        $injector = new Injector(new FirebaseModule(__DIR__ . '/dummy.json'), __DIR__ . '/tmp');
        $firebase = $injector->getInstance(Firebase::class);
        /** @var FakeFirebaseInject $fakeInject */
        $fakeInject = $injector->getInstance(FakeFirebaseInject::class);
        $this->assertSame($firebase, $fakeInject->get());
    }

    public function credentialsDataProvider()
    {
        $jsonPath = __DIR__ . '/dummy.json';
        $json = file_get_contents($jsonPath);
        $array = json_decode((string) $json, true);

        return [
            [$jsonPath],
            [$json],
            [$array],
        ];
    }
}
