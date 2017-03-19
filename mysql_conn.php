<?php
	$con = mysql_connect("localhost","root","wang");
	mysql_query("set names 'utf8'");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	 mysql_select_db("TalkOnline", $con);

?>