@extends('Template.TemplateFrontEnd')
@section('nama', Session::get('nama'))
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
			<div class="card shadow" style="border: none; margin-top: 100px; width: 80%">
				<div class="card-header bg-white" style="border: none;">
				@foreach($view as $array)	
					<h4 class="text-warning mt-1">
						{{Session::get('nama')}}
					</h4>
					<!-- KONDISI STATUS -->
					<h5 class="float-right">
						<?php echo date('d F Y', strtotime($array->tgl_pengaduan)); ?>
					</h5>
				@if($array->status == 'Pending')
					<h5 class="text-danger">
						<i class="fas fa-ban fa-spin"></i>&nbsp;Belum Terverifikasi
					</h5>
				@elseif($array->status == 'Proses')
					<h5 class="text-primary">
						<i class="fas fa-sync-alt fa-spin"></i>&nbsp;Dalam Proses
					</h5>
				@else
					<h5 class="text-success">
						<i class="fas fa-check"></i>&nbsp;Sukses Teratasi
					</h5>
				@endif
				</div>

				<!-- TAMPILAN PENGADUAN USER -->
				<div class="card-body">
					<div id="IsiLaporan">
						<p class="text-center">
						{{$array->isi_laporan}}
						</p>

						<a class="btn btn-outline-secondary mt-3" href="../data_gambar/{{$array->foto}}">
						&bull; &nbsp;Lihat Lampiran
						</a>
					</div>

					<!-- EDIT FORM -->
					<div id="EditForm" hidden>
						<form action="{{url('/home/update')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" name="inId" value="{{$array->id_pengaduan}}">
							<div class="form-group">
								<textarea name="inIsi" class="form-control" rows="8" style="resize: none; border: 1px solid;">{{$array->isi_laporan}}</textarea>
							</div>
							<div class="form-group">
								<button id="customBtn" class="form-control bg-warning border-danger" type="button">
									<p id="text-file" class="text-white">{{$array->foto}}</p>
								</button>
								<input name="inFoto" class="btn btn-warning" type="file" id="realFile" hidden>
							</div>
							<div class="form-group">
								<button class="btn btn-warning text-white" style="margin-right: 580px;"><b>KIRIMKAN</b></button>
							</div>
						</form>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#TombolEdit').click(function(){
								$('#IsiLaporan').hide();
								$('#EditForm').removeAttr('hidden');
							})
						});
					</script>
				</div>

				@if($array->status == 'Pending')
				<div class="card-footer bg-white">
					<a id="TombolEdit" href="javascript:" class="card-link"><i class="fas fa-cog"></i>&nbsp;Edit Laporan</a>
					<a href="javascript:" onclick="deleteSwal({{$array->id_pengaduan}})" class="card-link"><i class="fas fa-minus-circle"></i>&nbsp;Hapus Laporan</a>
				</div>
				@endif

				@endforeach
			</div>
		</div>
	</div>

@endsection