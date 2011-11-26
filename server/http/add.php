<?php
header( 'Content-type: text/xml' );
mysql_connect( '/var/lib/mysql/mysql.sock', 'root', '' );
mysql_select_db( 'chat' );
mysql_query( "INSERT INTO chatitems VALUES ( null, null, '".
	    mysql_real_escape_string( $_REQUEST['user'] ).
		    "', '".
			    mysql_real_escape_string( $_REQUEST['message'] ).
				    "')" );
?>
<success />
