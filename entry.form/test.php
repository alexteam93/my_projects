<!-- <script type="text/javascript" src="/bday.js"></script>
 --><!-- <?php $date = date('Y-m-d') ?> -->
 <?php 
 var_dump($data = $_POST);

 ?>
 <form action="/signup.php" method="POST">

<input type="date" name="calendar" value="2012-06-01"
    max="<?php echo $date = date('Y-m-d') ?>" min="1900-01-01"><hr>
</form>






<!-- <?php
     $monthOptions = '<option value="0" id="month_option">Month:</option>';
     $dayOptions = '<option value="0" id="day_option">Day:</option>';
     $yearOptions = '<option value="0" id="year_option">Year:</option>';
      
     for($month=1; $month<=12; $month++)
     {
         $monthName = date("M", mktime(0, 0, 0, $month));
         $monthOptions .= "<option value=\"{$month}\">{$monthName}</option>\n";
     }
     for($day=1; $day<=31; $day++)
     {
         $dayOptions .= "<option value=\"{$day}\">{$day}</option>\n";
     }
     for($year=2015; $year>=1890; $year--)
     {
         $yearOptions .= "<option value=\"{$year}\">{$year}</option>\n";
     }

     for($day=1; $day<=31; $day++)
     {
         $selected=($user_data['birth_day']==$day)?'selected':'';
         $dayOptions .= "<option ".$selected." value=\"".$day."\">".$day."</option>\n";
     }
     ?>

     <P>Дата Рождения:<br>
     <select name="day" id="day">
     <?php echo $dayOptions; ?>
     </select>
     <select name="month" id="month" onchange="updateDays();">
     <?php echo $monthOptions; ?>
     </select>
     <select name="year" id="year" onchange="updateDays();">
     <?php echo $yearOptions; ?>
     </select> -->