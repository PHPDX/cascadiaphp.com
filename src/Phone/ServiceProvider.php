<?php
namespace CascadiaPHP\Site\Phone;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Twilio\Rest\Client;

class ServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        Client::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $this->container->add(Client::class, function() {
            return new Client(
                getenv('TWILIO_SID'),
                getenv('TWILIO_TOKEN'));
        });
    }
}