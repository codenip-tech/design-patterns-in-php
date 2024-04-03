<?php

declare(strict_types=1);

namespace Codenip\Structural\DataMapper\Repository;

use Codenip\Structural\DataMapper\Entity\User;

class UserRepository
{
    public function byId(string $id): User
    {
        // logic to retrieve user from storage
        return User::create($id, 'Juan', 'juan@api.com', active: true);
    }

    public function save(User $user): void
    {
        // logic to persist users
    }
}
