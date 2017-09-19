<?php
$method=$_SERVER['REQUEST_METHOD'];

//Process only when method is post
if($method=="POST")
{
  $requestBody=file_get_contents('php://input');
  $json=json_decode($requestBody);
  $text=$json->result->parameters->text;
  switch($text)
  {
    case 'hi':
      $speech="Hi,Nice to meet you";
      break;
      case 'bye':
        $speech="<speak>
      <audio src=https://examaple.com/wav/Dtmf-1.wav></audio></speak>";
        break;
        case 'anything':
          $speech="Yes,you can type anything here";
          break;
          default:
            $speech="Sorry,I didnt get that .Please ask me something else";
            break;
  }
  $response=new \stdClass();
  $response->speech=$speech;
  $response->displayText=$speech;
  $response->source="webhook";
  $response->data="google:{
        expect_user_response: true,
        is_ssml: true
      }";
  
    echo(json_encode($response));
    
}
else{
  echo("Method not Allowed");
}






?>
