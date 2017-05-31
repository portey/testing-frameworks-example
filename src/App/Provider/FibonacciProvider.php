<?php

namespace App\Provider;

/**
 * Class FibonacciProvider
 */
class FibonacciProvider
{
    /**
     * @param int $value
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     */
    public function calculate(int $value): int
    {
        if ($value <= 0) {
            throw new \InvalidArgumentException();
        }

        if (1 === $value || 2 === $value) {
            return 1;
        }

        return (int) ($this->calculate($value - 2) + $this->calculate($value - 1));
    }
}
