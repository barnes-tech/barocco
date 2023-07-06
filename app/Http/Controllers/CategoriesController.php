<?php

namespace App\Http\Controllers;
use App\Models\{Category,Configuration};

use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    private $config;
    public function __construct() {
      $this->middleware('auth');
      $this->config = Configuration::first();
    }

    public function index() {
      if(!$this->config->display_menu) return redirect()->back()->with('error','This is a feature of the menu. To enable the menu go to to the content panel.');
      $catList = Category::all()->get();
      $cout = count($catList);
      return view('pages.admin.category.index')->with([
        'categories' => $catList,
        'count' => $count,
        'config' => $this->config
      ]);
    }

    public function create() {
      if(!$this->config->display_menu) return redirect()->back()->with('error','This is a feature of the menu. To enable the menu go to to the content panel.');
      return view('pages.admin.category.create')->with([
        'config' => $this->config
      ]);
    }

    public function store(Request $request) {
      if(!$this->config->display_menu) return redirect()->back()->with('error','This is a feature of the menu. To enable the menu go to to the content panel.');
      $this->validate($request, [
        'category' => 'required|max:32'
      ]);
      $category = new Category;
      $category->category = $request->category;
      if($category->save()) return redirect('/menu')->with('success','Category added.');
      return redirect()->back()->with('error','Something went wrong');
    }

    public function delete($catId) {
      if(!$this->config->display_menu) return redirect()->back()->with('error','This is a feature of the menu. To enable the menu go to to the content panel.');
      $cat = Category::find($catId);
      if(!$cat) return redirect('/menu')->with('error','Category not found');
      $items = $cat->dishes;
      $count = count($items);
      if($count==0) {
        if($cat->delete()) return redirect('/menu')->with('success','Category deleted.');
      };
      foreach($items as $item) {
        $item->delete();
      }
      $cat->delete();
      return redirect()->back()->with('success','Category and '.$count.' dishes deleted.');
    }
}
