<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Observer;

use function array_search;
use function in_array;

class WeatherStation implements Subject
{
    private float $temperature = 0.0;
    /** @var array<Observer> */
    private array $observers = [];

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
        $this->notifyObservers();
    }

    public function registerObserver(Observer $observer): void
    {
        if (!in_array($observer, $this->observers, true)) {
            $this->observers[] = $observer;
        }
    }

    public function removeObserver(Observer $observer): void
    {
        $key = array_search($observer, $this->observers, true);

        if (false !== $key) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature);
        }
    }
}
