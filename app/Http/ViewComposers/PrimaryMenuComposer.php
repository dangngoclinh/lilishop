<?php

namespace App\Http\ViewComposers;

use App\Model\Menus;
use Illuminate\View\View;

class PrimaryMenuComposer
{
    protected $menu;

    public function __construct(Menus $menu)
    {
        $this->menu = $menu->getMenu('primary');
    }

    public function compose(View $view)
    {
        $view->with('primary', $this->menu);
    }
}