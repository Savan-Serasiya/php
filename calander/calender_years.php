<?php 

function twoYearCalender($year1, $year2){
      for($years = $year1; $years <= $year2; $years++){
          for($months = 1; $months <= 12; $months++){
            $date = mktime(0, 0, 0, $months, 1, $years);
            $totalDays = date("t",$date);
            for($days = 1; $days <= $totalDays; $days++){
                $date = mktime(0, 0, 0, $months, $days, $years);
                echo date('D d-m-y',$date).'<br>';
            }
            echo "<br>";
          }
      }
}
twoYearCalender(2010,2020);
?>