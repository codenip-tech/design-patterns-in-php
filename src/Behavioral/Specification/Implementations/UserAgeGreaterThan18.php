<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Specification\Implementations;

use Codenip\Behavioral\Specification\Interface\UserSpecification;
use Codenip\Behavioral\Specification\Model\User;

class UserAgeGreaterThan18 implements UserSpecification
{
    public function isSatisfiedBy(User $user): bool
    {
        return $user->age() >= 18;
    }
}
