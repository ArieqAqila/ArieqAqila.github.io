@extends('Template.TemplateBackEnd')
@section('konten')

<script type="text/javascript">
	function deleteSwal(id){
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan bisa mengembalikan data",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Oke, saya yakin!'
			}).then((result) => {
				if (result.value) {
					Swal.fire(
					'Terhapus',
					'Anda akan menuju ke halaman utama',
					'success'
					).then((result)=>{
						if (result.value) {
						window.location.replace("{{url('/home/delete/')}}/"+id);
					}
				})
			}
		})
	}
</script>

	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow" style="border: none; margin-top: 20px; width: 80%">
				<div class="card-header bg-white" style="border: none;">
				@foreach($data as $array)
					<h4>
						<span class="text-warning mt-1">Laporan di tulis oleh {{$array->nama}}</span>
						<span class="float-right" style="font-size: 21px;"><?php echo date('d F Y', strtotime($array->tgl_pengaduan)); ?></span>
					</h4>
					
				</div>
				<!-- TAMPILAN PENGADUAN USER -->
				<div class="card-body">
					<div id="IsiLaporan">
						<p class="text-center">
						{{$array->isi_laporan}}
						</p>

						<a class="btn btn-outline-secondary" href="../../data_gambar/{{$array->foto}}">
						&bull; &nbsp;Lihat Lampiran
						</a>
					</div>
				</div>

				<div class="card-footer bg-white">
					<a href="{{url('admin/validasi')}}/{{$array->id_pengaduan}}" class="card-link">
						<i class="fas fa-cog"></i>&nbsp;Validasi Laporan
					</a>
					<a href="javascript:" onclick="deleteSwal({{$array->id_pengaduan}})" class="card-link">
						<i class="fas fa-minus-circle"></i>&nbsp;Hapus Laporan
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection