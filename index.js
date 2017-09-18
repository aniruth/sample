var apiaiAssistant = require ('actions-on-google').ApiAiAssistant;

//Intents
const WELCOMEINTENT = 'input.welcome';
const ORDER_STATUS = ‘input.orderstatus’;

//Entities
const ORDERID = 'orderid';

//Functions
function welcomeIntent(assistant) {
    assistant.ask("With EShopping, you can get the product order status);
}

function trackOrderStatus(assistant) {
var orderidfromuser = assistant.getArgument(ORDERID);
var orderStatusMessage = "";
var orderDescription = "Your order" + orderidfromuser + "is";  
 
    if (orderidfromuser != null) { 
        assistant.ask (orderStatusMessage + "\n" +"is Available");
    }

    else {
        assistant.ask("please provide valid order id to check your order status");
    }
} 
exports.agent = function (request, response) {
    var assistant = new ApiAiAssistant({request: request, response: response});
    var actionMap = new Map ();
    actionMap.set(WELCOMEINTENT, WelcomeIntent);
    actionMap.set(ORDER_STATUS, trackOrderStatus);
    assistant.handleRequest(actionMap);
};
