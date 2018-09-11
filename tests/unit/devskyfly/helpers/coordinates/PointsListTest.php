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
    
    public function testGetMediumPoint()
    {
        $points_list=new PointsList();
        
        $point_a=new Point(0.1,0.1);
        $point_b=new Point(0.2,0.1);
        $point_c=new Point(0.3,0.1);
        
        $points_list->add($point_a);
        $points_list->add($point_b);
        $points_list->add($point_c);
        
        $medium_point=$points_list->calcMediumPoint();
        $angle_coordinates=$medium_point->getAngleCoordinates();
        
        $lng_res=($angle_coordinates['lng']-0.1)<0.0001;

        $lng_res=($angle_coordinates['lat']-0.2)<0.0001;

        $this->assertTrue($lng_res&&$lng_res);
    }
}