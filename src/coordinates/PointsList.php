<?php
namespace devskyfly\helpers\coordinates;


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
     * @return unknown
     */
    public function getList()
    {
        return $this->list;
    }
}