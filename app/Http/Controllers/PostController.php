<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('posts.new-post');
    }
    public function show($id){        
        $post = Post::find($id);
        $ep = 0;        
        if(!$post or $post->status == 0){
            return redirect('/');
        }else{
            if($post->user == Auth::id()){
                $ep = 1;
            }     
            $author = User::find($post->user);
            $post->author = $author->name;
            return view('posts.post', ['post' => $post, 'ep' => $ep]);
        }           
    }
    public function create(Request $request){

        $validator = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string']
        ]);             
        
        if($validator){
            $post = new Post();
            $post->user = Auth::id();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->status = 1;

            if($post->save()){
                return response()->json(['success_code' => 200, 'message' => 'Post creado con éxito', 'post_id' => $post->id]);
            }
        }        
    }
    public function update(Request $request){
        $post = Post::find($request->id);
        $post->title = $request->title; 
        $post->body = $request->body; 
        if($post->save()){
            return response()->json(['success_code' => 200, 'message' => 'Post editado con éxito']);
        }
    }
    public function read(){
        $posts = Post::where('status', 1)->get();
        for ($i=0; $i < sizeof($posts); $i++) { 
            $author = User::where('id', $posts[$i]->user)->first();
            $posts[$i]->author = $author->name;
        }
        if($posts){
            return response()->json(['success_code' => 200, 'posts' => $posts]);
        }else{
            return response()->json(['success_code' => 200, 'posts' => 0]);
        }
    }
    public function delete($id){
        $post = Post::find($id);
        $post->status = 0;
        if($post->save()){
            return response()->json(['success_code' => 200, 'message' => 'Post eliminado con éxito']);
        }
    }
}
