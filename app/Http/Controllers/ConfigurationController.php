<?php

namespace App\Http\Controllers;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $config = Configuration::first();
      if(!$config) {
        $config = new Configuration();
        $config->save();
        $config = Configuration::first();
      }

      return view('pages.admin.configuration.index')->with([
        'config' => $config
      ]);
    }

    public function toggleBrand($configId) {
      $config = Configuration::find($configId);
      if(!$config) return redirect()->back()->with('error','Something went wrong.');
      $msg = $config->display_brand ? 'Brand banner no longer displayed.' : 'Branding will be displayed';
      $config->display_brand = !$config->display_brand;
      if($config->save()) return redirect('/configuration')->with('success', $msg);
    }

    public function toggleMenu($configId) {
      $config = Configuration::find($configId);
      if(!$config) return redirect()->back()->with('error','Something went wrong.');
      $msg = $config->display_menu ? 'Menu disabled.' : 'Menu enabled.';
      $config->display_menu = !$config->display_menu;
      if($config->save()) return redirect('/configuration')->with('success', $msg);
    }

    public function updateAbout(Request $request, $configId) {
      $config = Configuration::find($configId);
      if(!$config) return redirect()->back()->with('error','Something went wrong.');
      $this->validate($request, [
        'about_head' => 'max:64',
        'about_text' => 'max:500'
      ]);
      $config->about_head = $request->about_head;
      $config->about_text = $request->about_text;
      if($config->save()) return redirect('/configuration')->with('success','About section content updated.');
    }

    public function updateEvents(Request $request, $configId) {
      $config = Configuration::find($configId);
      if(!$config) return redirect()->back()->with('error','Something went wrong.');
      $this->validate($request, [
        'events_head' => 'max:64',
        'events_text' => 'max:500'
      ]);
      $config->events_head = $request->events_head;
      $config->events_text = $request->events_text;
      if($config->save()) return redirect('/configuration')->with('success','Events section content updated.');
    }

    public function updateContact(Request $request, $configId) {
      $config = Configuration::find($configId);
      if(!$config) return redirect()->back()->with('error','Something went wrong.');
      $this->validate($request, [
        'contact_head' => 'max:64',
        'contact_text' => 'max:500'
      ]);
      $config->contact_head = $request->contact_head;
      $config->contact_text = $request->contact_text;
      if($config->save()) return redirect('/configuration')->with('success','Contact section content updated.');
    }

    public function updateMeta(Request $request, $configId) {
      $config = Configuration::find($configId);
      if(!$config) return redirect()->back()->with('error','Something went wrong.');
      $this->validate($request,[
        'description' => 'max:225',
        'keywords' => 'max:225'
      ]);
      $config->description = $request->description;
      $config->keywords = $request->keywords;
      if($config->save()) return redirect('/configuration')->with('success','Meta information updated.');
    }

}
