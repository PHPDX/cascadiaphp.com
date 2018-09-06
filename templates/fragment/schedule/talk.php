<div on="tap:AMP.setState({current:<?= (int) $talk['id'] ?>}),talk-info.open"
    class="schedule-talk p1 flex flex-auto
    <?= $type === 'talk' ? 'talk col col-4' : '' ?>
    <?= $type === 'keynote' ? 'keynote col-12' : '' ?>
    <?= $type === 'short' ? 'short' : '' ?>">
    <div class="rounded border col-12 center flex flex-column justify-center p2">
        <span class=" bold"><?= $talk['talk'] ?></span>
        <span class="truncate italic light-text"><?= $talk['name'] ?></span>
    </div>
</div>
