<<?= isset($twitter) ? "a href='https://twitter.com/$twitter'" : 'div' ?> class="col col-12 sm-col-6 md-col-4 lg-col-2 px2 py2 organizer">
    <amp-layout width="1" height="1" layout="responsive" class="circle bg-blue cloth relative shadow-lg">
        <amp-img layout="fill"
                 src="<?= isset($image) ? "/images/scenes/who/$image" : "http://www.ywcabrand.org/atf/cf/%7Bc3201f87-9e48-4580-84fa-429e77844aa1%7D/BLP0062303.JPG" ?>"
                 width="3833"
                 height="2555"
                 class="object-cover object-right"
                 alt="<?= $name ?>">
        </amp-img>
    </amp-layout>
    <div class="relative col-12 center pt2">
        <span class="light-text white block nowrap"><?= $twitter ?? $name ?></span>
        <sup class="light-text black"><?= $role ?? '' ?></sup>
    </div>
</<?= isset($twitter) ? 'a' : 'div' ?>>
