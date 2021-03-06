<?php
namespace devskyfly\helpers\coordinates;

class Point
{   
    protected $reference=null;
    /**
     * Array of angel coordinates in radians.
     * 
     * @var array
     */
    protected $angle_coordinates=['lat'=>0,'lng'=>0];
    
    /**
     * 
     * Array of threeD coorinates
     * @var array
     */
    protected $threeD_coordinates=['x'=>0,'y'=>0,'z'=>0];
    
    /**
     * Radiuse in absolute values
     * 
     * If you do not need absolute value of coordinates you can set r=1
     * @var integer
     */
    protected $r=1;
    
    /**
     * 
     * @param float $lat
     * @param float$lng
     * @param object $reference
     * @param number $r
     * @throws \InvalidArgumentException
     */
    public function __construct($lat,$lng,$reference=null,$r=1)
    {
        if(!is_numeric($lat))
        {
            throw new \InvalidArgumentException("lat argument is not numeric");
        }
        
        if(!is_numeric($lng))
        {
            throw new \InvalidArgumentException("lng argument is not numeric");
        }
        
        if(!is_numeric($r))
        {
            throw new \InvalidArgumentException("r argument is not numeric");
        }
        
        if(!is_null($reference)){
            if(!is_object($reference)){
                throw new \InvalidArgumentException("reference is not object");
            }
        }
            
        $this->angle_coordinates['lat']=$lat;
        $this->angle_coordinates['lng']=$lng;
        $this->r=$r;
        $this->reference=$reference;
        
        $this->convert();
    }
    
    /**
     * Set threeD coordinates values using angel values
     * 
     * @return \devskyfly\helpers\coordinates\Point
     */
    protected function convert()
    {
        $this->threeD_coordinates['x']=cos($this->angle_coordinates['lat'])*cos($this->angle_coordinates['lng'])*$this->r;
        $this->threeD_coordinates['y']=cos($this->angle_coordinates['lat'])*sin($this->angle_coordinates['lng'])*$this->r;
        $this->threeD_coordinates['z']=sin($this->angle_coordinates['lat']);
        return $this;
    }
    
    /**
     * Return reference property
     * 
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }
    
    /**
     * Return threeD_coordinates
     * 
     * @return [] ['x'=>0,'y'=>0,'z'=>0]
     */
    public function getThreeDCoordinates()
    {
        return $this->threeD_coordinates;
    }
    
    /**
     * Return angle_coordinates
     * @return number[]
     */
    public function getAngleCoordinates()
    {
        return $this->angle_coordinates;
    }
}