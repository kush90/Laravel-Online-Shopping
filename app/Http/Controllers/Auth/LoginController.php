<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use DB;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public  function show()
    {
        return view('Auth.login');
    }
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(),'password');
        return array_add($credentials, 'is_activated', 1);

    }

    /* the following method is for user to login before they checkout  if they didn't login earlier*/
    public function check_out_login(Request $request)
    {

       $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        $user=DB::table('users')->where('email',$request->get('email'))->first();


        if(!is_null($user))
        {
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                return redirect()->to('checkout')->with('success','Successfully');
            }
            else
            {
                return redirect()->to('checkout')->with('warning','Password doesn\'t match ');
            }

        }
        else
        {
            return redirect()->to('checkout')->with('warning','Invalid User');
        }


    }
}
