<?php

namespace App\Http\Controllers;

use App\TeamCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamCategoryController  extends Controller
{

    protected $title = 'Categories';

    protected $path = 'teamcategory';

    protected $reDirect = 'categories/';


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->org_id = \Auth::user()->org_id ;
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'    => 'required|max:255',
        ]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories =  TeamCategory::select()
        ->where('org_id', $this->org_id )
        ->get();

        return view( 'teamcategory.index' )
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
        $v = \Validator::make( $request->all(), [
            'name'    => 'required|max:255',
        ]);
        if( $v->fails() )
        {
            return redirect('/categories/create')
            ->withErrors( $v )
            ->withInput();              
        }

        $category = new TeamCategory;
        $category->token = $this->token();
        $category->org_id = $this->org_id; 
        $category->name = $request->name;
        $category->description = $request->description;       
        $category->is_active = $request->is_active;
        $category->save();

        return redirect( '/teams/categories/' . $category->token .'/edit' );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $token )
    {
        $category =  TeamCategory::where( 'token', $token )
                ->where('org_id',  $this->org_id )
                ->first();

        $v = \Validator::make( $request->all(), [
            'name'    => 'required|max:255',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/teams/'.$category->token)
                    ->withErrors( $v )
                    ->withInput();              
        }

        $category->name = $request->name;
        $category->description = $request->description;       
        $category->is_active = $request->is_active;
        $category->save();

        return redirect( '/teams/categories/' . $category->token .'/edit');
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
        $category = TeamCategory::where('token', $token )
        ->where('org_id', $this->org_id )
        ->first();

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('category', $category ) ;        
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $token )
    {
        User::where('token', $token )
        ->where('org_id', $this->org_id )
        ->delete();
    }

}
