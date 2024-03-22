<?php

declare(strict_types=1);

namespace Codenip\Tests\Behavioral\Specification;

use Codenip\Behavioral\Specification\Implementations\UserAgeGreaterThan18;
use Codenip\Behavioral\Specification\Implementations\UserAndSpecification;
use Codenip\Behavioral\Specification\Implementations\UserIsActive;
use Codenip\Behavioral\Specification\Implementations\UserNotSpecification;
use Codenip\Behavioral\Specification\Implementations\UserOrSpecification;
use Codenip\Behavioral\Specification\Model\User;
use Codenip\Behavioral\Specification\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    /**
     * @dataProvider specificationDataProvider
     */
    public function testAgeGraterThan18(UserRepository $repository): void
    {
        $adultUsers = $repository->applySpecification(new UserAgeGreaterThan18())->getUsers();

        self::assertCount(1, $adultUsers);
    }

    /**
     * @dataProvider specificationDataProvider
     */
    public function testIsActiveSpecification(UserRepository $repository): void
    {
        $activeUsers = $repository->applySpecification(new UserIsActive())->getUsers();

        self::assertCount(2, $activeUsers);
    }

    /**
     * @dataProvider specificationDataProvider
     */
    public function testUserAndSpecification(UserRepository $repository): void
    {
        $users = $repository->applySpecification(
            new UserAndSpecification(
                new UserAgeGreaterThan18(),
                new UserIsActive(),
            ),
        )->getUsers();

        self::assertCount(1, $users);
    }

    /**
     * @dataProvider specificationDataProvider
     */
    public function testUserOrSpecification(UserRepository $repository): void
    {
        $users = $repository->applySpecification(
            new UserOrSpecification(
                new UserAgeGreaterThan18(),
                new UserIsActive(),
            ),
        )->getUsers();

        self::assertCount(2, $users);
    }

    /**
     * @dataProvider specificationDataProvider
     */
    public function testUserNotSpecification(UserRepository $repository): void
    {
        $users = $repository->applySpecification(
            new UserNotSpecification(
                new UserIsActive(),
            ),
        )->getUsers();

        self::assertCount(0, $users);
    }

    public static function specificationDataProvider(): iterable
    {
        $users = [
            new User(1, 'Juan', 38, true),
            new User(2, 'Moein', 10, true),
        ];

        $repository = new UserRepository($users);

        yield 'Basic repository' => [
            'repository' => $repository,
        ];
    }
}
