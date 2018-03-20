<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'menus';

    public static function byName($name)
    {
        return self::where('name', '=', $name)->first();
    }

    public function menuitems()
    {
        return $this->hasMany('App\Model\Menuitems');
    }

    public function getMenu($name)
    {
        return $this->where('name', $name)->first();
    }

    public function buildMenu()
    {
        $menuitems = $this->getAllMenuItems($this->id);
        $result = null;
        $allitems = $this->getAllMenuItems();

        if (count($allitems) > 0) {
            $result .= '<ul id="menu-main-menu" class="menu">';
            $result .= $this->buildMenuIndex($allitems[0], $allitems, true);
            $result .= '</ul>';
        }
        return $result;
    }

    private function buildMenuIndex($items, $allitems, $root = false)
    {
        $color = array('red', 'mustard', 'green', 'yellow', 'blue', 'steelblue', 'lavender');
        $result = null;
        foreach ($items as $key => $item) {
            $class = array();
            if ($root) {
                $class[] = $color[$key];
            }
            if(isset($allitems[$item->id])) {
                $class[] = "menu-item-simple-parent menu-item-depth-0";
            }
            $result .= '<li class="' . implode(" ", $class) . '">';
            $result .= '<a href="' . $item->link . '"> ' . $item->label . ' </a>';
            if (isset($allitems[$item->id])) {
                $result .= '<ul class="sub-menu">';
                $result .= $this->buildMenuIndex($allitems[$item->id], $allitems);
                $result .= '</ul>';
            }
            $result .= '</li>';
        }
        return $result;
    }

    public function getAllMenuItems()
    {
        $menuitems = $this->menuitems()->orderBy('sort')->get();
        $result = array();
        foreach ($menuitems as $item) {
            $parent = ($item->parent_id != null) ? $item->parent_id : 0;
            $result[$parent][] = $item;
        }
        return $result;
    }

    /**
     * @return null|string
     */
    public function buildHTML()
    {
        $result = null;
        $allitems = $this->getAllMenuItems();

        if (count($allitems) > 0)
            return $this->buildHTMLMenu($allitems[0], $allitems);
        return null;

    }

    /**
     * @param $items
     * @param $allitems
     * @return null|string
     */
    private function buildHTMLMenu($items, $allitems)
    {
        $result = '<ol class="dd-list">';
        foreach ($items as $item) {
            $result .= '<li class="dd-item" data-id="' . $item->id . '">
                    <div class="dd-handle">' . $item->label . '</div>
                    <span class="button-delete btn btn-default btn-xs pull-right" data-owner-id="' . $item->id . '" data-url="' . route('admin.menus.getmodalitem', ['id' => $item->id]) . '">
                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                    </span>
                    <span class="button-edit btn btn-default btn-xs pull-right" data-owner-id="' . $item->id . '" data-url="' . route('admin.menus.getmodalitem', ['id' => $item->id]) . '">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </span>';
            if (isset($allitems[$item->id])) {
                $result .= $this->buildHTMLMenu($allitems[$item->id], $allitems);
            }
            $result .= '</li>';
        }
        $result .= '</ol>';
        return $result;
    }

    /**
     * @param MenuItems $item
     * @param $allitems
     * @return string
     */
    private function buildHTMLItem(MenuItems $item, $allitems)
    {
        $result = '<li class="dd-item" data-id="' . $item->id . '">
                    <div class="dd-handle">' . $item->label . '</div>
                    <span class="button-delete btn btn-default btn-xs pull-right" data-owner-id="' . $item->id . '" data-url="' . route('admin.menus.getmodalitem', ['id' => $item->id]) . '">
                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                    </span>
                    <span class="button-edit btn btn-default btn-xs pull-right" data-owner-id="' . $item->id . '" data-url="' . route('admin.menus.getmodalitem', ['id' => $item->id]) . '">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </span>';

        $result .= '</li>';
        return $result;
    }
}
