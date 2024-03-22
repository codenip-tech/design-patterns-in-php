<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Specification\Interface;

interface UserQuery
{
    public function applySpecification(UserSpecification $specification): self;
}
