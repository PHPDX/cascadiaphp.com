<?php

namespace Concrete\Package\Cascadiaphp\Block\RegisterButton;

use Concrete\Core\Attribute\Category\PageCategory;
use Concrete\Core\Block\BlockController;
use Concrete\Core\Page\Page;
use Concrete\Core\Url\Resolver\PageUrlResolver;

class Controller extends BlockController
{

    public function getBlockTypeName()
    {
        return 'Register Button';
    }

    public function view()
    {
        $page = Page::getByPath('/registration');
        $this->set('price', $this->determinePrice($page));
        $this->set('registerLink', $this->app->make(PageUrlResolver::class)->resolve([$page]));
    }

    private function determinePrice(Page $page): int
    {
        // First load up the register page
        $category = $this->app->make(PageCategory::class);

        // Then check the attribute set there
        $key = $category->getAttributeKeyByHandle('price');
        $value = $category->getAttributeValue($key, $page);

        if ($value) {
            return $value->getValue();
        }

        return 100;
    }
}
