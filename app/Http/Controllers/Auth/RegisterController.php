<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Mail\Auth\VerifyMail;
use Illuminate\Routing\Redirector;

//use Illuminate\Support\Facades\Mail;
//use App\Mail\RegistrationMail;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */

    // https://klisl.com/laravel-email-confirmation.html
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('login')
            ->with('success', 'Проверьте свою электронную почту и нажмите на ссылку, чтобы подтвердить свой аккаунт.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

        // Отключаем регистрацию (создание нового пользователя!)
        // чтобы включить, надо закомментировать следующий return
        return redirect()->route('home');

        // Mail

//        Mail::send('mail.registration', $data, function($message) use ($data)
//        {
//            $message->from('no-reply@site.com', "Site name");
//            $message->subject("Welcome to site name");
//            $message->to($data['email']);
//        });

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_token' => Str::random(),
            'status' => User::STATUS_INACTIVE,
        ]);

        // Если комментируем, то блокируем проверку e-mail и пользователь не сможет его подтвердить и залогиниться в системе
        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;

    }

    public function verify($token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login')
                ->with('error', 'Ваш e-mail не может быть идентифицирован, проверьте свою почту и подтвердите свой e-mail (!)');
        }

        $user->status = User::STATUS_ACTIVE;
        $user->verify_token = null;
        $user->save();

        return redirect()->route('login')
            ->with('success', 'Ваш e-mail идентифицирован! Вы можете войти в систему:');
    }

}
