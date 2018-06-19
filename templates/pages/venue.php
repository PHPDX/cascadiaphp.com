<?php declare(strict_types=1);

/** @var \CascadiaPHP\Site\Template\Template $this */

$this->start('components') ?>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<?php $this->stop() ?>

<h1 class="my0 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Venue</h1>

<amp-iframe
        class="mb3"
        width="1000"
        height="250"
        sandbox="allow-scripts allow-same-origin"
        layout="responsive"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBZqgk6gElxAtdfPrINdYC4VMafGUvepVY
    &q=University+Place+Hotel+Portland,+Oregon">
    <amp-img src="/images/pages/venue/map.png" width="1000" height="250" layout="responsive" class="object-cover blur"
             placeholder></amp-img>
</amp-iframe>

<section class="content px3 flex flex-column">
    <div>
        <amp-img src="/images/pages/venue/pool.jpg" width="430" height="648" sizes="178px"
                 class="right my1 ml1 mr0"></amp-img>
        <p>
            Owned, Operated and Located on the campus of Portland State University (PSU), Cascadia PHP is excited to be
            partnering with the University Place Hotel and Conference Center as the venue for our inaugural year. It is
            truly a pleasure to partner on mutual goals of education, affordability, excellence, equality and community
            engagement.
        </p>
        <amp-img src="/images/pages/venue/clock.png" width="808" height="493" sizes="250px"
                 class="left my1 mr1 ml0"></amp-img>
        <p>
            Getting around from here is a breeze! TriMet’s Lincoln Station and the MAX Line is just outside the front
            door, and the Downtown Street Car is less than 3 blocks away – both can quickly get you anywhere downtown –
            connecting you to the PDX International Airport and the Amtrak Station for our out of town guests. You can
            also keep to the high foot traffic University District which consists of a wide array of quality eating
            establishments – including Portland’s famous Food Carts! Along with it’s fabulous location, the University
            Place boasts the only Outdoor Seasonal Pool in Downtown Portland.
        </p>
    </div>
    <div>
        <amp-img src="/images/pages/venue/breakfast.jpg" width="430" height="648" sizes="178px"
                 class="right my1 ml1 mr0"></amp-img>
        <amp-img src="/images/pages/venue/coffee.jpg" width="808" height="493" sizes="250px"
                 class="left my1 mr1 ml0"></amp-img>
        <p>
            To help you to get the most out of your conference experience and eliminate the hassle of traffic, we are
            excited to offer attendees the best rate in Downtown Portland. Simply tell them you are with Cascadia PHP
            and you will have access to rates starting at $80 (+hotel tax). You can also purchase your conference ticket
            with a 2 night stay included. Join guests every morning for a complimentary breakfast— way beyond juice and
            cold cereal. You’ll enjoy a delicious spread of eggs, potatoes, assorted pastries, make your own waffles,
            cereals, juices, and <em>most importantly</em>> coffee. All rooms are equipped with Microwave, Mini Fridge,
            and Coffee Maker. For those of you who may be traveling a lot, there is also an On-site Washer and Dryer.
            And of course, there is FREE WIFI for all guest and conference attendees.
        </p>
    </div>
    <div>
        <amp-img src="/images/pages/venue/gym.jpg" width="430" height="648" sizes="178px"
                 class="right my1 ml1 mr0"></amp-img>
        <p>
            The hotel itself includes a 24 hour Fitness Center, but for those of you looking for even more, hotel guests
            get exclusive non-student entrance to PSU’s world class Campus Recreation Center, located just 6 blocks, or
            2 Max stops from the hotel. A $15 day pass includes access to a two-court gymnasium, a 1/11 mile, three lane
            running track, a synthetic floor gymnasium equipped with dasher boards for floor hockey and indoor soccer, a
            large cardiovascular and weight training facility, two multi-purpose group fitness suites, an aquatic
            complex including a lap pool and whirlpool spa, locker rooms, a bouldering wall, and daily fitness classes.
        </p>
        <p>
            <em>Parking – $3.00 an hour – $12.00 daily – $15.00 overnight</em>
        </p>
</section>
