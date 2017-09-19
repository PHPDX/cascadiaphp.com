<?php

namespace PHPDX\Site\Meetup;

class EventFactory
{

    /**
     * Create an event from a meetup api response
     * @param array $data
     * @return \PHPDX\Site\Meetup\Event
     */
    public function fromResponse(array $data)
    {
        return (new Event())
            ->setName($data['name'] ?? '')
            ->setDescription($data['description'] ?? '')
            ->setDirections($data['how_to_find_us'] ?? '')
            ->setVenue($data['venue'])
            ->setAnnounced($data['announced'] ?? 'false' === 'true')
            ->setCreated($this->date($data['created'] ?? 0))
            ->setUpdated($this->date($data['updated'] ?? 0))
            ->setTime($this->date($data['time'] ?? 0))
            ->setHeadcount($data['headcount'] ?? 0)
            ->setYesCount($data['yes_rsvp_count'] ?? 0)
            ->setMaybeCount($data['maybe_rsvp_count'] ?? 0)
            ->setWaitlistCount($data['waitlist_count'] ?? 0)
            ->setUrl($data['event_url'] ?? '')
            ->setVisibility($data['visibility']);
    }

    /**
     * Create a date object from a meetup api response
     * @param $param
     * @return \DateTime
     */
    private function date($param)
    {
        $date = new \DateTime('now');
        $date->setTimestamp($param / 1000);
        $date->setTimezone(new \DateTimeZone('america/los_angeles'));
        return $date;
    }
}
