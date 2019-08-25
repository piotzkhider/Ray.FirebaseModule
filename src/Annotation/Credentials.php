<?php

declare(strict_types=1);

namespace Piotzkhider\FirebaseModule\Annotation;

use Doctrine\Common\Annotations\Annotation\Target;
use Ray\Di\Di\Qualifier;

/**
 * @Annotation
 * @Target("METHOD")
 * @Qualifier
 */
class Credentials
{
}
