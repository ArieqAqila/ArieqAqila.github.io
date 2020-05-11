<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


use DB;

/**
 * 
 */
class PengaduanController extends Controller
{

	//--F--R--O--N--T--------|--FRONTEND--|---------E----N----D----\\

	public function index(){
		if(!Session::get('login')){
            return redirect('/login')->with('alert','Kamu harus login dulu');
        }
        else{
        	$pengaduan = DB::table('pengaduan')->where('nik', Session::get('nik'))->get();
        	$data = DB::table('pengaduan')
		        	->join('masyarakat','pengaduan.nik','=','masyarakat.nik')
		        	->whereBetween('status', ['Proses','Selesai'])
		        	->paginate(3);
            return view('Front/Home',['pengaduan'=>$pengaduan, 'data'=>$data]);
        }
	}

	public function store(Request $request){
		

		$file = $request->file('inFoto');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'data_gambar';
		$file->move($tujuan_upload,$nama_file);

		$id = DB::table('pengaduan')->insertGetId([
			'tgl_pengaduan'=>request('inTgl'),
			'nik'=>request('inNIK'),
			'isi_laporan'=>request('inIsi'),
			'foto'=>$nama_file,
			'status'=>request('inStatus'),
		]);
		return redirect('/catch/'.$id);
	}

	public function catch($id){
		if(!Session::get('login')){
            return redirect('/login')->with('alert','Kamu harus login dulu');

        }else{

		    $view = DB::table('pengaduan')->where('id_pengaduan',$id)->get();
			return view('Front.CekPengaduan', ['view' => $view]);
		}
    }
		

	public function update(Request $request){

		$file = $request->file('inFoto');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'data_gambar';
		$file->move($tujuan_upload,$nama_file);

		DB::table('pengaduan')->where('id_pengaduan',$request->inId)->update([
			'isi_laporan'=>request('inIsi'),
			'foto'=>$nama_file,
		]);

		$data = DB::table('pengaduan')->where('id_pengaduan',$request->inId)->first();
		$id = $data->id_pengaduan;
		return redirect('/catch/'.$id);
	}

	public function delete($id){
		$data = DB::table('pengaduan')->where('id_pengaduan',$id)->first();

		$foto = 'data_gambar/'.$data->foto;
		if(file_exists($foto))
		{
		  unlink($foto);
		}

		DB::table('pengaduan')->where('id_pengaduan', $id)->delete();
		return redirect('/home');
	}

	//---B---A---C---K------|--BACKEND(Verifikasi)--|---------E----N----D----\\

	public function tampil(){
		if(!Session::get('loginAdmin')){
        	return redirect('/login/admin')->with('alert','Kamu harus login dulu');
    	}
    	else{
    		$data = DB::table('pengaduan')->where('status', "Pending")->get();
			return view('Back/DataPengaduan',['data' => $data]);
    	}
		
	}

	public function verifikasi($id){
		$data = DB::table('pengaduan')
				->join('masyarakat','pengaduan.nik','=','masyarakat.nik')
		        ->where('id_pengaduan',$id)->get();
		$masyarakat = DB::table('masyarakat')->get();
		return view('Back/VerifikasiPengaduan',['data' => $data, 'masyarakat' => $masyarakat]);
	}

	public function validasi($id){
		$data = DB::table('pengaduan')->where('id_pengaduan',$id)->update([
			'status' => 'Proses'
		]);
		return redirect('admin/viewPengaduan');
	}

}
