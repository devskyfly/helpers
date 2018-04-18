<?php
namespace devskyfly\helpers\calendar;

class Month
{
    const IM_PAD="im_pad";
    const ROD_PAD="rod_pad";
    protected static $month_list = [
        self::IM_PAD => [
            1 => "Январь",
            2 => "Февраль",
            3 => "Март",
            4 => "Апрель",
            5 => "Май",
            6 => "Июнь",
            7 => "Июль",
            8 => "Август",
            9 => "Сентябрь",
            10 => "Октябрь",
            11 => "Ноябрь",
            12 => "Декабрь"
        ],
        self::ROD_PAD => [
            1 => "Января",
            2 => "Февраля",
            3 => "Марта",
            4 => "Апреля",
            5 => "Мая",
            6 => "Июня",
            7 => "Июля",
            8 => "Августа",
            9 => "Сентября",
            10 => "Октября",
            11 => "Ноября",
            12 => "Декабря"
        ]
    ];
    
    /**
     * @param self::IM_PAD|self::ROD_PAD $pad
     * @return string
     */
    public static function getMonthNameByNmb($nmb,$pad=self::IM_PAD)
    {
        $list=self::$month_list[$pad];
        
        if(!array_key_exists($nmb, $list)){
            throw new CalendarException("Key is't exist.");
        }
        return $list[$nmb];
    }
    
    /**
     * @param string $date
     * @param self::IM_PAD|self::ROD_PAD $pad
     */
    public static function getMonthName($date,$pad=self::IM_PAD)
    {
        $result=date_parse($date);
        if($result===false){
            throw new CalendarException("Can't parse date parem.");
        }
        $month_nmb=$result['month'];
        return self::getMonthNameByNmb($month_nmb,$pad);
    }
    
    public static function getDayAndMonthName($date,$pad=self::IM_PAD)
    {
        $result=date_parse($date);
        if($result===false){
            throw new CalendarException("Can't parse date parem.");
        }
        
        $day=(int)$result['day'];
        if($day<10){
            $day="0".$day;
        }else{
            $day="".$day;
        }
        return $day." ".self::getMonthName($date,$pad);
    }
}