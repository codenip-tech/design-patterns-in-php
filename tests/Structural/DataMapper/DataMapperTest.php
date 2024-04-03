<?php

declare(strict_types=1);

namespace Codenip\Tests\Structural\DataMapper;

use Codenip\Structural\DataMapper\Entity\User;
use Codenip\Structural\DataMapper\Service\DTO\UserDTO;
use Codenip\Structural\DataMapper\UserMapper;
use PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase
{
    private readonly UserMapper $userMapper;

    protected function setUp(): void
    {
        $this->userMapper = new UserMapper();
    }

    public function testConvertToEntity(): void
    {
        $dto = new UserDTO('u_123', 'Juan', 'juan@api.com', active: true);

        $entity = $this->userMapper->convertToEntity($dto);

        self::assertInstanceOf(User::class, $entity);
        self::assertEquals($dto->id, $entity->id());
        self::assertEquals($dto->name, $entity->name());
        self::assertEquals($dto->email, $entity->email());
        self::assertEquals($dto->active, $entity->isActive());
    }

    public function testConvertToDTO(): void
    {
        $entity = User::create('u_123', 'Moein', 'moein@api.com', active: false);

        $dto = $this->userMapper->convertToDTO($entity);

        self::assertInstanceOf(UserDTO::class, $dto);
        self::assertEquals($entity->id(), $dto->id);
        self::assertEquals($entity->name(), $dto->name);
        self::assertEquals($entity->email(), $dto->email);
        self::assertEquals($entity->isActive(), $dto->active);
    }
}
