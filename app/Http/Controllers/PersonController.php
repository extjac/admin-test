<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{

    protected $title = 'Players';

    protected $path = 'person';

    protected $reDirect = 'person/';


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
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
        ]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPlayer()
    {
       $persons =  Person::select()
        ->where('org_id', $this->org_id )
        ->get();

        return view('player.index' )
        ->with('title', 'Players' )
        ->with('persons', $persons );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePlayer(Request $request)
    {
        $v = \Validator::make( $request->all(), [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/players/create')
                    ->withErrors( $v )
                    ->withInput();              
        }

        $person = new Person;
        $person->token = $this->token();
        $person->org_id = $this->org_id; 
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->birthday = $request->birthday;
        $person->gender = $request->gender;
        $person->bio = $request->bio;
        $person->height = $request->height;
        $person->weight = $request->weight;
        $person->position = $request->position;
        $person->email = $request->email;
        $person->secondary_email = $request->secondary_email;
        $person->primary_phone = $request->primary_phone;
        $person->secondary_phone = $request->secondary_phone;       
        $person->gender = $request->gender;
        $person->address = $request->address;
        $person->address1 = $request->address1;
        $person->city = $request->city;
        $person->postal_code = $request->postal_code;
        $person->state = $request->state;
        $person->country = $request->country;
        $person->is_active = $request->is_active;
        $person->save();

        return redirect( '/players/' . $person->token.'/edit' );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePlayer(Request $request, $token )
    {
        $person =  Person::where( 'token', $token )
        ->where('org_id',  $this->org_id )
        ->first();

        $v = \Validator::make( $request->all(), [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/players/'.$person->token)
                    ->withErrors( $v )
                    ->withInput();              
        }

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->birthday = $request->birthday;
        $person->gender = $request->gender;
        $person->bio = $request->bio;
        $person->height = $request->height;
        $person->weight = $request->weight;
        $person->position = $request->position;
        $person->email = $request->email;
        $person->secondary_email = $request->secondary_email;
        $person->primary_phone = $request->primary_phone;
        $person->secondary_phone = $request->secondary_phone;       
        $person->gender = $request->gender;
        $person->address = $request->address;
        $person->address1 = $request->address1;
        $person->city = $request->city;
        $person->postal_code = $request->postal_code;
        $person->state = $request->state;
        $person->country = $request->country;
        $person->is_active = $request->is_active;
        $person->position = $request->position;
        $person->notes = $request->notes;
        $person->save();

        return redirect( '/players/' . $person->token .'/edit');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPlayer()
    {
        return view( 'player.create' )
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
    public function editPlayer( $token )
    {
        $person = Person::where('token', $token )
        ->where('org_id', $this->org_id )
        ->first();

        return view( 'player.edit' )
        ->with('title', $this->title )
        ->with('person', $person ) ;        
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
