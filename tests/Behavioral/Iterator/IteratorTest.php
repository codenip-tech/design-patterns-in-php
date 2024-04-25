<?php

declare(strict_types=1);

namespace Codenip\Tests\Behavioral\Iterator;

use Codenip\Behavioral\Iterator\Model\Book;
use Codenip\Behavioral\Iterator\SimpleIterator;
use PHPUnit\Framework\TestCase;

use function iterator_count;

class IteratorTest extends TestCase
{
    /**
     * @dataProvider booksDataProvider
     */
    public function testIteratorWithBooks(array $books): void
    {
        $iterator = new SimpleIterator($books);

        while ($iterator->valid()) {
            /** @var Book $book */
            $book = $iterator->current();
            $key = $iterator->key();

            self::assertEquals($books[$key]->getIsbn(), $book->getIsbn());
            self::assertEquals($books[$key]->getTitle(), $book->getTitle());

            $iterator->next();
        }

        self::assertCount(4, $iterator);
    }

    /**
     * @dataProvider booksDataProvider
     */
    public function testRewind(array $books): void
    {
        $iterator = new SimpleIterator($books);

        self::assertEquals(0, $iterator->key());

        // iterator_count sets the cursor to the last position. Be careful and use rewind!!
        $count = iterator_count($iterator);

        self::assertEquals(4, $count);

        $iterator->rewind();

        self::assertEquals(0, $iterator->key());
    }

    public static function booksDataProvider(): iterable
    {
        yield 'Books' => [
            'books' => [
                new Book('9781234567897', 'DDD in PHP'),
                new Book('9781234567123', 'CQRS by Example'),
                new Book('3211234567123', 'Hexagonal architecture in PHP'),
                new Book('5551234567665', 'Enterprise PHP by Codenip'),
            ],
        ];
    }
}
