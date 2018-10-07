<?php

namespace App\Http\Controllers\ActivityCoordinator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Password;
use Auth;

class ResetPasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    protected $redirectTo = '/activitycoordinator/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:activitycoordinator');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('ActivityCoordinator/Auth.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]);
    }

    protected function resetPassword($user, $password)
    {
    $user->forceFill([
        'password' => bcrypt($password),
        'remember_token' => Str::random(60),])->save();
    }

    protected function guard()
    {
      return Auth::guard('activitycoordinator');
    }

    protected function broker() {
        return Password::broker('activitycoordinators');
    }

}
