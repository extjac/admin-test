<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    protected $title = 'Teams';

    protected $path = 'team';

    protected $reDirect = 'teams/';


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
        $teams =  Team::select()
        ->with('category')
        ->with('sport')
        ->where('org_id', $this->org_id )
        ->get();
        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('teams', $teams );
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
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/teams/create')
                    ->withErrors( $v )
                    ->withInput();              
        }

        $team = new Team;
        $team->token = $this->token();
        $team->org_id = $this->org_id; 
        $team->sport_id = 1;
        $team->name = $request->name;
        $team->slug = $this->slug( $request->name );
        $team->category_id = $request->category_id;
        $team->description = $request->description;  
        $team->gender = $request->gender;     
        $team->sport_id = $request->sport_id; 
        $team->is_active = $request->is_active;
        $team->save();

        return redirect( '/teams/' . $team->token.'/edit' );
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
        $team =  Team::where( 'token', $token )
                ->where('org_id',  $this->org_id )
                ->first();

        $v = \Validator::make( $request->all(), [
            'name'    => 'required|max:255',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/teams/'.$team->token)
                    ->withErrors( $v )
                    ->withInput();              
        }

        $team->name = $request->name;
        $team->slug = $this->slug( $request->name );
        $team->category_id = $request->category_id;
        $team->description = $request->description;   
        $team->gender = $request->gender;   
        $team->is_active = $request->is_active;
        $team->sport_id = $request->sport_id;
        $team->notes = $request->notes;
        $team->save();

        return redirect( '/teams/' . $team->token .'/edit');
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
        $team = Team::where('token', $token )
        ->where('org_id', $this->org_id )
        ->first();

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('team', $team ) ;        
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
