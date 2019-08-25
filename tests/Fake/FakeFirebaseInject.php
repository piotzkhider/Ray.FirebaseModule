<?php

declare(strict_types=1);

namespace Piotzkhider\FirebaseModule;

use Kreait\Firebase;

class FakeFirebaseInject
{
    use FirebaseInject;

    public function get(): Firebase
    {
        return $this->firebase;
    }
}
