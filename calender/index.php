<?php
date_default_timezone_set('Europe/Helsinki');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">

<?php
    if(isset($_GET['t']))
    {
      $yearMonthTimeStamp = intval($_GET['t']);
    }
    else
    {
      $yearMonthTimeStamp = strtotime(date("Y-m"));
    }
  ?>
<div class="calendar">


<div class="calendar-header">
      <a class="button" href="?t=<?php echo strtotime(date("Y-m", strtotime("-1 month", $yearMonthTimeStamp))); ?>">&lt;</a>
      <?php echo date('F, Y', $yearMonthTimeStamp); ?>
      <a class="button" href="?t=<?php echo strtotime(date("Y-m", strtotime("+1 month", $yearMonthTimeStamp))); ?>">&gt;</a>
    </div>



    <div class="calendar-day-headers">
      <span>Måndag</span>
      <span>Tisdag</span>
      <span>Onsdag</span>
      <span>Torsdag</span>
      <span>Fredag</span>
      <span>Lördag</span>
      <span>Söndag</span>
    </div>



    
  <div class="days-container">

  
      <?php 
        $daysInMonth = date('t', $yearMonthTimeStamp);
        $startDay = date('N', $yearMonthTimeStamp) - 1;
        $totalDays = ceil(($startDay + $daysInMonth) / 7) * 7;
        $endDays = $totalDays - $daysInMonth - $startDay;

        for($i = 0; $i < $startDay; $i++)
        {
          echo '<div class="day"></div>';
        }
        for($i = 1; $i <= $daysInMonth; $i++)
        {
          echo '<div class="day">' . $i . '</div>';
        }
        for($i = 0; $i < $endDays; $i++)
        {
          echo '<div class="day"></div>';
        }
      
      ?>
    </div>
</div>  
</body>
</html>