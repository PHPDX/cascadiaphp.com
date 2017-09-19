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
        $now = new DateTime('now', new DateTimeZone('PST'));
        $diff = $now->diff($when, true);
        $noun = null;

        // Handle today and tomorrow
        switch ($diff->days) {
            case 0:
                $noun = 'Today';
                if ($when->format('G') > 16) {
                    $noun = 'Tonight';
                }
                break;
            case 1:
                $noun = 'Tomorrow';
        }

        // If we have a noun to use
        if ($noun) {
            return $noun . ' at ' . $when->format('g:i A');
        }

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
