<?php

namespace App\Http\Controllers;
use App\Models\{Configuration,Post};
use Illuminate\Http\Request;

class EventsController extends Controller
{
    private $config;

    public function __construct() {
        $this->config = Configuration::first();
    }

    public function index() {
        $events = Post::latest()->paginate(6);
        return view('pages.website.events.index')->with([
            'config' => $this->config,
            'events' => $events
        ]);
    }

    public function show($postId) {
        $event = Post::find($postId);
        return view('pages.website.events.show')->with([
            'config' => $this->config,
            'event' => $event
        ]);

    }
}
