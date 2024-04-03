<?php

declare(strict_types=1);

namespace Codenip\Structural\DataMapper\Service;

use Codenip\Structural\DataMapper\Repository\UserRepository;
use Codenip\Structural\DataMapper\Service\DTO\UserDTO;
use Codenip\Structural\DataMapper\UserMapper;

readonly class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserMapper $userMapper,
    ) {}

    public function create(UserDTO $userDTO): UserDTO
    {
        $user = $this->userMapper->convertToEntity($userDTO);

        $this->userRepository->save($user);

        return new UserDTO($user->id(), $user->name(), $user->email(), $user->isActive());
    }

    public function findOneById(string $id): UserDTO
    {
        $user = $this->userRepository->byId($id);

        return $this->userMapper->convertToDTO($user);
    }
}
