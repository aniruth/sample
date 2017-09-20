<?php
$method=$_SERVER['REQUEST_METHOD'];

//Process only when method is post
if($method=="POST")
{
  $requestBody=file_get_contents('php://input');
  $json=json_decode($requestBody);
  $text=$json->result->parameters->text;
//   switch($text)
//   {
//     case 'hi':
//       $speech="Hi,Nice to meet you";
//       break;
//       case 'bye':
//         $speech="<speak>
//       <audio src=https://vocaroo.com/i/s0sROf0pL7RI></audio></speak>";
//         break;
//         case 'anything':
//           $speech="Yes,you can type anything here";
//           break;
//           default:
//             $speech="Sorry,I didnt get that .Please ask me something else";
//             break;
//   }
  
  $speech='<speak>
      <audio src=https://vocaroo.com/i/s0sROf0pL7RI></audio></speak>';
  
  $response1= array(
    'google' => array(
        'expect_user_response': true,
        'is_ssml': true
    )
);    

$obj = new stdClass();
$obj->speech=$speech;
$obj->data = $response1;

echo json_encode($obj);


//   $response->speech=$speech;
//   //$response->source="webhook";
//   $response->data='google:{
//         "expect_user_response": true,
//         "is_ssml": true
//       }';  
    
}
else{
  echo("Method not Allowed");
}






?>
