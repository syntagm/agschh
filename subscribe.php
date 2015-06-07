<?php
$apiKey = '01e7bb5e29ad17b9eb98cf1b7ced16d1-us1'; /* <== Change the API Key */
$listId = '4863e5c6b1'; /* <== Change the List ID */
$double_optin=true;
$send_welcome=true;
$email_type = 'html';
$email = $_POST['email'];
$submit_url = "http://us1.api.mailchimp.com/1.3/?method=listSubscribe"; /* <== Replace "us8" with your actual datacenter */
$data = array(
    'email_address'=>$email,
    'apikey'=>$apiKey,
    'id' => $listId,
    'double_optin' => $double_optin,
    'send_welcome' => $send_welcome,
    'email_type' => $email_type
);
$payload = json_encode($data);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
 
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
    echo $data->error;
} else {
    echo "Got it, you've been added to our email list.";
}
?>