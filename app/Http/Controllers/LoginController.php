<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**
 * 
 */
class LoginController extends Controller
{
	//--F--R--O--N--T--------|--FRONTEND--|---------E----N----D----\\
	public function login(Request $request){
		$username = $request->username;
		$pass = $request->password;

		$check = DB::table('masyarakat')->where('password',$pass)->first();
		if ($check) {//cek data password
			if ($pass == $check->password) {
				Session::put('nik', $check->nik);
				Session::put('nama', $check->nama);
				Session::put('username', $check->username);
				Session::put('login', TRUE);
				return redirect('/home');
			}else{
				return redirect('/login')->with('alert','Password atau Email, Salah !');
			}
		}else{
			return redirect('/login')->with('alert','Password atau Email, Salah !');
		}
	}

	public function logout(){
        Session::flush();
        return redirect('/')->with('alert-logout','Kamu sudah logout');
    }

    public function register(Request $request){
    	$this->validate($request, [
    		'inNIK' => 'required',
    		'inNama' => 'required',
    		'inUsername' => 'required',
    		'inPassword' => 'required',
    		'inTelp' => 'required',
    	]);

    	DB::table('masyarakat')->insert([
    		'nik' => request('inNIK'),
    		'nama' => request('inNama'),
    		'username' => request('inUsername'),
    		'password' => request('inPassword'),
    		'telp' => request('inTelp'),
    	]);
    	return redirect('/login');
    }


    //---B---A---C---K------|--BACKEND--|---------E----N----D----\\
    public function index(){
		if(!Session::get('loginAdmin')){
            return redirect('/login/admin')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('Back/HomeAdmin');
        }
	}

    public function loginAdmin(Request $request){
		$username = $request->username;
		$pass = $request->password;

		$check = DB::table('petugas')->where('password',$pass)->first();
		if ($check) {//cek data password
			if ($pass == $check->password) {
				Session::put('level', $check->level);
				Session::put('nama_petugas', $check->nama_petugas);
				Session::put('username', $check->username);
				Session::put('loginAdmin', TRUE);
				return redirect('/admin');
			}else{
				return redirect('/login/admin')->with('alert','Password atau Email, Salah !');
			}
		}else{
			return redirect('/login/admin')->with('alert','Password atau Email, Salah !');
		}
	}

	public function logoutAdmin(){
        Session::flush();
        return redirect('/login/admin')->with('alert-logout','Kamu sudah logout');
    }

}