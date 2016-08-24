<?php

namespace AppBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class MenuListener
{
    public function buildMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $blog = $menu->addChild('Blog');
        $blog->addChild('posts', [
            'route' => 'app_post_index',
        ])->setLabel('Posts');
    }
}
