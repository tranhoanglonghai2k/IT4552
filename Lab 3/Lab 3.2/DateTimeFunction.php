<html>
	<head>
		<meta charset="utf-8">
		<title>DateTimeFunction</title>
	</head>

<body>
	<font color="blue" size="+5">Exercise 2</font>
	
	<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
		<br>
		<label for="name1">1st full name is:</label>&nbsp;

		<input type="text" name="name1" required value="<?php 
			if(array_key_exists("name1",$_GET)) 
				echo $_GET["name1"];
		?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		Birthday:
		<input type="number" name="day1" required style="width: 40px;" value="<?php 
			if(array_key_exists("day1",$_GET)) 
				echo $_GET["day1"]; 
		?>"> / <input type="number" name="month1" required style="width: 40px;" value="<?php 
			if(array_key_exists("month1",$_GET) )
				echo $_GET["month1"]; 
		?>"> / <input type="number" name="year1" required style="width: 40px;" value="<?php 
			if(array_key_exists("year1",$_GET)) 
				echo $_GET["year1"]; 
		?>">

		<br><br>
		<label for="name2">2nd full name is:</label>
		
		<input type="text" name="name2" required value="<?php 
			if(array_key_exists("name2",$_GET)) 
				echo $_GET["name2"];
		?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		Birthday:
		<input type="number" name="day2" required style="width: 40px;" value="<?php 
			if(array_key_exists("day2",$_GET)) 
				echo $_GET["day2"]; 
		?>"> / <input type="number" name="month2" required style="width: 40px;" value="<?php 
			if(array_key_exists("month2",$_GET) )
				echo $_GET["month2"]; 
		?>"> / <input type="number" name="year2" required style="width: 40px;" value="<?php 
			if(array_key_exists("year2",$_GET)) 
				echo $_GET["year2"]; 
		?>">
		<br><br>
		
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">
	</form>
	<?php
		function MyFunction($name1, $name2, $day1, $day2, $month1, $month2, $year1, $year2) {
			$date1 = $year1."-".$month1."-".$day1;
			$date2 = $year2."-".$month2."-".$day2;
			$valid = true;

			if(!checkdate($month1, $day1, $year1)) {
						print("First birthday invalid<br>");
						$valid = false;
			}

			if(!checkdate($month2, $day2, $year2)) {
						print("Second birthday invalid<br>");
						$valid = false;
			}

			if($valid == true){
				$diff = abs(strtotime($date2) - strtotime($date1));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				
				print("Both dates are valid<br>");
				
				$weekday1 = date("l", strtotime($date1));
				$weekday2 = date("l", strtotime($date2));
				$monthName1 = date("F", strtotime($date1));
				$monthName2 = date("F", strtotime($date2));
				
				print("<br>$name1 was born on $weekday1, $monthName1 $day1, $year1");
				print("<br>$name2 was born on  $weekday2, $monthName2 $day2, $year2");
				print("<br><br>Diffenrence in days between two birthday is $years years, $months months, $days days<br>");
				
				$age1 = date("Y")-$year1;
				$age2 = date("Y")-$year2;
				
				print("<br>$name1 is $age1 years old");
				print("<br>$name2 is $age2 years old");
			}
		}
		if(array_key_exists("name1",$_GET) && array_key_exists("name2",$_GET)) {
			$name1 = $_GET["name1"];
			$name2 = $_GET["name2"];
			$day1 = $_GET["day1"];
			$day2 = $_GET["day2"];
			$month1 = $_GET["month1"];
			$month2 = $_GET["month2"];
			$year1 = $_GET["year1"];
			$year2 = $_GET["year2"];
			
			MyFunction($name1, $name2, $day1, $day2, $month1, $month2, $year1, $year2);
		}
	?>
</body>
</html>