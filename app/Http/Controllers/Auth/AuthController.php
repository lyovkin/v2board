<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;
use ZaWeb\Core\Controllers\AbstractController;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends AbstractController
{

    use AuthenticatesAndRegistersUsers;


    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Requests\Auth\RegisterRequest $request)
    {
        /*$validator = $this->registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }*/

        $user = $this->registrar->create($request->all());

        $this->auth->login($user);

        \ProfileService::createProfile($request, $user['id']);

        return redirect('/');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))) {

            if (\Auth::user()->last_login < date('Y-m-d')) {
                DB::table('users')
                    ->where('id', '=', \Auth::user()->id)
                    ->update(array('ads_rise' => 5, 'last_login' => new Carbon()));
            }
                return redirect()->intended($this->redirectPath());
            }

            return redirect($this->loginPath())
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
        }

    }
