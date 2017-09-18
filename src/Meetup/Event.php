<?php
/**
 * array (size=18)
'utc_offset' => int -25200000
'headcount' => int 0
'visibility' => string 'public' (length=6)
'waitlist_count' => int 0
'created' => int 1491809943000
'maybe_rsvp_count' => int 0
'description' => string '<p>There will be food and participation, so bring a computer!</p> <p>PHP TestFest seeks to create more PHP core contributors by introducing PHP programmers to the PHP language test suite, teaching them how to write phpttests. From September through December, 2017, groups worldwide will meet physically or virtually to learn how to write and contribute phpt tests. You don’t have to be a C genius—in fact, you don’t need to know C at all to contribute.<a href="https://phptestfest.org/start/#fn:phpcore'... (length=1046)
'how_to_find_us' => string 'If you can't get in, please call/message 928-486-5172' (length=53)
'event_url' => string 'https://www.meetup.com/PDX-PHP/events/242705275/' (length=48)
'yes_rsvp_count' => int 11
'announced' => boolean true
'name' => string 'PHP TestFest!' (length=13)
'id' => string 'bdbmwmywmbzb' (length=12)
'time' => int 1505871000000
'updated' => int 1505758775000
'group' =>
array (size=8)
'join_mode' => string 'open' (length=4)
'created' => int 1366411187000
'name' => string 'PHPDX' (length=5)
'group_lon' => float -122.69000244141
'id' => int 8138812
'urlname' => string 'PDX-PHP' (length=7)
'group_lat' => float 45.5
'who' => string 'Developers' (length=10)
'status' => string 'upcoming' (length=8)
 */

namespace PHPDX\Site\Meetup;

use DateTime;

class Event
{

    protected $venue = [];
    protected $headcount = 0;
    protected $waitlistCount = 0;
    protected $visibility;
    protected $time;
    protected $updated;
    protected $created;
    protected $maybeCount;
    protected $yesCount;
    protected $announced;
    protected $name;
    protected $id;
    protected $description;
    protected $directions;
    protected $url;

    /**
     * @return array
     */
    public function getVenue(): array
    {
        return $this->venue;
    }

    /**
     * @param array $venue
     * @return Event
     */
    public function setVenue(array $venue): Event
    {
        $this->venue = $venue;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeadcount(): int
    {
        return $this->headcount;
    }

    /**
     * @param int $headcount
     * @return Event
     */
    public function setHeadcount(int $headcount): Event
    {
        $this->headcount = $headcount;
        return $this;
    }

    /**
     * @return int
     */
    public function getWaitlistCount(): int
    {
        return $this->waitlistCount;
    }

    /**
     * @param int $waitlistCount
     * @return Event
     */
    public function setWaitlistCount(int $waitlistCount): Event
    {
        $this->waitlistCount = $waitlistCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param string $visibility
     * @return Event
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTime(): DateTime
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     * @return Event
     */
    public function setTime(DateTime $time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     * @return Event
     */
    public function setUpdated(DateTime $updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return Event
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaybeCount(): int
    {
        return $this->maybeCount;
    }

    /**
     * @param int $maybeCount
     * @return Event
     */
    public function setMaybeCount(int $maybeCount)
    {
        $this->maybeCount = $maybeCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getYesCount(): int
    {
        return $this->yesCount;
    }

    /**
     * @param int $yesCount
     * @return Event
     */
    public function setYesCount(int $yesCount)
    {
        $this->yesCount = $yesCount;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAnnounced(): bool
    {
        return $this->announced;
    }

    /**
     * @param bool $announced
     * @return Event
     */
    public function setAnnounced(bool $announced)
    {
        $this->announced = $announced;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Event
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirections()
    {
        return $this->directions;
    }

    /**
     * @param string $directions
     * @return Event
     */
    public function setDirections($directions)
    {
        $this->directions = $directions;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Event
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
