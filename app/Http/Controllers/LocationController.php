<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{

    protected $title = 'Location';

    protected $path = 'location';

    protected $reDirect = 'locations/';


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
       $locations =  Location::select(  )
        ->where('org_id', $this->org_id )
        ->get();

        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('locations', $locations );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location;
        $location->token = $this->token();
        $location->org_id = $this->org_id; 
        //$location->site_id = $request->site_id; 
        $location->type_id = 1;
        $location->name = $request->name;
        $location->slug = $this->slug( $request->name );
        $location->description = $request->description;
        $location->is_active = $request->is_active;
        $location->address = $request->address;
        $location->address1 = $request->address1;
        $location->city = $request->city;
        $location->postal_code = $request->postal_code;
        $location->state = $request->state;
        $location->country = $request->country;
        $location->save();

        return redirect( '/locations/' . $location->token );
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
        $location =  Location::where( 'token', $token )->first();
        $location->org_id = $this->org_id; 
        //$location->site_id = $request->site_id; 
        $location->type_id = 1;
        $location->name = $request->name;
        $location->slug = $this->slug( $request->name );
        $location->description = $request->description;
        $location->is_active = $request->is_active;
        $location->address = $request->address;
        $location->address1 = $request->address1;
        $location->city = $request->city;
        $location->postal_code = $request->postal_code;
        $location->state = $request->state;
        $location->country = $request->country;        
        $location->save();

       // return $request; 

        return redirect( '/locations/' . $location->token );
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
        $location = Location::where('token', $token )->first();

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('location', $location ) ;        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $token )
    {
        Location::where('token', $token )->delete();
    }

}
