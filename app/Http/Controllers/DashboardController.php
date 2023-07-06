<?php

namespace App\Http\Controllers;
use App\Models\{Configuration,Lead};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $config;

    public function __construct()
    {
        $this->middleware('auth');
        $this->config = Configuration::first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newLeads = Lead::where('resolved',0)->orderBy('created_at','DESC')->paginate(8);
        $resolved = Lead::where('resolved',1)->orderBy('updated_at','DESC')->paginate(10);
        $count = count($newLeads);
        return view('dashboard')->with([
          'config' => $this->config,
          'newLeads' => $newLeads,
          'resolved' => $resolved,
          'count' => $count
        ]);
    }
}
