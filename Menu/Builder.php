<?php
/**
 * Created by PhpStorm.
 * User: ceilers
 * Date: 01.11.14
 * Time: 21:08
 */

namespace FNC\Bundle\AccountManagementBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $tr = $this->container->get('translator');

        $menu = $factory->createItem('root');

        $account = $factory->createItem($tr->trans('menu.account'));

        $account->addChild($tr->trans('menu.account.overview'), array('route' => 'fnc_account_management_index'));

        $account->addChild($tr->trans('menu.account.new'), array('route' => 'fnc_account_management_new'));

        $menu->addChild($account);

        return $menu;
    }
}
