<?php
function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => '<speak>
      <audio src=https://vocaroo.com/i/s1Hx6owg7uHq></audio></speak>',
            "displayText" => "Hello from webhook",
            "contextOut" => array()
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
