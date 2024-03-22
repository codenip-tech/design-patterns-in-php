<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Specification\Interface;

use Codenip\Behavioral\Specification\Model\User;

interface UserSpecification
{
    public function isSatisfiedBy(User $user): bool;
}
