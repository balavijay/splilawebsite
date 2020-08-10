<?php

require '/var/www/html/v2/vendor/autoload.php';

function SPL_sendMail($from_email, $from_displayName, $to, $subject, $body)
{
	$email = new \SendGrid\Mail\Mail();
	$email->setFrom($from_email, $from_displayName);
	$email->setSubject($subject);
	$email->addTo($to);
	
	$email->addContent("text/plain", "$body");
	$email->addContent("text/html", "$body");
	
	$sendgrid = new \SendGrid("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");
	
	try {
		$response = $sendgrid->send($email);
	} catch (Exception $e) {
		//echo 'Caught exception: ',  $e->getMessage(), "\n";
		/* TODO log error */
	}
	
}

function SendMail_subscribe($email)
{
	$sub = "Subscribe Request by $email";

	$body = 
		"Hare Krishna, <br><br>
		<b>$email</b> wants to subscribe for news letter.<br><br>
		In Service of His Divine Grace<br>
		A.C Bhaktivedanta Swami Srila Prabhupada,<br>
		Srila Prabhupada Lila Team";
	  
//	SPL_sendMail("support@srilaprabhupadalila.org", "Srila Prabhupada Lila Newsletter",
//`			"srilaprabhupadalila@gmail.com", $sub, $body);
		
	SPL_sendMail("newsletter@srilaprabhupadalila.org", "Srila Prabhupada Lila Newsletter",
			"srilaprabhupadalila@gmail.com", $sub, $body);
}


function SendMail_SupportUsByTime($name, $email, $service, $inspired)
{
	$sub = "Volunteer Service Request";

	$body = 
		"
		Name:<b>$name </b><br>
		Email: $email <br>
		Service: $service <br>
		Inspired: $inspired
		";
	  
//	SPL_sendMail("support@srilaprabhupadalila.org", "Srila Prabhupada Lila Newsletter",
//`			"srilaprabhupadalila@gmail.com", $sub, $body);
		
	SPL_sendMail("newsletter@srilaprabhupadalila.org", "Srila Prabhupada Lila Web",
			"srilaprabhupadalila@gmail.com", $sub, $body);

}




?>
