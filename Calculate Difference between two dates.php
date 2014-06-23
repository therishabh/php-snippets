<?php
 function dateDiff($d1,$d2){
    $date1=strtotime($d1);
    $date2=strtotime($d2);
    $seconds = $date1 - $date2;
    $weeks = floor($seconds/604800);
    $seconds -= $weeks * 604800;
    $days = floor($seconds/86400);
    $seconds -= $days * 86400;
    $hours = floor($seconds/3600);
    $seconds -= $hours * 3600;
    $minutes = floor($seconds/60);
    $seconds -= $minutes * 60;
    $months=round(($date1-$date2) / 60 / 60 / 24 / 30);
    $years=round(($date1-$date2) /(60*60*24*365));
    $diffArr=array("Seconds"=>$seconds,
                  "minutes"=>$minutes,
                  "Hours"=>$hours,
                  "Days"=>$days,
                  "Weeks"=>$weeks,
                  "Months"=>$months,
                  "Years"=>$years
                 ) ;
   return $diffArr;
}

echo '<pre>';
print_r(dateDiff("2011-02-21 10:01:11","2011-01-01 10:09:11"));

?>