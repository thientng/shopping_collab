<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

use Illuminate\Support\Str; // dùng cho thẻ slug
use App\Components\MenuRecursive;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuController extends Controller
{
    private $menu;
    private $menuRecursive;

    public function __construct(Menu $menu) {
        $this->menu = $menu;
        $this->menuRecursive = new MenuRecursive();
    }
    
    public function index() {
        $menus = $this->menu->latest()->paginate(6);

        return view('admin.menus.index',[
            'menus' => $menus,
        ]);
    }

    public function create() {
        $htmlOption = $this->menuRecursive->addMenuRecursive();

        return view('admin.menus.add',[
            'htmlOption' => $htmlOption,
        ]);
    }

    public function store(Request $request) {
        $this->menu->create([
            'name' => $request->menus_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->menus_name)

        ]);

        return redirect()->route('menus.index');
    }

    
    public function edit($id){
        $menuEditById = $this->menu->find($id);
        $htmlOption = $this->menuRecursive->editMenuRecursive($menuEditById['parent_id']);
        return view('admin.menus.edit',[
            'menu' => $menuEditById,
            'htmlOption' => $htmlOption
        ]);
    }
    
    public function update($id,Request $request) {
        $this->menu->find($id)->update([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->category_name)
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id) {
        $this->menu->find($id)->delete();

        return redirect()->route('menus.index');
    }
}
