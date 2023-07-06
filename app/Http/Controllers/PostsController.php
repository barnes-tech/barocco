<?php

namespace App\Http\Controllers;
use App\Models\{Post,Configuration};
use Illuminate\Http\Request;
use Str;

class PostsController extends Controller
{
    private $config;

    public function __construct() {
      $this->middleware('auth');
      $this->config = Configuration::first();
    }

    public function index() {
      $posts = Post::all();
      return view('pages.admin.posts.index')->with([
        'posts' => $posts,
        'config' => $this->config
      ]);
    }

    public function create() {
      return view('pages.admin.posts.create')->with([
        'config' => $this->config
      ]);
    }

    public function store(Request $request) {
      $this->validate($request, [
        'title' => 'required|max:64',
        'day' => 'required|max:32',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
        'desc' => 'required|max:255'
      ]);
      $titleString = str_replace(' ','-',$request->title);
      $clean = preg_replace('/[^A-Za-z0-9\-]/', '', $titleString);
      $imageString = $clean.time().'.'.$request->image->extension();
      $request->image->move(public_path('img/posts'),$imageString);
      $post = new Post;
      $post->title = $request->title;
      $post->slug = Str::slug($request->title);
      $post->day = $request->day;
      $post->image = $imageString;
      $post->desc = $request->desc;
      if($post->save()) return redirect('/posts/index')->with('success','Post added successfully.');
      return redirect()->back()->with('error','Something went wrong.');
    }

    public function edit($postId) {
      $post = Post::find($postId);
      if(!$post) return redirect()->back()->with('error','Something went wrong.');
      return view('pages.admin.posts.edit')->with([
        'post' => $post,
        'config' => $this->config
      ]);
    }

    public function deleteImage($id) {
      $post = Post::find($id);
      if(file_exists(public_path('img/posts/'.$post->image))) {
        unlink(public_path('img/posts/'.$post->image));
        $msg = 'Image removed.';
      } else {
        $msg = 'Img not found.';
      }

    }

    public function update(Request $request, $postId) {
      $this->validate($request,[
        'title' => 'required|max:64',
        'day' => 'required|max:32',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999',
        'desc' => 'required|max:255'
      ]);
      $post = Post::find($postId);
      if(!$post) return redirect()->back()->with('error','Post not found.');
      if(!$request->image) {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->day = $request->day;
        $post->desc = $request->desc;
        $msg = 'Event information updated.';
      } else {
        if(file_exists(public_path('img/posts/'.$post->image))) {
          unlink(public_path('img/posts/'.$post->image));
          $msg = 'Image updated.';
        } else {
          $msg = 'Img not found.';
        }
        $titleString = str_replace(' ','-',$request->title);
        $clean = preg_replace('/[^A-Za-z0-9\-]/', '', $titleString);
        $imageString = $clean.time().'.'.$request->image->extension();
        $request->image->move(public_path('img/posts'),$imageString);
        $post->image = $imageString;
        $post->title = $request->title;
        $post->slug = Str::slug($erquest->title);
        $post->day = $request->day;
        $post->desc = $request->desc;
      }
      if($post->save()) return redirect('/posts/index')->with('success','Post has been updated.');
      return redirect()->back()->with('error','Something went wrong.');
    }

    public function delete($postId) {
      $post = Post::find($postId);
      if($post->delete()) return redirect('/posts/index')->with('success','Post has been deleted.');
      return redirect()->back()->with('error','Something went wrong.');
    }
  }
