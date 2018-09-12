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
     * Return nearest point
     * 
     * @return \devskyfly\helpers\coordinates\Point
     */
    public function getNearestPoint()
    {
        $list=$this->list->getList();
        $abs=0;
        $result=null;
        
        $i=1;
        
        
        
        foreach ($list as $key=>$item){
            
            $angl=$item->getAngleCoordinates();
            
            if($i==1){
                
                $result=$item;
                
                $abs=PointsOperations::abs($this->point,$item);
            }else{
                $next_abs=PointsOperations::abs($this->point,$item);
                
                if($next_abs<$abs){
                    $result=$item;
                    $abs=$next_abs;
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