<?php
header( 'Content-type: text/xml' );
mysql_connect( 'localhost:/tmp/mysql.sock', 'root', '' );
mysql_select_db( 'chat' );
if ( $_REQUEST['past'] ) {
	$result = mysql_query('SELECT * FROM chatitems WHERE id > '.
		mysql_real_escape_string( $_REQUEST['past'] ).
		' ORDER BY added LIMIT 50');
} else {
	$result = mysql_query('SELECT * FROM chatitems ORDER BY added LIMIT 50' );    
}
?>
<chat>
<?php
while ($row = mysql_fetch_assoc($result)) {
?>
	<message added="<?php echo( $row['added'] ) ?>" id="<?php echo( $row['id'] ) ?>">
	<user><?php echo( htmlentities( $row['user'] ) ) ?></user>
	<text><?php echo( htmlentities( $row['message'] ) ) ?></text>
</message>
<?php
}
mysql_free_result($result);
?>
</chat>
