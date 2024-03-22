<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Specification\Implementations;

use Codenip\Behavioral\Specification\Interface\UserSpecification;
use Codenip\Behavioral\Specification\Model\User;

class UserOrSpecification implements UserSpecification
{
    public function __construct(
        private UserSpecification $specification1,
        private UserSpecification $specification2,
    ) {}

    public function isSatisfiedBy(User $user): bool
    {
        return $this->specification1->isSatisfiedBy($user) || $this->specification2->isSatisfiedBy($user);
    }
}
