<?php
namespace devskyfly\helpers\coordinates;

class PointsListTest extends \Codeception\TestCase\Test
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetList()
    {
        $points_list=new PointsList();
        
        $point_a=new Point(0.5,0.3);
        $point_b=new Point(0.1,0.6);
        $point_c=new Point(0.3,0.1);
        
        $points_list->add($point_a);
        $points_list->add($point_b);
        $points_list->add($point_c);
        
        $list=$points_list->getList();
        
        $this->assertEquals(3, count($list));
    }
}