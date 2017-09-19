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
        $speech="<speak> One second <break time="3s"/> OK, I have used the best quantum processing algorithms known to computer science! Your silly name is $color $number. I hope you like it. <audio src=https://www.partnersinrhyme.com/files/sounds1/WAV/sports/baseball/Ball_Hit_Cheer.wav></audio> </speak>";
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
