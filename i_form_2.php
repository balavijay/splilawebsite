
<?php


		
/**
 * Send a POST request without using PHP's curl functions.
 *
 * @param string $url The URL you are sending the POST request to.
 * @param array $postVars Associative array containing POST values.
 * @return string The output response.
 * @throws Exception If the request fails.
 */
function post($url, $postVars = array()){
    //Transform our POST array into a URL-encoded query string.
    $postStr = http_build_query($postVars);
    //Create an $options array that can be passed into stream_context_create.
    $options = array(
        'http' =>
            array(
                'method'  => 'POST', //We are using the POST HTTP method.
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postStr //Our URL-encoded query string.
            )
    );
    //Pass our $options array into stream_context_create.
    //This will return a stream context resource.
    $streamContext  = stream_context_create($options);
    //Use PHP's file_get_contents function to carry out the request.
    //We pass the $streamContext variable in as a third parameter.
    $result = file_get_contents($url, false, $streamContext);
    //If $result is FALSE, then the request has failed.
    if($result === false){
        //If the request failed, throw an Exception containing
        //the error.
        $error = error_get_last();
        throw new Exception('POST request failed: ' . $error['message']);
    }
    //If everything went OK, return the response.
    return $result;
}

$env = 'prod'; // test | prod

if ($env == 'test') {

    $instaURL = 'https://test.instamojo.com/api/1.1/payment-requests/';
    $instaKey = 'X-Api-Key:test_a7ec4451cb7c9cd74d9a31af10f';
    $instaAuth = 'X-Auth-Token:test_4fc9b7384874613537938b5cbb5';

} else {
    $instaURL = 'https://www.instamojo.com/api/1.1/payment-requests/';
    $instaKey = 'X-Api-Key:86feab5553f8a1c90aaaad5b9b6e872e';
    $instaAuth = 'X-Auth-Token:a7ac8e90506eafb023d39ed35a163e34';
}

try{

        $name     = $_POST['txtName'];
        $email    = $_POST['txtEmail'];
        $mobile   = $_POST['txtPhone'];
        $address  = $_POST['txtAddress'];
        $comments  = $_POST['txtComments'];
        $quantity  = $_POST['txtQuantity'];
        $amount    = $_POST['txtAmount'];

    
    
    
    // header('Location: https://www.instamojo.com/@SrilaPrabhupadaLila/');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $instaURL);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
                array($instaKey, $instaAuth));

    $payload = Array(
        'purpose' => 'Order for Book',
        'amount' => $amount,
        'phone' => $mobile,
        'buyer_name' => $name,
        'redirect_url' => 'https://www.srilaprabhupadalila.org/order-confirmation',
        'send_email' => true,
        'webhook' => '',
        'send_sms' => true,
        'email' => $email,
        'allow_repeated_payments' => true
    );

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 


    echo $response;

    $result = post('https://srilaprabhupadalila.com/v2/api/orders', array(
        'name'      => $name,
        'email'     => $email,
        'mobile'    => $mobile,
        'address'   => $address,
        'comments'  => 'Response from instamojo => ' . $response,
        'quantity'  => $quantity,
        'amount'    => $amount

    ));

    $responsejson = json_decode($response);
    echo "<br />";
    $pay_url = $responsejson->payment_request->longurl;

    session_start();
	$_SESSION['start'] = true;
    $_SESSION['pay_url'] = $pay_url;
    
    header('Location:' . $pay_url);


} catch(Exception $e){
    echo $e->getMessage();
}



?>