<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    protected $title = 'Post';

    protected $path = 'post';

    protected $reDirect = 'posts';


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->org = \Auth::user()->org_id ;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts =  Post::select()
        ->where('org_id', $this->org )
        ->where('parent_id', 0)
        ->whereIn('type_id', [ 1, 2, 3] )
        ->with('children')
        ->orderBy('order')
        ->get();

        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('posts', $posts )
        ->with('org_id', $this->org  )  ;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->token = $this->token();
        $post->org_id = \Auth::user()->org_id; 
        $post->site_id = $request->site_id; 
        $post->type_id = $request->type_id;
        $post->parent_id = $request->parent_id;
        $post->title = $request->title;
        $post->slug = $this->slug( $request->title );
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->order = $request->order;

        $post->save();

        return redirect('/posts/'.$post->token . '/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $token)
    {
        $post = Post::where('token', $token )->first();
        
        $post->type_id = $request->type_id;
        $post->parent_id = $request->parent_id;
        $post->title = $request->title;
        $post->slug = $this->slug( $request->title );
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->order = $request->order;
     
        $post->save();

        return redirect('/posts/'.$post->token . '/edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $posts =  Post::select()
        ->where('org_id', $this->org )
        ->where('parent_id', 0)
        ->whereIn('type_id', [ 1, 2, 3] )
        ->with('children')
        ->orderBy('order')
        ->get();

        return view( $this->path.'.create' )
        ->with('title', $this->title )
        ->with('posts', $posts )
        ->with('org_id', $this->org  )  ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $token )
    {
        $post = Post::where('token', $token )->first();

        $posts =  Post::select()
        ->where('org_id', $this->org )
        ->where('parent_id', 0)
        ->whereIn('type_id', [ 1, 2, 3] )
        ->with('children')
        ->orderBy('order')
        ->get();

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('post', $post )
        ->with('posts', $posts )
        ->with('org_id', $this->org  )  ;        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
