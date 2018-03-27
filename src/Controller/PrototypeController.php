<?php

namespace CascadiaPHP\Site\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Uri;

class PrototypeController
{

    /** @var Engine */
    protected $templates;

    public function __construct(Engine $templates)
    {
        $this->templates = $templates;
    }

    public function home(ServerRequestInterface $request)
    {
        $variation = $request->getQueryParams()['v'] ?? '';

        try {
            return $this->templates->render('home' . $variation);
        } catch (\Exception $e) {
            return new Response\RedirectResponse('/');
        }
    }

    public function subscribe(ServerRequestInterface $request)
    {
        return $this->templates->render('subscribe');
    }

    public function handleSubscription(ServerRequestInterface $request, Client $client): ResponseInterface
    {
        $params = $request->getParsedBody();
        // Handle honeypot
        if (!isset($params['my_name']) || !$params['my_name']) {
            if (($error = $this->processRequest($request, $client)) !== null) {
                // Output the error if there was one
                return new JsonResponse(['message' => $error], 400);
            }
        }

        // Just return a blank response if things went well
        return new JsonResponse([]);
    }

    private function processRequest(ServerRequestInterface $request, Client $client): ?string
    {
        // Set up the default mailchimp api url with simple auth
        $uri = new Uri('https://user:' . getenv('MAILCHIMP_API_KEY') . '@us12.api.mailchimp.com');

        // Pull the email from the request params
        $params = $request->getParsedBody();
        $email = strtolower($params['email'] ?? '');

        if (!$email) {
            return 'Hmm.. I didn\'t see an email come through, please try again.';
        }

        // Check user signup status
        try {
            $status = $client->get($uri->withPath('/3.0/lists/60fb4ba7b8/members/' . md5($email)));

            if ($status->getStatusCode() === 200) {
                return 'No worries, looks like you were already subscribed!';
            }
        } catch (ClientException $exception) {
            if ($exception->getCode() !== 404) {
                return '';
            }
        }

        // If we get this far, we got a 404 from the member check
        // Sign up the user

        try {
            // Forward the signup request
            /*$result = $client->post($uri->withPath('/3.0/lists/60fb4ba7b8/members'), [
                RequestOptions::JSON => [
                    'email_address' => $email,
                    'status' => 'subscribed'
                ]
            ]);*/
        } catch (ClientException $e) {
            if ($e->getCode() === 400) {
                return $e->getResponse()->getBody()->getContents();
                return 'This email address doesn\'t look valid, please try again with a different one.';
            }
        }

        return null;
    }

}
