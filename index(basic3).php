<?php
	session_start();
	require("connection.php");
?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Advanced Assignment (BASIC 3)</title>
	<link rel="stylesheet" type="text/css" href="css(php)/php(advanced)basic3.css">

</head>
<body>
<div id="gold"><p>Your Gold:</p></div>
	<table id="yourgold" border=1 >

		<tr>
			<td>
<?php
				$start= "Score = 0";
				echo $start;
				if(isset($_SESSION['sum']))
				{	
					foreach($_SESSION['sum'] as $sum)
					{
						$start=$sum;
						echo $sum;
					}
				}

?>

			</td>
		</tr>
	</table>
	<h1>Tell your ninja where to go get gold from!</h1>
	<div id="ninjap">
		<img id="ninjapic" src="images(php)/3_ninja.png" alt="ninja">
		<img id="ninjapic" src="images(php)/3_ninja.png" alt="ninja">
		<img id="ninjapic" src="images(php)/3_ninja.png" alt="ninja">
		<img id="ninjapic" src="images(php)/3_ninja.png" alt="ninja">
	</div>
	<table id="table" border=1>
		<tr>
			<td>
				<form action="process.php" method="post">
					<img class="imgborder" src="images(php)/farm.png" alt="farm">
					<input type="hidden" name="building" value = "Farm"/>
					<p>FARM (10-20 points)</p>
					<input class="goldbutton" type="submit" value ="Find Gold!"/>
				</form>
			</td>
			<td>
				<form action="process.php" method="post">
					<img class="imgborder" src="images(php)/cave.png" alt="cave">
					<input type="hidden" name="building" value = "Cave"/>
					<p>CAVE (5-20 points)</p>
					<input class="goldbutton" type="submit" value ="Find Gold!"/>
				</form>
			</td>
			<td>
				<form action="process.php" method="post">
					<img class="imgborder" src="images(php)/house.png" alt="house">
					<input type="hidden" name="building" value = "House"/>
					<p>HOUSE(2-5 points)</p>
					<input class="goldbutton" type="submit" value ="Find Gold!"/>
				</form>
			</td>
			<td>
				<form action="process.php" method="post">
					<img class="imgborder" src="images(php)/casino.png" alt="casino">
					<input type="hidden" name="building" value = "Casino"/>
					<p>CASINO(negative 50 to 50 points! Bad choice!)</p>
					<input class="goldbutton" type="submit" value ="Find Gold!"/>
				</form>
			</td>
			<td>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value = "restart"/>
					<input id="restart" type="submit" value ="RESTART"/>
				</form>
			</td>
		</tr>
	</table>

	<div class="scroll">
<?php

if(isset($_SESSION['fetchall']))
{
	foreach($_SESSION['fetchall'] as $fetch)
	{
		if($fetch['gold']<0)
		{
			echo "<p><span class='red'>You entered a {$_SESSION['entered']} and lost ".abs($fetch['gold'])." bars, sucks for you! (".$fetch['created_at'].")</span></p>";
		}
		else
		{
			echo "<p><span class='green'>You entered a {$_SESSION['entered']} and gained ".$fetch['gold']." bars, you're a richer ninja now! (".$fetch['created_at'].")</span></p>";
		}
	}
}

if(isset($_SESSION['newgame']))
{
unset($_SESSION['fetchall']);
unset($_SESSION['sum']);
echo "<p>Tell your ninja where to go!<p>";
}
?>

	</div>

</body>

</html>