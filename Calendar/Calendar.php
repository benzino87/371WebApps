<?php ini_set('display_errors', 1); ?>
<?php 
//for updating cookies
if(!isset($_GET['month'])){
    $_GET['month'] = 1;
    $_GET['year'] = 2000;
}

//Arrays to 
$pickColor = array("Orange", "Blue", "Green", "Purple");
$pickFont = array("Courier","Monospace", "Times", "Serif");
$defaultFontColor = "red";
$defaultFontStyle = "arial";

/**
 * Start by checking if form was submitted and no cookie exists
 **/
if(isset($_POST['fontStyle']) && (!array_key_exists('fontStyle', $_COOKIE))){
    if($_POST['fontStyle']==''){
        $fontStyle = $defaultFontStyle;
    }
    $fontStyle = $_POST['fontStyle'];
    setcookie('fontStyle', $fontStyle);
}else{
    $fontStyle = $defaultFontStyle;
}

if(isset($_POST['fontColor']) && (!array_key_exists('fontColor', $_COOKIE))){
    if($_POST['fontColor']==''){
        $fontColor = $defaultFontColor;
    }
    $fontColor = $_POST['fontColor'];
    setcookie('fontColor', $fontColor);
}else{
    $fontColor = $defaultFontColor;
}
/**
 * Keep cookie if no post is found, if post IS found, change cookie to post value
 **/
if(array_key_exists('fontColor', $_COOKIE)&&(!isset($_POST['fontColor']))){
    $fontColor = $_COOKIE['fontColor'];
}else if(array_key_exists('fontColor', $_COOKIE)&&(isset($_POST['fontColor']))){
    $fontColor = $_POST['fontColor'];
    setcookie('fontColor', $fontColor);
}else{
    $fontColor = $defaultFontColor;
}

/**
 * Keep cookie if no post is found, if post IS found, change cookie to post value
 **/
if(array_key_exists('fontStyle', $_COOKIE)&&(!isset($_POST['fontStyle']))){
    $fontStyle = $_COOKIE['fontStyle'];
}else if(array_key_exists('fontStyle', $_COOKIE)&&(isset($_POST['fontStyle']))){
    $fontStyle = $_POST['fontStyle'];
    setcookie('fontStyle', $fontStyle);
}else{
    $fontStyle = $defaultFontStyle;
}


    
        

        $month = $_GET['month'];
        $year = $_GET['year'];
        $lastMonth = $month;
        $lastYear = $year;
        $nextMonth = $month;
        $nextYear = $year;
    
        
        /**
         * Handle month changes
         **/
        if($month == 1){
            $lastMonth = 12;
            $lastYear = $year-1;
        }else{
            $lastMonth = $month-1;
            $lastYear = $year;
        }
         if($month == 12){
            $nextMonth = 1;
            $nextYear = $year+1;
        }else{
            $nextMonth = $month+1;
            $nextYear = $year;
        }
        
       
        /**
         * Uses the month and year to re-draw the calendar everytime 
         * there is a month change
         **/
        function drawCalendar($month, $year){
            //$queryString = "Calendar.php?month$month=&year=$year";
            $_GET['month'] = $month;
            $_GET['year'] = $year;
            
            $monthName = date('F', mktime(0, 0, 0, $month, 1, $year));
            
            echo "<h1>$monthName$year</h1>";
        
             $days = array('Sun',
                        'Mon',
                        'Tues',
                        'Wed',
                        'Thurs',
                        'Fri',
                        'Sat');
                        
            $firstDayOfMonth = date('w', mktime(0, 0, 0, $month, 1, $year));
            $totalDaysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));
            $totalDaysOfWeek = 7;
           
            /* Create calendar table and first row of weekday names */
            
            $table = '<table style="border: 1px solid black">';
            echo "$table<tr>";
            
            foreach ($days as $name){
            echo "<th>$name</th>";
            }
            
            
            echo "</tr>";
            
            /*position of insertion*/
            $temp = 1;
            
            /*day of the month*/
            $day = 1;
            for($i = 1; $i <= 6; $i++){
                echo "<tr>";
                if($temp <= $totalDaysOfWeek){
                    for($x = 0; $x < $totalDaysOfWeek; $x++){
                        if($x < $firstDayOfMonth && $i == 1){
                            echo "<td></td>";
                            $temp++;
                        }elseif($day <= $totalDaysInMonth){
                        $temp++;
                        echo "<td>$day</td>";
                        $day++;
                        }
                    }
                }
                $temp = 1;
                echo "</tr>";
            }
            echo "</table>";
        }



?>
<html>
 
    <link rel="stylesheet" href="Calendar.css" type="text/css" />
    <body style="color:<?php echo $fontColor?>; font-family:<?php echo $fontStyle?>;">
        <div class="lastMonth">
            <h4 id="lastM">Last Month</h4>
            <a href="Calendar.php?month=<?php echo $lastMonth?>&year=<?php echo $lastYear?>"><img border="0" src="doge.jpeg" width="100" height="100"></a>
        </div>
        
        <div class ="cal">
        <?php 
            drawCalendar(date($_GET['month']), date($_GET['year']));
            ?>
        </div>
        
        <div class="nextMonth">
            <h4 id="nextM">Next Month</h4>
            <a href="Calendar.php?month=<?php echo $nextMonth?>&year=<?php echo $nextYear?>"><img border="0" src="grumpycat.jpeg" width="100" height="100"></a>
        </div>
        
        
        
        <div class="personalize">
            <h2>Select some custom options</h2>
            
         <h4>Pick a font color</h4>    
         <form method="POST" action="Calendar.php?month=<?php echo $month?>&year=<?php echo $year?>">
            <select name="fontColor">
                <option value=""></option>
                <?php
                foreach ($pickColor as $color) {
                    echo "<option name='color' value='$color'>'$color'</option>";
                }
                ?>
            </select>
            <h4>Pick a font style</h4>
            <select name="fontStyle">
                <option value=""></option>
                <?php
                foreach ($pickFont as $value) {
                    echo "<option name='font' value='$value'>'$value'</option>";
                }
                ?>
            </select>
            <input type="submit" value="Submit Font">
        </form>
        </div>
    </body>
</html>