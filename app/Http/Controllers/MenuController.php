<?php

namespace App\Http\Controllers;
use App\Models\{Category,Menu,Configuration};
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $config;

    public function __construct() {
      $this->middleware('auth');
      $this->config = Configuration::first();
    }

    public function index() {
      if(!$this->config->display_menu) return redirect('/dashboard')->with('error','Menu is currently disabled. To enable it go to the content panel.');
      $categories = Category::all();
      return view('pages.admin.menu.index')->with([
        'categories' => $categories,
        'config' => $this->config
      ]);
    }

    public function create($catId) {
      if(!$this->config->display_menu) return redirect('/dashboard')->with('error','Menu is currently disabled. To enable it go to the content panel.');
      $category = Category::find($catId);
      return view('pages.admin.menu.create')->with([
        'category' => $category,
        'config' => $this->config
      ]);
    }

    public function store(Request $request) {
      $this->validate($request, [
        'dish' => 'required|max:64',
        'ingredients' => 'required|max:256',
        'alergens' => 'required|max:32',
        'category' => 'required|numeric',
        'cost' => 'required|numeric'
      ]);
      $menuItem = new Menu;
      $menuItem->dish = $request->dish;
      $menuItem->ingredients = $request->ingredients;
      $menuItem->alergens = $request->alergens;
      $menuItem->category_id= $request->category;
      $menuItem->cost = $request->cost*100;
      if($menuItem->save()) return redirect('/menu')->with('success','Menu Item added added.');
      return redirect()->back()->with('error','Something went wrong');
    }

    public function edit($menuId) {
      if(!$this->config->display_menu) return redirect('/dashboard')->with('error','Menu is currently disabled. To enable it go to the content panel.');
      $menuItem = Menu::find($menuId);
      return view('pages.admin.menu.edit')->with([
        'menuItem' => $menuItem,
        'config' => $this->config
      ]);
    }

    public function update(Request $request, $menuId) {
      $this->validate($request, [
        'dish' => 'required|max:64',
        'ingredients' => 'required|max:256',
        'alergens' => 'required|max:32',
        'category' => 'required|numeric',
        'cost' => 'required|numeric'
      ]);
      $menuItem = Menu::find($menuId);
      if(!$menuItem) return redirect()->back()->with('error','Dish not found');
      $menuItem->dish = $request->dish;
      $menuItem->ingredients = $request->ingredients;
      $menuItem->alergens = $request->alergens;
      $menuItem->category_id= $request->category;
      $menuItem->cost = $request->cost*100;
      if($menuItem->save()) return redirect('/menu')->with('success','Menu item updated.');
      return redirect()->back()->with('error','Something went wrong');
    }

    public function destroy($menuId) {
      $menuItem = Menu::find($menuId);
      if(!$menuItem) return redirect()->back()->with('error','Item not found.');
      if($menuItem->delete()) return redirect()->back()->with('alert',$menuItem->dish.' permanently removed.');
    }
}
