<html>
	<head>
		<meta charset="utf-8">
		<title>Untitled Document</title>
	</head>

	<body>
		<font color="blue" size="5">Appointment</font>

		<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
			<?php
				if(array_key_exists("name",$_GET)){
					$day = $_GET["day"];
					$month = $_GET["month"];
					$year = $_GET["year"];
					$hour = $_GET["hour"];
					$min = $_GET["min"];
					$sec = $_GET["sec"];
				} else{
					$day = 0; $month = 0; $year = 0;
					$hour = 0; $min = 0; $sec = 0;
				}
			?>
		<br>Your name: <input type="text" name="name" value="<?php if(array_key_exists("name",$_GET)){echo $_GET["name"];}?>">
		<table width="200" border="0">
			<tbody>
				<tr>
					<th scope="row">Date</th>
					<td><select name="day">
						<?php
							for($i=1;$i<=31;$i++){
								if($day==$i){
									print("<option selected>$i</option>");
								}else{
									print("<option>$i</option>");
								}
							}
						?>
						</select></td>
					<td><select name="month">
						<?php
							for($i=1;$i<=12;$i++){
								if($month==$i){
									print("<option selected>$i</option>");
								}else{
									print("<option>$i</option>");
								}
							}
						?>
						</select></td>
					<td><select name="year">
						<?php
							for($i=2000;$i<=2020;$i++){
								if($year==$i){
									print("<option selected>$i</option>");
								}else{
									print("<option>$i</option>");
								}
							}
						?>
						</select></td>
					</tr>
					<tr>
						<th scope="row">Time</th>
						<td><select name="hour">
							<?php
								for($i=0;$i<=23;$i++){
									if($hour==$i){
										print("<option selected>$i</option>");
									}else{
										print("<option>$i</option>");
									}
								}
							?>
							</select></td>
						<td><select name="min">
							<?php
								for($i=0;$i<=59;$i++){
									if($min==$i){
										print("<option selected>$i</option>");
									}else{
										print("<option>$i</option>");
									}
								}
							?>
							</select></td>
						<td><select name="sec">
							<?php
								for($i=0;$i<=59;$i++){
									if($sec==$i){
										print("<option selected>$i</option>");
									}else{
										print("<option>$i</option>");
									}
								}
							?>
							</select></td>
						</tr>
						<tr>
							<td align="right"><input type="submit" value="Submit"></td>
							<td align="left"><input type="reset" value="Reset"></td>
						</tr>
			</tbody>
		</table>
			<?php
				if(array_key_exists("name",$_GET)){
					$name = $_GET["name"];
					print("Hi $name!<br>");
					$fullmonth = array(1,3,5,7,8,10,12);
					$day = substr(str_repeat(0, 2).$day, - 2);		//This is
					$month = substr(str_repeat(0, 2).$month, - 2);	//to add leading 0
					$hour = substr(str_repeat(0, 2).$hour, - 2);	//before parameters
					$min = substr(str_repeat(0, 2).$min, - 2);		//if those parameters
					$sec = substr(str_repeat(0, 2).$sec, - 2);		//have only 1 digit
					print("You have choose to have an appointment on $hour:$min:$sec at $day/$month/$year<br><br>");
					print("More information<br>");
					if($hour>12){
						$hour = $hour-12;
						$hour = substr(str_repeat(0, 2).$hour, - 2);
						print("In 12 hours format, the time and date is $hour:$min:$sec PM, $day/$month/$year<br>");
					}else{
						print("In 12 hours format, the time and date is $hour:$min:$sec AM, $day/$month/$year<br>");
					}
					//check leap year
					if($month == 2){
						if($year%400==0){
							$day_check = 29;
						}
						else if($year%100==0){
							$day_check = 28;
						}
						else if($year%4==0){
							$day_check = 29;
						}
						else{
							$day_check = 28;
						}
					}else{
						if(in_array($month,$fullmonth) && $month != 2){
							$day_check = 31;
						}
						else{
							$day_check = 30;
						}
					}
					if($day<=$day_check) print("This month has $day_check days!");
					else print("This date is not exist!!!");
				}
			?>
		</form>
	</body>
</html>