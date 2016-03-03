<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemCategoryController extends Controller
{

    protected $title = 'Categories';

    protected $path = 'itemcategory';

    protected $reDirect = 'itemcategory';


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
       $categories =  ItemCategory::select()
        ->where('org_id', $this->org )
        ->orderBy('name')
        ->get();
        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('categories', $categories );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new ItemCategory;
        $cat->token = $this->token();
        $cat->org_id = \Auth::user()->org_id; 
        $cat->site_id = $request->site_id; 
        $cat->parent_id = 0; ///Online Registartion
        $cat->name = $request->name;
        $cat->slug = $this->slug( $request->name );
        $cat->description = $request->description;
        $cat->is_active = $request->is_active;
        $cat->save();

        return redirect('/items/categories/'.$cat->token.'/edit' );
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
        $cat = ItemCategory::where('token', $token )->first();
        
        $cat->token = $this->token();
        $cat->org_id = \Auth::user()->org_id; 
        $cat->site_id = $request->site_id; 
        $cat->parent_id = 0; ///Online Registartion
        $cat->name = $request->name;
        $cat->slug = $this->slug( $request->name );
        $cat->description = $request->description;
        $cat->is_active = $request->is_active;
        $cat->save();

        return redirect('/items/categories/'.$cat->token.'/edit' );
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
        $category = ItemCategory::where('token', $token )->first();

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('category', $category );
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

            //$result = \File::makeDirectory( $path , 0775, true, true);
           // $result = \Storage::disk('public')->makeDirectory( $path );
        }

        $filename =  $this->uploadImage( $path, $request->file ) ;

        $post = Post::find( $id );
        $post->picture = $filename ;
        $post->save() ; 
        
        return 'http://files.local/photos/items/'.$id.'/'.$filename ; //url('/images/posts/'.$id.'/'.$filename);
    }

    

}

