<?php

namespace Harp\Validate\Test;

use Harp\Validate\Assert\GreaterThan;
use stdClass;

/**
 * @group   assert.greater_than
 * @coversDefaultClass Harp\Validate\Assert\GreaterThan
 */
class GreaterThanTest extends AbstractTestCase
{
    public function dataIsValid()
    {
        return [
            [9, 4, true],
            [9, 10, 'test should be greater than 10'],
            [9, 9, 'test should be greater than 9'],
            [5, 4.3, true],
            [9, 9.66, 'test should be greater than 9.66'],
            [20.12, 9.2, true],
        ];
    }

    /**
     * @dataProvider dataIsValid
     * @covers ::isValid
     */
    public function testIsValid($value, $length, $expected)
    {
        $assertion = new GreaterThan('test', $length);

        $this->assertAssertion($expected, $assertion, $value);
    }

    /**
     * @covers ::__construct
     * @covers ::getValue
     * @covers ::getMessageParameters
     */
    public function testConstruct()
    {
        $assertion = new GreaterThan('test', 9, 'custom message');

        $this->assertEquals(9, $assertion->getValue());
        $this->assertEquals('test', $assertion->getName());
        $this->assertEquals([':name' => 'test', ':value' => 9], $assertion->getMessageParameters());
        $this->assertEquals('custom message', $assertion->getMessage());
    }
}
