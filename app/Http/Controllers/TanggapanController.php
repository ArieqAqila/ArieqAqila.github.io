<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Session;


use DB;

/**
 * 
 */
class TanggapanController extends Controller
{

	public function view(){
		if(!Session::get('loginAdmin')){
        	return redirect('/login/admin')->with('alert','Kamu harus login dulu');
    	}
    	else{
    		$pengaduan = DB::table('pengaduan')->whereBetween('status', ['Proses','Selesai'])->get();
			$tanggapan = DB::table('tanggapan')->get();
			return view('Back/DataTanggapan',['pengaduan'=>$pengaduan]);
    	}
		
	}

	public function insert($id){
		$data = DB::table('pengaduan')
				->join('masyarakat','pengaduan.nik','=','masyarakat.nik')
				->where('id_pengaduan', $id)->get();
		$petugas = DB::table('petugas')->get();
		return view('Back/BuatTanggapan',['data' => $data, 'petugas' => $petugas]);
	}

	public function store(){
		$id = DB::table('tanggapan')->insert([
			'id_pengaduan'=>request('inPengaduan'),
			'tgl_tanggapan'=>Carbon::now(),
			'tanggapan'=>request('inIsi'),
			'id_petugas'=>request('inPetugas'),
		]);
	}

	public function json(){
		
	}

	public function update(){
		
	}

	public function delete(){
		
	}

}
