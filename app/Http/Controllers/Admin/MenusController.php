<?php

namespace App\Http\Controllers\Admin;

use App\Model\MenuItems;
use App\Model\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menus::all();
        return view('adminlte.menus.index', compact('menus'));
    }

    public function view(Request $request, $id)
    {
        $cmenu = Menus::find($id);
        if ($request->has('act')) {
            switch ($request->act) {
                case "store_item":
                    $menuitem = new MenuItems;
                    $menuitem->label = $request->label;
                    $menuitem->link = $request->link;
                    $menuitem->class = $request->class;
                    $cmenu->menuitems()->save($menuitem);
                    break;
            }
        }
        $menus = Menus::all();
        return view('adminlte.menus.view', compact('menus', 'cmenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function storeItem(Request $request)
    {
        $menuitem = new MenuItems;
        $menuitem->label = $request->label;
        $menuitem->link = $request->link;
        $menuitem->class = $request->class;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menus;
        $menu->name = $request->name;
        $menu->save();
        return redirect()->route('admin.menus.view', ['id' => $menu->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menus::find($id);
        $menu->name = $request->name;
        $menu->save();
        return back();
    }

    public function updateItem(Request $request, $id)
    {
        $item = MenuItems::find($id);
        $item->label = $request->label;
        $item->link = $request->link;
        $item->class = $request->class;
        $item->save();
        return back();
    }

    public function updateList(Request $request, $id)
    {
        $list_id = $request->data;
        $this->updateParentId($list_id);
    }

    protected function updateParentId($list_id, $parent_id = null, $sort = 0)
    {
        foreach ($list_id as $item) {
            $menuitem = MenuItems::find($item['id']);
            $menuitem->parent_id = $parent_id;
            $sort++;
            $menuitem->sort = $sort;
            $menuitem->save();
            if (isset($item['children'])) {
                $this->updateParentId($item['children'], $item['id']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function select(Request $request)
    {
        $menus = Menus::find($request->menus_id);
        return redirect()->route('admin.menus.view', ['id' => $menus->id]);
    }

    public function getModalItem($id)
    {
        $item = MenuItems::find($id);
        return view('adminlte.menus.modal-item', compact('item'));
    }
}
