<?php

include_once("send_grid_api.php");

	if(isset($_POST["SupportByTime"]))
	{
		SendMail_SupportUsByTime($_POST['name'], $_POST['email'], $_POST['service'], $_POST['inspired']);
	}

	header("Location: /support-confirmation");

?>
