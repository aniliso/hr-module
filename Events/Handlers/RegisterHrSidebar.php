<?php

namespace Modules\Hr\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterHrSidebar extends AbstractAdminSidebar
{
    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('hr::hr.title.hr'), function (Item $item) {
                $item->icon('fa fa-male');
                $item->weight(11);
                $item->authorize(
                    $this->auth->hasAccess('hr.positions.index')
                );
                $item->item(trans_choice('hr::positions.title.positions',[1]), function (Item $item) {
                    $item->icon('fa fa-briefcase');
                    $item->weight(0);
                    $item->append('admin.hr.position.create');
                    $item->route('admin.hr.position.index');
                    $item->authorize(
                        $this->auth->hasAccess('hr.positions.index')
                    );
                });
                $item->item(trans('hr::applications.title.applications'), function (Item $item) {
                    $item->icon('fa fa-user-plus');
                    $item->weight(0);
                    $item->route('admin.hr.application.index');
                    $item->authorize(
                        $this->auth->hasAccess('hr.applications.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
