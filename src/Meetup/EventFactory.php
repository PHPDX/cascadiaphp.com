<?php

namespace PHPDX\Site\Meetup;

class EventFactory
{

    public function fromResponse(array $data)
    {
        $offset = $data['utc_offset'] ?? 0;
        return (new Event())
            ->setName($data['name'] ?? '')
            ->setDescription($data['description'] ?? '')
            ->setDirections($data['how_to_find_us'] ?? '')
            ->setVenue($data['venue'])
            ->setAnnounced($data['announced'] ?? 'false' === 'true')
            ->setCreated($this->date($data['created'] ?? 0, $offset))
            ->setUpdated($this->date($data['updated'] ?? 0, $offset))
            ->setTime($this->date($data['time'] ?? 0, $offset))
            ->setHeadcount($data['headcount'] ?? 0)
            ->setYesCount($data['yes_rsvp_count'] ?? 0)
            ->setMaybeCount($data['maybe_rsvp_count'] ?? 0)
            ->setWaitlistCount($data['waitlist_count'] ?? 0)
            ->setUrl($data['event_url'] ?? '')
            ->setVisibility($data['visibility']);
    }

    private function date($param, $offset)
    {
        $date = new \DateTime('now');
        $date->setTimestamp($param / 1000);
        $date->setTimezone(new \DateTimeZone('PST'));
        return $date;
    }
}
