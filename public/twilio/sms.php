<?php
if (empty($_REQUEST['Body'])) {
    echo "no access";
    exit;
}
// Get the PHP helper library from https://twilio.com/docs/libraries/php
$base_dir = __DIR__ . '/../..';
require $base_dir . '/vendor/autoload.php';
use Twilio\Rest\Client;
$dotenv = new Dotenv\Dotenv($base_dir);
$dotenv->load();

// Your Account SID and Auth Token from twilio.com/console
$account_sid = $_ENV["TWILIO_SID"];
$auth_token = $_ENV["TWILIO_TOKEN"];
// A Twilio number you own with SMS capabilities
$twilio_number = $_ENV["TWILIO_NUMBER"];
$private_number = json_decode($_ENV["STAFF_CONTACT"])->staff[0]->mobileNumber;
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
// Where to send a text message (your cell phone?)
    $to_number,
    array(
        'from' => $from_number,
        'body' => $from_body
    )
);
