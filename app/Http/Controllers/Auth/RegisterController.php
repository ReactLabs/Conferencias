<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    //use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    const ADMIN_TYPE = 'admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
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
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $active = false;
        try{
            if (\Auth::user()->type == self::ADMIN_TYPE){
                $active = true;
            }
        }catch(\Exception $e){}
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
            'active' => $active,
        ]);
    }
    /*
     * REGISTERS USERS -> Vendor cut
     *
     * *********************************
     */
    public function showRegistrationForm()
    {
        try{
            if (\Auth::user()->active && \Auth::user()->type == 'admin'){
                return view('auth.register');
            }
        }catch(\Exception $e){
            return view('guest.registerGuest');
        }
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        //$this->guard()->login($user);
        try{
            if (\Auth::user()->active){
                return $this->registered($request, $user)
                    ?: redirect($this->redirectPath())->with('success',"Registration complete");
            }
        }catch(\Exception $e){
            return redirect('login')->with('success',"Pre-registration complete, wait for your approval");
        }
    }
    protected function registered(Request $request, $user)
    {
        //
    }
    /*
    * REDIRECTS USERS -> Vendor cut
    *
    * *********************************
    */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}