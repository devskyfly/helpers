<?php
namespace devskyfly\helpers\coordinates;


class PointsOperationsTest extends \Codeception\TestCase\Test
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
    public function testAbs()
    {
        $point_a=new Point(0, 0);
        $point_b=new Point(3.14/2, 0);
        $abs=PointsOperations::abs($point_a, $point_b);
        $eps=0.1;
        $result=($abs<(sqrt(2)+$eps))&&($abs>(sqrt(2)-$eps))?true:false;
        $this->assertTrue($result);
    }
}