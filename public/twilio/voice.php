<?php
if (empty($_REQUEST)) {
    echo "no access";
    exit;
}
// Get the PHP helper library from https://twilio.com/docs/libraries/php
$base_dir = __DIR__ . '/../..';
require $base_dir . '/vendor/autoload.php';
use Twilio\TwiML;
$dotenv = new Dotenv\Dotenv($base_dir);
$dotenv->load();

$twilio_number = $_ENV["TWILIO_NUMBER"];
$private_number = json_decode($_ENV["STAFF_CONTACT"])->staff[0]->mobileNumber;

try {
    $response = new TwiML();
} catch (Exception $e) {
    $response = "Unable to create a Twilio connection";
}
try {
    $response->say('To provide the best outcome possible for code of conduct violations, all calls will be recorded. If you do not wish to be recorded, please hang up and speak with someone at the check in table, or send a text to this number.', ['voice' => 'alice']);
    $response->dial($private_number, ['callerId' => $twilio_number, 'record' => 'record-from-answer-dual']);
    $response->say('Goodbye', ['voice' => 'alice']);
} catch (Exception $e) {
    $response->say('Voice Call Unavailable. For code of conduct violations, please try sending a text to this number, visit the check in table, or find any staff member.', ['voice' => 'alice']);
}

echo $response;