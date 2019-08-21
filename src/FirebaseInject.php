<?php

declare(strict_types=1);

namespace Piotzkhider\FirebaseModule;

use Kreait\Firebase;
use Ray\Di\Di\Inject;

trait FirebaseInject
{
    /**
     * @var Firebase
     */
    protected $firebase;

    /**
     * @Inject
     */
    public function setFirebase(Firebase $firebase): void
    {
        $this->firebase = $firebase;
    }
}
