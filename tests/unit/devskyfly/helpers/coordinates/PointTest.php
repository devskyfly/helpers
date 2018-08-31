<?php
namespace devskyfly\helpers\coordinates;


use Codeception\Util\Debug;
use Codeception\Stub;

class PointTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected $point;
    
    protected function _before()
    {
        $this->point=new Point(0,0);
    }

    protected function _after()
    {
    }

    public function testGetThreeDCoordinates()
    {
        $coordinates=$this->point->getThreeDCoordinates();
        
        $this->assertEquals($coordinates['x'],1);
        $this->assertEquals($coordinates['y'],0);
        $this->assertEquals($coordinates['z'],0);
    }
}