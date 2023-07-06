<?php

namespace App\Http\Controllers;

use App\Models\{Post,Category,Configuration,Lead};
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    private $config;

    public function __construct() {
      $this->config = Configuration::first();
    }

    public function index() {
      $events = Post::orderBy('created_at','desc')->paginate(4);
      return view('home')->with([
        'config' => $this->config,
        'events' => $events

      ]);
    }

  

    public function restaurant() {
      if(!$this->config->display_menu) return redirect('/')->with('error','The Restaurant is disabled');
      $categories = Category::all();

      return view('pages.website.restaurant.index')->with([
        'config' => $this->config,
        'categories' => $categories
      ]);
    }

    public function contact(Request $request) {
      $this->validate($request, [
        'name' => 'required|max:64',
        'tel'=>'required|regex:/(0)[0-9]{9}/',
        'email'=>'required|email',
        'message' => 'required|max:500'
      ]);
      $lead = new Lead;
      $lead->name = $request->name;
      $lead->tel = $request->tel;
      $lead->email = $request->email;
      $lead->message = $request->message;
      $lead->resolved = 0;
      $lead->notes = "";
      $lead->save();
      //$data = array(
      //  'name' => $request->name,
      //  'tel' => $request->tel,
      //  'email' => $request->email,
      //  'msg' => $request->message
    //  );

      //Mail::send('emails.contact', $data, function($sendmail) use ($data){
      //  $sendmail->from($data['email']);
      //  $sendmail->to('support@shinetimecardiff.co.uk');
      //  $sendmail->subject('New Lead');
      //});
      
      return redirect()->back()->with('success','Thanks, we\'ll contact you soon.');
    }
}
