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
        $result = null;
        $result .= '<ol class="dd-list">';
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
