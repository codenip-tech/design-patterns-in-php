<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Memento;

use InvalidArgumentException;
use Stringable;

use function in_array;

class State implements Stringable
{
    public const string STATE_CREATED = 'created';
    public const string STATE_OPENED   = 'opened';
    public const string STATE_ASSIGNED = 'assigned';
    public const string STATE_CLOSED   = 'closed';

    private string $state;

    /** @var array<string> */
    private static array $validStates = [
        self::STATE_CREATED,
        self::STATE_OPENED,
        self::STATE_ASSIGNED,
        self::STATE_CLOSED,
    ];

    public function __construct(string $state)
    {
        self::ensureIsValidState($state);

        $this->state = $state;
    }

    public function __toString(): string
    {
        return $this->state;
    }

    private static function ensureIsValidState(string $state): void
    {
        if (!in_array($state, self::$validStates, true)) {
            throw new InvalidArgumentException('Invalid state given');
        }
    }
}
