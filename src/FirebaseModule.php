<?php

declare(strict_types=1);

namespace Piotzkhider\FirebaseModule;

use Kreait\Firebase;
use Piotzkhider\FirebaseModule\Annotation\GoogleApplicationCredentials;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class FirebaseModule extends AbstractModule
{
    /**
     * @var mixed
     */
    private $credentials;

    public function __construct($credentials, AbstractModule $module = null)
    {
        $this->credentials = $credentials;
        parent::__construct($module);
    }

    protected function configure(): void
    {
        $this->bind()->annotatedWith(GoogleApplicationCredentials::class)->toInstance($this->credentials);
        $this->bind(Firebase::class)->toProvider(FirebaseProvider::class)->in(Scope::SINGLETON);
    }
}
