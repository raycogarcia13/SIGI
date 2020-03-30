<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Session as MySess;


class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct(Request $request)
    {
        if($request->has('ruta'))
            $this->redirectTo=$request->ruta;
        
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return $this->sendLoginResponse($request);
        }
        else{
            $request->session()->invalidate();
            $request->session()->flash('status', 'El usuario token invalido, por favor refresque la página');
            return redirect('/');
        }
    }

    public function username()
    {
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {
        if(!$user->activo)
        {
            $request->session()->flash('login', 'El usuario está inactivo!');
            return $this->logout($request);
        }
        Auditoria::create([
            'usuario_id'=>$user->id,
            'nombre_pc'=>'local',
            'ip_pc'=>$_SERVER['REMOTE_ADDR'],
            'mac_pc'=>'',
            'modulo'=>$this->redirectTo,
            'accion'=>'Login',
            'metodo'=>'POST',
            'consulta'=>'Autenticación'
        ]);
    }

    public function logout(Request $request)
    {
        if(Auth::user()->activo)
            Auditoria::create([
                'usuario_id'=>Auth::user()->id,
                'nombre_pc'=>'local',
                'ip_pc'=>$_SERVER['REMOTE_ADDR'],
                'mac_pc'=>'',
                'modulo'=>'/',
                'accion'=>'Logout',
                'metodo'=>'POST',
                'consulta'=>'Salir del sitio'
            ]);
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    protected function sendLoginResponse(Request $request)
    {
        $previous_session = Auth::User()->session_id;
        $se=MySess::all()->first();
        $act=false;
        if(!$se->simultaneo)
            if ($previous_session) {
                if(Session::getHandler()->read($previous_session))
                {
                    $request->session()->invalidate();
                    $request->session()->flash('status', 'El usuario ya está autenticado en el sistema');
                    $act=true;
                    return redirect('/');
                }
            }
        if(!$act)
        {
            $request->session()->regenerate();
            Auth::user()->session_id = Session::getId();
            Auth::user()->save();
            $this->authenticated($request,Auth::User());
            return redirect($this->redirectTo);
        }
        return "Error";
    }
}
