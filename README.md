![](/public/images/logo.svg)
# Welcome to the repository for Cascadia PHP's 2019 :mountain: website!

[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]

# Setting up a local copy

Pull a copy of this repository and:

1. `composer install`
1. `yarn`
1. `yarn dev`

At this point you've pulled PHP and JS dependencies and built assets, now you need to install stuff:

1. `./vendor/bin/concrete5 c5:install -i` and follow instructions (or set up a webroot to point to public and do it through your browser)
1. `./vendor/bin/concrete5 c5:package:install cascadiaphp`

Now you're ready to start adding blocks. Start by adding:

1. The logo image in the `Sitewide Header Left` area, just use an `image` block and make sure to enable the link functionality
1. A navigation for the `Sitewide Header Left` are, a default `autonav` block should work fine
1. A bunch of pages to fill out the navigation, the 6th one gets special treatment (use the "exclude from navigation" page attribute to exclude pages)
1. Title backgrounds for each page, add an `image` block to the `subheader` area
1. A logo for the footer. The middle area needs an `image` block with a link
1. A `pagelist` for the footer links. The rightmost area should have a `pagelist` that maps to the section of the site you want 

# Development

Any CSS / JS sources should be kept out of the public webroot and compiled in using laravel mix. You can find the existing
resources in `./resources`.

Use `yarn watch` to recompile your stuff as you go. This combind with something like `liveedit` makes the dev process
a lot nicer than it used to be

[ico-travis]: https://img.shields.io/travis/PHPDX/cascadiaphp.com/2019.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/PHPDX/cascadiaphp.com/2019.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/PHPDX/cascadiaphp.com.svg?style=flat-square

[link-travis]: https://travis-ci.org/PHPDX/cascadiaphp.com
[link-scrutinizer]: https://scrutinizer-ci.com/g/PHPDX/cascadiaphp.com/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/PHPDX/cascadiaphp.com
