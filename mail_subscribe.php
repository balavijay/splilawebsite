<?php

include_once("send_grid_api.php");
include_once("mailchimp_api.php");

	if(isset($_POST['email']))
	{

		SendMail_subscribe($_POST['email']);

		Mailchimp_subscribe($_POST['name'], $_POST['email']);
	}

	header("Location: /mail-confirmation");

?>
