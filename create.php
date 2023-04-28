<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$USER = filter_input(INPUT_POST, "DB_USER");

	$DB_NAME = filter_input(INPUT_POST, "DB_NAME");
	
	$DB_PASSWORD = filter_input(INPUT_POST, "DB_PASSWORD");

	$DOMAIN = filter_input(INPUT_POST, "DOMAIN");

@exec(sudo bash create.sh $DOMAIN $USER $DB_NAME $DB_PASSWORD)

}
?>

<form method="post'>
	<div>
		<label>DB_NAME</label>
		<input type="password" name="DB_PASSWORD" placeholder="Password" required>
		<input name="DB_NAME" placeholder="Name" required>
		<input name="DOMAIN" placeholder="Domain" required>
		<input name="USER" placeholder"User" required>
	</div>
<input type="submit" value="Send Request" />
</form>
