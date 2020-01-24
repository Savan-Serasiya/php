<?php 
  session_start();
?>

<form action="" method="POST">
    Month : <input type="text" name="month"><br><br>
    Year :  <input type="text" name="year"><br><br>
    <input type="submit" value="Submit"/>
</form>

<?php 

function displayCalander($month, $year){

    $date = mktime(0, 0, 0, $month, 1, $year);
    $totalDays = date("t",$date);    
    $offset = date("w", $date);
    $rows = 1;

    echo "<table border=0 cellpadding=20>";
    echo "<tr>
            <th>Su</th>
            <th>M</th>
            <th>Tu</th>
            <th>W</th>
            <th>Th</th>
            <th>F</th>
            <th>Sa</th>
          </tr>";

    echo "<tr>";
     
    for($i = 1; $i <= $offset; $i++)
    {
      echo "<td></td>";
    }

    for($day = 1; $day <= $totalDays; $day++)
    {
      if( ($day + $offset - 1) % 7 == 0 && $day != 1)
      {
        echo "</tr><tr>";
        $rows++;
      }
      echo "<td>" . $day . "</td>";
    }

    while( ($day + $offset) <= $rows * 7)
    {
      echo "<td></td>";
      $day++;
    }

    echo "</tr>";
    echo "</table>";
}


if(isset($_POST['month']) && isset($_POST['year'])){

        $month = $_POST['month'];
        $year = $_POST['year'];

    if(!empty($month) && !empty($year)){
    
        $_SESSION['month'] = $month;
        $_SESSION['year'] = $year;

        displayCalander($month, $year);

      }else if(isset($_SESSION['month']) && isset($_SESSION['year'])){
        echo "Please fill all fields";
        $month = $_SESSION['month'];
        $year = $_SESSION['year'];

        displayCalander($month, $year);
    }

  }else if(isset($_SESSION['month']) && isset($_SESSION['year'])){
        $month = $_SESSION['month'];
        $year = $_SESSION['year'];

        displayCalander($month, $year);
  }
?>