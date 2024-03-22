<?php

declare(strict_types=1);

namespace Codenip\Creational\Builder;

use Codenip\Creational\Builder\Model\Pizza;
use Codenip\Creational\Builder\Model\Topping;

readonly class PizzaBuilder
{
    private string $size;
    private string $dough;
    private string $cheese;
    /** @var array<Topping> */
    private array $toppings;

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function setDough(string $dough): self
    {
        $this->dough = $dough;

        return $this;
    }

    public function setCheese(string $cheese): self
    {
        $this->cheese = $cheese;

        return $this;
    }

    public function setToppings(array $toppings): self
    {
        $this->toppings = $toppings;

        return $this;
    }

    public function build(): Pizza
    {
        return new Pizza(
            $this->size,
            $this->dough,
            $this->cheese,
            $this->toppings,
        );
    }
}
