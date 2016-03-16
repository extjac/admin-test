<?php

namespace App\Http\Controllers;

use App\Item;
use App\OrderDetail;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    protected $title = 'Events';

    protected $path = 'item';

    protected $reDirect = 'items';


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
       $items =  Item::select()
        ->with('category')
        ->where('org_id', $this->org )
        ->orderBy('name')
        ->get();

        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('items', $items );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->token = $this->token();
        $item->org_id = \Auth::user()->org_id; 
        $item->site_id = $request->site_id; 
        $item->type_id = 1; ///Online Registartion
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->slug = $this->slug( $request->name );
        $item->excerpt = $request->excerpt;
        $item->description = $request->description;
        $item->is_active = $request->is_active;
        $item->price = $request->price;
        $item->currency = $request->currency;
        $item->is_featured = $request->is_featured;        

        $item->start_date_time = $request->start_date_time; 
        $item->end_date_time = $request->end_date_time; 

        $item->save();

        return redirect('/items/'.$item->token.'/edit' );
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
        $item = Item::where('token', $token )->first();
        
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->slug = $this->slug( $request->name );
        $item->excerpt = $request->excerpt;
        $item->description = $request->description;
        $item->is_active = $request->is_active;
        $item->price = $request->price;
        $item->currency = $request->currency;
        $item->is_featured = $request->is_featured; 
        $item->start_date_time = $request->start_date_time; 
        $item->end_date_time = $request->end_date_time;         
        $item->save(); 

        return redirect('items/'.$item->token.'/edit' );
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
        $item = Item::where('token', $token )->first();
        
        $participants = OrderDetail::findParticipants( $token );

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('item', $item )
        ->with('participants', $participants);
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

