<?php
	$link = mysql_connect(HOST_NAME,USER_NAME,PASSWORD,DATABASE_NAME) or die("Couldn't connect to database");
	mysql_select_db(DATABASE_NAME,$link) or die(mysql_error());
	global $link;
?>