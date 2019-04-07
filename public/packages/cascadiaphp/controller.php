<?php

namespace Concrete\Package\Cascadiaphp;

use Concrete\Core\Asset\AssetList;
use Concrete\Core\Attribute\Category\PageCategory;
use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Entity\Attribute\Type;
use Concrete\Core\Entity\Package as PackageEntity;
use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;
use Concrete\Core\Site\Service;
use Doctrine\ORM\EntityManagerInterface;

class Controller extends Package
{

    public function getPackageVersion(): string
    {
        return '2019.1';
    }

    public function getPackageHandle(): string
    {
        return 'cascadiaphp';
    }

    public function getPackageName(): string
    {
        return t('CascadiaPHP');
    }

    public function getPackageDescription(): string
    {
        return t('The package that powers the CascadiaPHP installation.');
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        return $this->alignState($pkg);
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->alignState($this->getPackageEntity());
    }

    private function alignState(PackageEntity $pkg)
    {
        /** @var \Concrete\Core\Site\Service $siteService */
        $siteService = $this->app->make(Service::class);
        $defaultSite = $siteService->getDefault();


        // Install our theme
        if (!Theme::getByHandle('cascadiaphp')) {
            // Set up our site name
            $defaultSite->setSiteName('Cascadia PHP');

            // Install our theme
            $theme = Theme::add('cascadiaphp', $pkg);
            $theme->applyToSite($defaultSite);
        }

        // Make sure block types are installed
        $blocks = ['register_button'];
        foreach ($blocks as $block) {
            if (!BlockType::getByHandle($block)) {
                BlockType::installBlockType($block, $pkg);
            }
        }

        // Set up required page attributes
        $category = $this->app->make(PageCategory::class);
        if (!$category->getAttributeKeyByHandle('price')) {
            $em = $this->app->make(EntityManagerInterface::class);
            $attributeTypes = $em->getRepository(Type::class);

            $key = $category->createAttributeKey();
            $key->setAttributeKeyHandle('price');
            $key->setAttributeCategoryEntity($category->getCategoryEntity());
            $key->setAttributeKeyName('Ticket Price');
            $key->setAttributeType($attributeTypes->findOneBy(['atHandle' => 'number']));
            $key->setPackage($pkg);

            $em->persist($key);
            $em->flush();
        }


        return $pkg;
    }

}
