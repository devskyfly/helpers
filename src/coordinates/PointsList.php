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
     * Return number of elements in list property
     * @return number
     */
    public function len()
    {
        return count($this->list);
    }
    
    /**
     * Calculate midium point or return null if list is empty
     * 
     * @return devskyfly\helpers\coordinates\Point | false
     */
    public function calcMediumPoint()
    {
        $lat=0;
        $lng=0;
        $i=0;
        
        if($this->len()==0)
        {
            return false;
        }
        
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