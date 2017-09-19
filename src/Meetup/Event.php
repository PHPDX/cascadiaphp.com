<?php

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
