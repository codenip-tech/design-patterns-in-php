<?php

declare(strict_types=1);

namespace Codenip\Tests\Behavioral\Memento;

use Codenip\Behavioral\Memento\State;
use Codenip\Behavioral\Memento\Ticket;
use PHPUnit\Framework\TestCase;

class MementoTest extends TestCase
{
    public function testOpenTicketChangeStatusAndRestore(): void
    {
        $ticket = new Ticket();
        $ticket->open();

        self::assertEquals(State::STATE_OPENED, (string) $ticket->getState());

        $openedStatusMemento = $ticket->saveToMemento();

        $ticket->assign();

        self::assertEquals(State::STATE_ASSIGNED, (string) $ticket->getState());

        $ticket->restoreFromMemento($openedStatusMemento);

        self::assertEquals(State::STATE_OPENED, (string) $ticket->getState());
    }
}
