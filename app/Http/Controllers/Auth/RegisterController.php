<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use DB;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:10|confirmed',

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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function show()
    {
        return view('Auth.register');
    }
    /* the following method is user registration */
    public  function register(Request $request)
    {
        $input=$request->all();
        $validator=$this->validator($input);
        $errors=$validator->errors();

        if($validator->passes())
        {
            $user = $this->create($input)->toArray();
            $user['token']=str_random(30);

            DB::table('user_activations')->insert(['id_user'=>$user["id"],'token'=>$user['token']]);

            /*sending mail to user for account activation */
            Mail::send('email.activation',$user,function($message) use ($user){
                $message->to($user['email']);
                $message->subject('Account Verification ');
            });
            return redirect()->to('users/login')->with('success','We sent Activation code to your Mail,Please check your Mail');
        }
        else
        {

            return redirect()->back()->with('errors',$errors);
        }
    }
    /* the following method is for account activation */
    public  function  userActivation($token)
    {
        $user_token=DB::table('user_activations')->where('token',$token)->first();

        if(!is_null($user_token))
        {
            $user= User::find($user_token->id_user);


            if($user->is_activated==1)
            {

                return  redirect()->to('users/login')->with('success','Your Account is already  Activated');
            }
            else
            {

                $user->is_activated=1;
                $user->save();
                DB::table('user_activations')->where('token',$token)->delete();
                return redirect()->to('users/login')->with('success','Your Account is  activated Successfully');
            }



        }
        return redirect()->to('users/login')->with('warning','Your Token  is  invalid');

    }
}
