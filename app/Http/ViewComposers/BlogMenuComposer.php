<?php

namespace App\Http\ViewComposers;

use App\Model\Menus;
use Illuminate\View\View;

class BlogMenuComposer
{
    protected $menu;

    public function __construct(Menus $menu)
    {
        $this->menu = $menu->getMenu('blog')->menuitems()->orderBy('sort')->get();
    }

    public function compose(View $view)
    {
        $view->with('menus', $this->menu);
    }
}