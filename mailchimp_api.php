<?php

function Mailchimp_subscribe($name, $email)
{
		// MailChimp API credentials
        $apiKey = '9cde1b8ec4f484807f4b3b7a152f7a46-us20';
        $listID = '024ecf8806';
        
        // MailChimp API URL
        $memberID = md5(strtolower($email));
        $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

	error_log($url);	
        // member information
        $json = json_encode([
            'email_address' => $email,
            'status_if_new'        => 'subscribed',
            'merge_fields'  => [
                'NAME'     => $name
            ]
        ]);
        
        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

/*
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = substr($result, 0, $header_size);
	$body = substr($result, $header_size);

	error_log($header);
	error_log($body);
	error_log($result);
 */
        curl_close($ch);

	if ($httpCode == 200)
		return true;

	error_log("mailchimp failed:$name - $httpCode");

	return $httpCode;
}
?>

