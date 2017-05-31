<?php

namespace Test\App\Provider;

use App\Provider\FibonacciProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class FibonacciProviderTest
 */
class FibonacciProviderTest extends TestCase
{
    /** @var  FibonacciProvider */
    private $provider;

    protected function setUp()
    {
        $this->provider = new FibonacciProvider();
    }

    public function testCorrect()
    {
        $this->assertEquals(1, $this->provider->calculate(1));
        $this->assertEquals(1, $this->provider->calculate(2));
        $this->assertEquals(5, $this->provider->calculate(5));
        $this->assertEquals(5, $this->provider->calculate(5));
        $this->assertEquals(987, $this->provider->calculate(16));
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @expectedException \InvalidArgumentException
     */
    public function testInvalid($value)
    {
        $this->provider->calculate($value);
    }

    public function invalidDataProvider()
    {
        return [[-1], [-123124], [0]];
    }
}
