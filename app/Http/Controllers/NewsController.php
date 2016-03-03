<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    protected $title = 'News';

    protected $path = 'news';

    protected $reDirect = 'news';


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
        ->where('type_id', 5)
        ->orderBy('order')
        ->get();

        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('posts', $posts );
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
        $post->type_id = 5; ///news
        $post->parent_id = 0;
        $post->title = $request->title;
        $post->slug = $this->slug( $request->title );
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->order = $request->order;
        $post->is_ticker = $request->is_ticker;
        $post->is_featured = $request->is_featured;        
        $post->save();

        return redirect('news/'.$post->token);
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
        
        $post->title = $request->title;
        $post->slug = $this->slug( $request->title );
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->order = $request->order;
        $post->is_ticker = $request->is_ticker;
        $post->is_featured = $request->is_featured;        
        $post->save();

        return redirect('news/'.$post->token);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( $this->path.'.create' )
        ->with('title', $this->title );

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

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('post', $post );
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




    /**
     * upload picture
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id )
    {

        //$path = public_path('images/posts/'.$id );
        //$path = '/attachments/photo/posts/'.$id ;
        $path = env( 'PATH_POSTS_PHOTOS' ).$id;

        if( ! file_exists( $path ) ) {

            $result = \File::makeDirectory( $path , 0775, true);
        }

        $filename =  $this->uploadImage( $path, $request->file ) ;

        $post = Post::find( $id );
        $post->picture = $filename ;
        $post->save() ; 
        
        return 'http://files.local/photos/posts/'.$id.'/'.$filename ; //url('/images/posts/'.$id.'/'.$filename);
    }

    

}

