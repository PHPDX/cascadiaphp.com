<?php
namespace CascadiaPHP\Tests;

use CascadiaPHP\Site\Controller\Phone;
use CascadiaPHP\Site\Testing\TestCase;
use League\Container\Container;
use League\Plates\Engine;
use Mockery as M;
use Psr\Http\Message\ServerRequestInterface;
use Twilio\Rest\Api\V2010\Account\MessageList;
use Twilio\Rest\Client;
use Zend\Diactoros\Response\XmlResponse;
use Zend\Diactoros\ServerRequest;

class PhoneTest extends TestCase
{

    /**
     * @beforeClass
     */
    public static function setEnv()
    {
        putenv('TWILIO_NUMBER=5558675309');
        putenv('TWILIO_TOKEN=T0K3N');
        putenv('TWILIO_SID=56789');
        putenv('STAFF_CONTACT=[{"id":"1","firstName":"First","lastName":"Last","mobileNumber":"1112223456"}]');
    }

    public function testSms()
    {
        $templateEngine = M::mock(Engine::class);
        $container = M::mock(Container::class);

        $messageList = M::mock(MessageList::class);
        $twilioClient = M::mock(Client::class);
        $twilioClient
            ->shouldAllowMockingProtectedMethods()
            ->shouldReceive('getMessages')->andReturn($messageList);

        /** @var ServerRequestInterface $testRequest */
        $testRequest = M::mock(new ServerRequest());
        $testRequest = $testRequest->withParsedBody([
            'From' => '5551112345',
            'Body' => 'Red Alert!'
        ]);

        // Make sure we create a new message with the expected content
        $messageList->shouldReceive('create')->withArgs([
            '1112223456',
            [
                'from' => '5558675309',
                'body' => '5551112345: Red Alert!'
            ]
        ]);

        // Run the test
        $phone = new Phone($templateEngine, $container);
        $phone->sms($twilioClient, $testRequest);
    }

    public function testPhone()
    {
        $templateEngine = M::mock(Engine::class);
        $container = M::mock(Container::class);

        // Mock out our expected calls
        $markupFactory = M::mock(\Twilio\Twiml::class);

        // Make sure we say something
        $markupFactory->shouldReceive('say')->withAnyArgs();

        // Make sure the caller number flows through and the contact is the first staff member
        $markupFactory->shouldReceive('dial')->withArgs(function ($number, $details) {
            return $number === '1112223456' && $details['callerId'] === '5558675309';
        });

        // Run the test
        $phone = new Phone($templateEngine, $container);
        $result = $phone->voice($markupFactory);

        // Make sure we get the expected output
        $this->assertInstanceOf(XmlResponse::class, $result);
    }
}