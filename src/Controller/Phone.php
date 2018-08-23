<?php

namespace CascadiaPHP\Site\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Twilio\Rest\Client;
use Twilio\Twiml;
use Zend\Diactoros\Response\XmlResponse;

class Phone extends Controller
{

    public function sms(Client $client, ServerRequestInterface $request)
    {
        // Configure our number
        $twilio_number = getenv("TWILIO_NUMBER");

        // Staff on call
        $private_number = $this->getNumberToForwardTo();

        // Where to send a text message (your cell phone?)
        $to_number = $private_number;

        $query = $request->getParsedBody();
        $from_number = $query['from'] ?? $query['From'] ?? '';
        $from_body = $query['body'] ?? $query['Body'] ?? '';

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
    }

    public function voice(Twiml $markupFactory)
    {
        // A Twilio number you own with SMS capabilities
        $twilio_number = getenv("TWILIO_NUMBER");

        // Staff on call
        $private_number = $this->getNumberToForwardTo();

        $markupFactory->say('To provide the best outcome possible for code of conduct violations, all calls will be recorded. If you do not wish to be recorded, please hang up and speak with someone at the check in table, or send a text to this number.', ['voice' => 'alice']);
        $markupFactory->dial($private_number, ['callerId' => $twilio_number, 'record' => 'record-from-answer-dual']);
        $markupFactory->say('Goodbye', ['voice' => 'alice']);

        return new XmlResponse((string) $markupFactory, 200);
    }

    public function getNumberToForwardTo()
    {
        $staff = json_decode(getenv('STAFF_CONTACT'), true);

        if (!$staff) {
            throw new \RuntimeException('No staff available.');
        }

        return array_shift($staff)[0]['mobileNumber'] ?? null;
    }

}
