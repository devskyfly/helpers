<?php
namespace devskyfly\helpers\coordinates;

 class PointsOperations
 {
     public static function abs(Point $point_a, Point $point_b)
     {
         $coods_a=$point_a->getThreeDCoordinates();
         $coods_b=$point_b->getThreeDCoordinates();
         
         $val=pow(($coods_a['x']-$coods_b['x']),2)+pow(($coods_a['y']-$coods_b['y']),2)+pow(($coods_a['z']-$coods_b['z']),2);
         
         return sqrt($val);
     }
 }