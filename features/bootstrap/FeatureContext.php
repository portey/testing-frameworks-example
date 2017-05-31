<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /** @var  \App\Provider\FibonacciProvider */
    private $provider;

    /** @var  int */
    private $result;

    /** @var  \Exception */
    private $exception;

    /**
     * @Given /^new provider instance$/
     */
    public function newProviderInstance()
    {
        $this->provider = new \App\Provider\FibonacciProvider();
    }

    /**
     * @Given /^calculate for number (\d+)$/
     */
    public function calculateForNumber($arg1)
    {
        $this->result = $this->provider->calculate($arg1);
    }

    /**
     * @Then /^result is (\d+)$/
     */
    public function resultIs($arg1)
    {
        if ($this->result !== $arg1) {
            throw new \LogicException();
        }
    }

    /**
     * @Given calculate for negative number :arg1
     */
    public function calculateForNegativeNumber($arg1)
    {
        try {
            $this->exception = null;
            $this->provider->calculate($arg1);
        } catch (\Exception $e) {
            $this->exception = $e;
        }
    }

    /**
     * @Then /^error must be thrown$/
     */
    public function errorMustBeThrown()
    {
        if(null === $this->exception) {
            throw new \LogicException();
        }
    }
}
