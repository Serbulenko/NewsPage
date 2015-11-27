<?php
	include("bd.php");

	$result = mysql_query("SELECT * FROM message ORDER BY id desc ");
	while($d = mysql_fetch_array($result))
	{	
		echo"<div class='messages'>";
		echo "<p>" . $d['send_date'] . "</p>
			  <p>" . $d['time'] . "</p>
			  <p>" . $d['report'] . "</p>";	
		echo "</div>";
	}
?>

