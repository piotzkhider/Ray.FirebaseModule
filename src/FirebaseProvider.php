<?php

declare(strict_types=1);

namespace Piotzkhider\FirebaseModule;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Piotzkhider\FirebaseModule\Annotation\Credentials;
use Ray\Di\Di\PostConstruct;
use Ray\Di\ProviderInterface;

class FirebaseProvider implements ProviderInterface
{
    /**
     * @var mixed
     */
    private $credentials;

    /**
     * @var Firebase
     */
    private $firebase;

    /**
     * @Credentials()
     */
    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @PostConstruct
     */
    public function init(): void
    {
        $serviceAccount = ServiceAccount::fromValue($this->credentials);

        $this->firebase = (new Factory())
            ->withServiceAccount($serviceAccount)
            ->create();
    }

    public function get()
    {
        return $this->firebase;
    }
}
