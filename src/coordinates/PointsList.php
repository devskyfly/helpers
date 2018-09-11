<?php
namespace devskyfly\helpers\coordinates;


use devskyfly;

class PointsList
{
    /**
     * 
     * @var [Point]
     */
    protected $list=[];
    
    public function __construct()
    {
        
    }
    
    /**
     * Add item to list property
     * 
     * @param Point $point
     * @return \devskyfly\helpers\coordinates\PointsList
     */
    public function add(Point $point)
    {
        $this->list[]=$point;
        return $this;
    }
    
    /**
     * Return list property
     * 
     * @return [devskyfly\helpers\coordinates\Point]
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @return devskyfly\helpers\coordinates\Point
     */
    public function calcMediumPoint()
    {
        $lat=0;
        $lng=0;
        $i=0;
        foreach ($this->list as $point)
        {
            $i++;
            $angles=$point->getAngleCoordinates();
            $lat+=$angles['lat'];
            $lng+=$angles['lng'];
        }
        
        $point=new Point($lat/$i, $lng/$i);
        return $point;
    }
}