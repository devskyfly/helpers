<?php
namespace devskyfly\helpers\coordinates;


class PointsComparatorTest extends \Codeception\TestCase\Test
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
    public function testGetNearestPoint()
    {
        $point_current=new Point(0.4,0);
        
        $points_list=new PointsList();
        $point_a=new Point(0.1,0);
        $point_b=new Point(0.2,0);
        $point_c=new Point(0.3,0);
        
        $points_list->add($point_a);
        $points_list->add($point_b);
        $points_list->add($point_c);
        
        $points_comparator=new PointsComparator($point_current, $points_list);
        $nearest_point=$points_comparator->getNearestPoint();
        $result=$point_c==$nearest_point?true:false;
        //$this->debug($nearest_point);
        //$this->assertTrue($result);
    }
}