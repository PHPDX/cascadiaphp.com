<?php

namespace CascadiaPHP\Site\Console;

use function array_combine;
use Concrete\Core\Console\Command;
use Concrete\Core\Express\ObjectManager;
use Concrete\Core\File\Importer;
use Iterator;
use League\Csv\Reader;
use function pathinfo;

class ImportSpeakersCommand extends Command
{

    protected $signature = 'import:speakers {csv : The file to import from} {--d|dry-run : Run without actually importing}';

    public function handle(ObjectManager $express)
    {
        foreach ($express->getList('speaker') as $entry) {
            $express->deleteEntry($entry->getID());
        }
        foreach ($express->getList('talk') as $entry) {
            $express->deleteEntry($entry->getID());
        }

        $cache = [];

        foreach ($this->loadCsv() as $row) {
            /** @var \Concrete\Core\Express\EntryBuilder $talk */
            $talk = $express->buildEntry('talk');
            $talk->setAttribute('talk_title', $row['talk title'] ?? '');
            $talk->setAttribute('talk_description', $row['talk description'] ?? '');
            $talk->setAttribute('talk_type', $row['talk type'] ?? '50 Minute');
            $this->output->writeln("Adding Talk {$row['Talk Title']}");
            $talk = $talk->save();

            $speaker = $cache[$row['first'] . '_' . $row['last']] ?? null;
            if (!$speaker) {
                /** @var \Concrete\Core\Express\EntryBuilder $entry */
                $entry = $express->buildEntry('speaker');
                $entry->setAttribute('first_name', $row['first'] ?? '');
                $entry->setAttribute('last_name', $row['last'] ?? '');
                $entry->setAttribute('twitter_handle', $row['twitter'] ?? '');
                $entry->setAttribute('email', $row['email'] ?? '');
                $entry->setAttribute('company', $row['company'] ?? '');
                $entry->setAttribute('bio', $row['bio'] ?? '');
                $this->output->writeln("Adding Speaker {$row['twitter']}");
                $speaker = $entry->save();
                $cache[$row['first'] . '_' . $row['last']] = $speaker;
            }

            // Associate with the speaker
            /** @var \Concrete\Core\Express\EntryBuilder\AssociationUpdater $updater */
            $updater = $talk->associateEntries();
            $this->output->writeln("Associating {$row['talk title']} with {$row['twitter']}");
            $updater->associate('speaker', $speaker);
        }
    }

    protected function loadCsv(): Iterator
    {
        $csv = Reader::createFromPath($this->input->getArgument('csv'));
        $csv->setEnclosure('"');
        $headers = null;

        foreach ($csv->fetch() as $row) {
            if (!$headers) {
                $headers = array_map('strtolower', $row);
                continue;
            }

            yield array_combine($headers, array_map(function($i) { return str_replace('--NEWLINE--', "\n", $i); }, $row));
        }
    }

}
