<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    protected $title = 'Users';

    protected $path = 'user';

    protected $reDirect = 'users/';


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
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6',
        ]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users =  User::select()
        ->where('org_id', $this->org_id )
        ->get();

        return view( $this->path.'.index' )
        ->with('title', $this->title )
        ->with('users', $users );
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
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/users/create?errors')
                    ->withErrors( $v )
                    ->withInput();              
        }

        $user = new User;
        $user->token = $this->token();
        $user->org_id = $this->org_id; 
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->address1 = $request->address1;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->is_staff = 1;
        $user->is_active = $request->is_active;
        $user->save();

        return redirect( '/users/' . $user->token );
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
        $user =  User::where( 'token', $token )
        ->where('org_id',  $this->org_id )
        ->first();

        $v = \Validator::make( $request->all(), [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            //'password'      => 'min:6',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/users/'.$user->token)
                    ->withErrors( $v )
                    ->withInput();              
        }

        $user->org_id = $this->org_id; 
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password ? bcrypt($request->password) : $user->password ;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->address1 = $request->address1;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->is_active = $request->is_active;
        $user->notes = $request->notes;
        $user->save();

        return redirect( '/users/' . $user->token );
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
        $user = User::where('token', $token )
        ->where('org_id', $this->org_id )
        ->first();

        if( ! $user ) {
            abort(404);
        }
        
        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('user', $user ) ;        
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMe( )
    {
        $user = User::where('token', \Auth::user()->token )
        ->where('org_id', $this->org_id )
        ->first();

        return view( $this->path.'.edit' )
        ->with('title', $this->title )
        ->with('user', $user ) ;        
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMe(Request $request  )
    {
        $user =  User::where( 'token', \Auth::user()->token  )
        ->where('org_id',  $this->org_id )
        ->first();

        $v = \Validator::make( $request->all(), [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            'password'      => 'min:6',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('/users/'.$user->token)
                    ->withErrors( $v )
                    ->withInput();              
        }

        $user->org_id = $this->org_id; 
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password ? bcrypt($request->password) : $user->password ;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->address1 = $request->address1;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->is_active = $request->is_active;
        $user->notes = $request->notes;
        $user->save();

        return redirect( '/users/' . $user->token );
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
