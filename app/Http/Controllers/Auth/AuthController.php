<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';



    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'password'      => 'required|confirmed|min:6',
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create( [
            'first_name'=> $data['first_name'],
            'last_name' => $data['last_name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']
            ),
        ]);
    }


    /**
     * Show user login form
     *
     * @param  array  $data
     * @return User
     */
    protected function login( )
    {
        return view( 'auth.login');
    }

    /**
     * Show user register form
     *
     * @param  array  $data
     * @return User
     */
    protected function register( )
    {
        return view( 'auth.register');
    }


    /**
     * Show user form
     *
     * @param  array  $data
     * @return User
     */
    protected function logout( )
    {
        \Auth::logout();
        return redirect( 'login');
    }
 



    /**
     * Create a new user 
     *
     * @param  array  $data
     * @return User
     */
    protected function store( Request $request )
    {

        $v = Validator::make( $request->all(), [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|confirmed|min:6',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
            return redirect('register')
                    ->withErrors( $v )
                    ->withInput();              
        }

        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt( $request->input('password') );
        $user->token = str_random(60); 
        $user->save();
        
        return redirect( 'home' );

    }//end function



    /**
     * Login User
     *
     * @param  array  $data
     * @return User
     */
    protected function postLogin( Request $request )
    {
        $v = Validator::make( $request->all(), [
            'email'         => 'required|email|max:255',
            'password'      => 'required|min:6',
        ]);

        if( $v->fails() )
        {
             return redirect('login')
                    ->withErrors( $v )
                    ->withInput();
        }

        $credentials = [
            'email'     => $request->input('email'), 
            'password'  => $request->input('password'), 
            'is_active' => 1
        ];

        if ( Auth::attempt( $credentials ) ) 
        {
            return redirect( 'home' );
        }
        else
        {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return back()
            ->withErrors( ['Credentials not valid' ] )
            ->with('errors', true);

        }     

    }//end function    




    /**
     * Login User
     *
     * @param  array  $data
     * @return User
     */
    protected function getPassword( Request $request )
    {
        return view( 'auth.passwords.email' );
    }//end function    




    /**
     * Login User
     *
     * @param  array  $data
     * @return User
     */
    protected function postPassword( Request $request )
    {
        $v = Validator::make( $request->all(), [
            'email'         => 'required|email|max:255',
        ]);

        if( $v->fails() )
        {
            //return response( [ $v->errors()->toArray() ], 422 );
 
            return redirect('password/reset')
                    ->withErrors( $v )
                    ->withInput();              
        }

        $user = User::where('email', $request->input('email') )->first();

        if ( $user ) 
        {
            return 'email sent';

        } 
        else 
        {
            //return Redirect::back()->withErrors(['msg', 'The Message']);
            return back()->withErrors( ['Email not valid' ] );

        }     

    }//end function    




}
