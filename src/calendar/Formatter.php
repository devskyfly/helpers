<?php
namespace devskyfly\helpers\calendar;

class Formatter
{   
    /**
     * 
     * @param string $date
     * @param Month::IM_PAD|Month::ROD_PAD $pad
     * @throws CalendarException
     * @return string
     */
    public static function getDayAndMonthName($date,$pad=Month::IM_PAD)
    {
        $result=date_parse($date);
        if($result===false){
            throw new CalendarException("Can't parse date param.");
        }
        
        $day=(int)$result['day'];
        if($day<10){
            $day="0".$day;
        }else{
            $day="".$day;
        }
        return $day." ".Month::getMonthName($date,$pad);
    }
}