<?php

	$link = mysql_connect('localhost', 'root', '');
        mysql_query("set character_set_server='utf8'");
         mysql_query("set names 'utf8'");
	@mysql_select_db('market',$link);	
?>