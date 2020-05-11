<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 


use DB;

/**
 * 
 */
class PetugasController extends Controller
{

	public function view(){
		if(!Session::get('loginAdmin')){
        	return redirect('/login/admin')->with('alert','Kamu harus login dulu');
    	}
    	else{
    		$petugas = DB::table('petugas')->get();
			return view('Back.DataPetugas',['petugas'=>$petugas]);
    	}
		
	}

	public function store(Request $request){
		$this->validate($request, [
			'inNama'=>'required',
			'inUsername'=>'required',
			'inPassword'=>'required',
			'inTelp'=>'required',
			'inLevel'=>'required'
		]);

		DB::table('petugas')->insert([
			'nama_petugas'=>request('inNama'),
			'username'=>request('inUsername'),
			'password'=>request('inPassword'),
			'telp'=>request('inTelp'),
			'level'=>request('inLevel'),
		]);
		return redirect('admin/viewPetugas');
	}

	public function json($id){
		$result = DB::table('petugas')->where('id_petugas',$id)->first();
		return response()->json($result);
	}

	public function update(Request $request){
		DB::table('petugas')->where('id_petugas', $request->inId)->update([
			'nama_petugas'=>request('inNama'),
			'username'=>request('inUsername'),
			'password'=>request('inPassword'),
			'telp'=>request('inTelp'),
			'level'=>request('inLevel'),
		]);
		return redirect('admin/viewPetugas');
	}

	public function delete($id){
		DB::table('petugas')->where('id_petugas', $id)->delete();
		return redirect('admin/viewPetugas');
	}

}
