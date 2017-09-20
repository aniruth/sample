<?php
function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        
        $msg=`<speak>
    Tone one
    <audio src="https://vocaroo.com/i/s1Hx6owg7uHq"></audio>
    </speak>`;
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => $msg,
            "displayText" => "Hello from webhook",
            "contextOut" => array(),
            "data"=>array('google'->array('expect_user_response'->true,'is_ssml'->true))
        ));
    }
}
 
function sendMessage($parameters) {
    echo json_encode($parameters);
}
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}






?>
