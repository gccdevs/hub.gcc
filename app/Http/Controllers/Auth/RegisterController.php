<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserInvitation;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/dashboard';

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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function showRegistrationForm()
    {
        return view('404');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    public function invite(Request $request)
    {
        try{

            $this->validateCreation($request->all())->validate(); // validate requested inputs
            $roleId = Role::where('role_title',request('role'))->firstOrFail()->id; // role id get by role selected by user

        } catch( \Exception $e){
            return response()->json(['message' => 'taken', 'reason' => $e->getMessage()]);
        }

        $user = new User([
            'name' => request('name'),
            'email' => request('email'),
            'invited_by' => request('invitedId'),
            'password' => bcrypt(str_random(20)),
            'role' => $roleId,
            'is_active' => false
        ]);

        $user->setInviteToken(str_random(99));

        $user->save();

        try{
            Mail::to($user)->queue(new UserInvitation($user)); // send confirmation email

        } catch(\Exception $e) {
            return response()->json(['message' => 'failed', 'reason' => $e->getMessage()]);
        }

        return response()->json(['message' => 'sent']);

    }

    private function validateCreation(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:50|min:2',
            'email' => 'required|string|email|max:50|unique:forms',
            'role' => 'required|in:Admin,User'
        ]);

    }


    public function activateInvitation()
    {

    }

}
