<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 


use DB;

/**
 * 
 */
class MasyarakatController extends Controller
{

	public function view(){
		if(!Session::get('loginAdmin')){
        	return redirect('/login/admin')->with('alert','Kamu harus login dulu');
    	}
    	else{
    		$public = DB::table('masyarakat')->get();
			return view('Back.DataMasyarakat',['masyarakat'=>$public]);
    	}
		
	}

	public function store(Request $request){
		$this->validate($request, [
			'inNIK'=>'required',
			'inNama'=>'required',
			'inUsername'=>'required',
			'inPassword'=>'required',
			'inTelp'=>'required',
		]);

		DB::table('masyarakat')->insert([
			'nik'=>request('inNIK'),
			'nama'=>request('inNama'),
			'username'=>request('inUsername'),
			'password'=>request('inPassword'),
			'telp'=>request('inTelp'),
		]);
		return redirect('admin/viewMasyarakat');
	}

	public function json($id){
		$result = DB::table('masyarakat')->where('id',$id)->first();
		return response()->json($result);
	}

	public function update(Request $request){
		DB::table('masyarakat')->where('id',$request->inId)->update([
			'nik'=>request('inNIK'),
			'nama'=>request('inNama'),
			'username'=>request('inUsername'),
			'password'=>request('inPassword'),
			'telp'=>request('inTelp'),
		]);
		return redirect('admin/viewMasyarakat');
	}

	public function delete($id){
		DB::table('masyarakat')->where('id',$id)->delete();
		return redirect('admin/viewMasyarakat');
	}

}
