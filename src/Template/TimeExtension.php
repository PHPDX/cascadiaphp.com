<?php

namespace PHPDX\Site\Template;

use DateTime;
use DateTimeZone;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class TimeExtension implements ExtensionInterface
{

    public function register(Engine $engine)
    {
        $engine->registerFunction('time', [$this, 'instance']);
    }

    /**
     * Return an instance of this class
     * @return \PHPDX\Site\Template\TimeExtension
     */
    public function instance(): TimeExtension
    {
        return $this;
    }

    /**
     * Simple function to return "today" and "tomorrow" instead of the date
     * @param \DateTime $when
     * @return string
     */
    public function when(DateTime $when)
    {
        // Return a simple format
        return $this->format($when);
    }

    /**
     * Format a DateTime object
     *
     * @param \DateTime $when
     * @param string $format
     * @return string
     */
    public function format(DateTime $when, $format = 'M jS Y \a\t g:i A')
    {
        return $when->format($format);
    }

}
