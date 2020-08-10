
<?php



$url = 'https://srilaprabhupadalila.com/v2/api/feedback?query_id=' . $_POST['type'];
$data = array('name' =>  $_POST['name'], 'email' => $_POST['email'], 'title' => $_POST['title'] , 'description' => $_POST['description']);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);

header("Location: /share-confirmation");

?>