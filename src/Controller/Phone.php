<?php

namespace CascadiaPHP\Site\Controller;

use Twilio\Rest\Client;
use Twilio\TwiML;

class Phone extends Controller
{

    public function sms()
    {
        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = $_ENV["TWILIO_SID"];
        $auth_token = $_ENV["TWILIO_TOKEN"];

        // A Twilio number you own with SMS capabilities
        $twilio_number = $_ENV["TWILIO_NUMBER"];
        // Staff on call
        $private_number = json_decode($_ENV["STAFF_CONTACT"])->staff[0]->mobileNumber;
        // Where to send a text message (your cell phone?)
        $to_number = $private_number;

        $from_number = $_REQUEST['From'];
        $from_body = $_REQUEST['Body'];

        $client = new Client($account_sid, $auth_token);
        if ($from_number == $private_number) {
            list($to_number, $from_body) = explode(':', $from_body);
        } else {
            $from_body = sprintf('%s: %s', $from_number, $from_body);
        }
        // For trial must come FROM twilio number
        $from_number = $twilio_number;
        $client->messages->create(
            $to_number,
            array(
                'from' => $from_number,
                'body' => $from_body
            )
        );
        return;
    }

    public function voice()
    {
        // A Twilio number you own with SMS capabilities
        $twilio_number = $_ENV["TWILIO_NUMBER"];
        // Staff on call
        $private_number = json_decode($_ENV["STAFF_CONTACT"])->staff[0]->mobileNumber;

        $response = new TwiML();
        $response->say('To provide the best outcome possible for code of conduct violations, all calls will be recorded. If you do not wish to be recorded, please hang up and speak with someone at the check in table, or send a text to this number.', ['voice' => 'alice']);
        $response->dial($private_number, ['callerId' => $twilio_number, 'record' => 'record-from-answer-dual']);
        $response->say('Goodbye', ['voice' => 'alice']);

        return;
    }

}
