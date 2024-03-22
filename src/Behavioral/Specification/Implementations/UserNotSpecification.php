<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Specification\Implementations;

use Codenip\Behavioral\Specification\Interface\UserSpecification;
use Codenip\Behavioral\Specification\Model\User;

readonly class UserNotSpecification implements UserSpecification
{
    public function __construct(
        private UserSpecification $specification,
    ) {}

    public function isSatisfiedBy(User $user): bool
    {
        return false === $this->specification->isSatisfiedBy($user);
    }
}
