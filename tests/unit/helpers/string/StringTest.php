<?php
namespace devskyfly\helpers\string;

class StringTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetWordForNumber()
    {
        $words=["яблоко", "яблока", "яблок"];
        $val=String::getWordForNumber(1, $words);
        $this->assertEquals($val,"яблоко");
    }
}