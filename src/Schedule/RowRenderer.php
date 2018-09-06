<?php

namespace CascadiaPHP\Site\Schedule;

use InvalidArgumentException;
use League\Plates\Engine;

class RowRenderer
{

    protected $talks;
    protected $dataFile;
    protected $plates;

    public const TYPE_SHORT_TALK = 'short';
    public const TYPE_TALK = 'talk';
    public const TYPE_KEYNOTE = 'keynote';
    public const TYPE_BREAK = 'break';
    public const TYPE_EVENT = 'event';
    public const TYPE_TITLE = 'title';

    public function __construct(Engine $plates, $dataFile = __DIR__ . '/../../resources/data/speakers.json')
    {
        $this->plates = $plates;
        $this->dataFile = $dataFile;
    }

    /**
     * Accepted formats:
     *
     * - Short talk: 'short:4'
     * - Regular talk: 'talk:4'
     * - Keynote: 'keynote:4'
     * - Break: 'break:Break title
     * - Event: 'event:Event title'
     *
     * ->renderRow([
     *     'short:4',
     *     'short:5',
     *     'talk:6',
     *     'talk:7'
     * ]);
     * ->renderRow([
     *     'break:3
     *
     * @param array $slot
     * @return string
     * @throws InvalidArgumentException
     */
    public function render(array $slot): string
    {
        $result = '';
        $pending = [];

        foreach ($slot as $items) {
            if (\is_array($items)) {
                $result .= $this->renderComplexItem($items);
                continue;
            }

            if (!is_string($items)) {
                throw new InvalidArgumentException('Invalid item type provided: ' . gettype($items));
            }

            [$type, $data] = $this->parseItem($items);

            // We can't have short talks in a slot other than in pairs of 2
            if ($type === 'short') {
                $pending[] = $items;

                if (count($pending) === 2) {
                    $result .= $this->renderComplexItem($pending);
                    $pending = [];
                }
                continue;
            }

            // Render the item as normal
            $result .= $this->renderItem($type, $data);
        }

        return $this->plates->render('fragment/schedule/row', [
            'talks' => $result
        ]);
    }

    /**
     * Parse incoming items into their parts
     * @param string $item
     * @return array
     */
    protected function parseItem(string $item)
    {
        return explode(':', $item, 2);
    }

    protected function renderItem(string $type, $data)
    {
        switch ($type) {
            case self::TYPE_SHORT_TALK:
            case self::TYPE_TALK:
            case self::TYPE_KEYNOTE:
                return $this->renderTalkItem($type, $data);

            case self::TYPE_EVENT:
            case self::TYPE_BREAK:
                return $this->renderEvent($type, $data);

            case self::TYPE_TITLE:
                return $this->renderTitle($type, $data);
        }

        throw new \InvalidArgumentException('Unknown type ' . $type);
    }

    protected function renderComplexItem(array $items)
    {
        $result = '';
        foreach ($items as $item) {
            [$type, $data] = $this->parseItem($item);

            $result .= $this->renderItem($type, $data);
        }

        return $this->plates->render('fragment/schedule/complex', [
            'talks' => $result
        ]);
    }

    protected function renderTalkItem(string $type, $id)
    {
        $talk = $this->fetchTalk($id);

        return $this->plates->render('fragment/schedule/talk', [
            'talk' => $talk,
            'type' => $type
        ]);
    }

    protected function renderTitle($type, $data)
    {
        [$day, $time] = explode(':', $data, 2);

        return $this->plates->render('fragment/schedule/title', [
            'day' => $day,
            'time' => $time
        ]);
    }

    protected function renderEvent($type, $data)
    {
        return $this->plates->render('fragment/schedule/event', [
            'type' => $type,
            'data' => $data
        ]);
    }

    protected function fetchTalk($id): array
    {
        if (is_numeric($id)) {
            // If we have an ID, use that to match
            $id = (int) $id;

            $result = $this->allTalks(function($talk) use ($id) {
                return $id === $talk['id'];
            })->current();
        } elseif (is_string($id)) {
            if ($id[0] !== '/') {
                $id = "/$id/i";
            }

            // Otherwise use regex to match against the title
            $result = $this->allTalks(function ($talk) use ($id) {
                return preg_match($id, $talk['talk']);
            })->current();
        }

        if (!$result) {
            throw new \InvalidArgumentException('Unable to match talk to "' . $id . '"');
        }

        return $result;
    }

    protected function allTalks(callable $filter = null)
    {
        $data = $this->getData();

        foreach ($data['speakers'] as $talk) {
            if (!$filter || $filter($talk)) {
                yield $talk;
            }
        }
    }

    public function getData()
    {
        if (!$this->talks) {
            $this->talks = json_decode(file_get_contents($this->dataFile), true);
        }

        return $this->talks;
    }

}
