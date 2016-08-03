<?php

namespace AppBundle\Menu;

use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\TranslatorInterface;
use Sylius\Component\Rbac\Authorization\AuthorizationCheckerInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuListener
{
    public function onMenuConfigure(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $childOptions = [
            'childrenAttributes' => ['class' => 'nav'],
            'labelAttributes' => ['class' => 'nav-header'],
        ];

        $child = $menu
            ->addChild('Blog', $childOptions)
            ->setLabel('Blog')
        ;

        $child
            ->addChild('posts', ['route' => 'app_post_index'])
            ->setLabelAttribute('icon', 'document')
            ->setLabel('Posts');
    }
}
