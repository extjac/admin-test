<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{

    protected $title = 'Organizations';

    protected $path = 'organization';

    protected $reDirect = 'organization/';


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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $org =  Organization::select()
        ->where('id',  $this->org_id )
        ->first();

        $v = \Validator::make( $request->all(), [
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'paypal'  => 'required|email|max:255',
            //'password'      => 'min:6',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect( '/organizations/' )
                    ->withErrors( $v )
                    ->withInput();              
        }

        $org->name = $request->name;
        $org->about = $request->about;
        $org->email = $request->email;
        $org->paypal = $request->paypal;
        $org->phone = $request->phone;
        $org->address = $request->address;
        $org->address1 = $request->address1;
        $org->city = $request->city;
        $org->postal_code = $request->postal_code;
        $org->state = $request->state;
        $org->country = $request->country;
        $org->save();

        return redirect( 'organizations');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function edit(  )
    {
        $org = Organization::select( )
        ->where('id', $this->org_id )
        ->first();

        if( ! $org ) {
            abort(404, 'Resource Not found');
        }

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('org', $org ) ;        
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $token )
    {

    }



}
