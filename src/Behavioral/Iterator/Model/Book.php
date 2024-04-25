<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Iterator\Model;

readonly class Book
{
    public function __construct(
        private string $isbn,
        private string $title,
    ) {}

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
