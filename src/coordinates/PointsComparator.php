<?php
namespace devskyfly\helpers\coordinates;

class PointsComparator
{
    /**
     * 
     * @var \devskyfly\helpers\coordinates\Point
     */
    protected $point=null;
    
    /**
     * 
     * @var [\devskyfly\helpers\coordinates\PointsList]
     */
    protected $list=[];
    
    public function __construct(Point $point, PointsList $list)
    {
        $this->point=$point;
        $this->list=$list;
    }
    
    /**
     * 
     * @param callback $function
     * @return \devskyfly\helpers\coordinates\Point
     */
    protected function listGenerator()
    {
        foreach ($this->list as $item){
            yield $item;
        }
    }
    
    /**
     * Return nearest point
     * 
     * @return \devskyfly\helpers\coordinates\Point
     */
    public function getNearestPoint()
    {
        $abs=0;
        $result=null;
        
        $i=1;
        foreach ($this->listGenerator() as $item){
            if($i==1){
                $result=$item;
                $abs=PointsOperations::abs($this->point,$item);
            }else{
                $next_abs=PointsOperations::abs($this->point,$item);
                
                if($next_abs<$abs){
                    $result=$item;
                }
            }
            $i++;
        }
        
        return $result;
    }
    
    /**
     * Return far point
     *
     * @return \devskyfly\helpers\coordinates\Point
     */
    public function getFarPoint()
    {
        
    }
    
    
}