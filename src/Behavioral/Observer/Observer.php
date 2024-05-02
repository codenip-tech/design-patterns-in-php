<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Observer;

interface Observer
{
    public function update(float $temperature): void;
}
