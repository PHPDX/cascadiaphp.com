<?php
/**
 * @var \PHPDX\Site\Meetup\Event $event
 * @var \PHPDX\Site\Template\Template $this
 */
?>
<script type="application/ld+json">
<?php
    $venue = $event->getVenue();
    echo json_encode([
        '@context' => 'http://schema.org',
        '@type' => 'Event',
        'name' => $event->getName(),
        'description' => $event->getDescription(),
        'startDate' => $event->getTime()->format(DATE_ATOM),
        'endDate' => $event->getTime()->modify('+2 hours')->format(DATE_ATOM),
        'url' => $event->getUrl(),
        'image' => 'https://phpdx.org/images/logo.svg',
        'isAccessibleForFree' => true,
        'location' => [
            '@type' => 'Place',
            'name' => 'PHPDX Venue',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $venue['address_1'],
                'addressLocality' => $venue['city'],
                'addressRegion' => $venue['state'],
                'addressCountry' => $venue['localized_country_name']
            ]
        ]
    ]);
    ?>
</script>
