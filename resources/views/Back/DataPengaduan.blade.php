@extends('Template.TemplateBackEnd')
@section('nama', Session::get('nama_petugas'))
@section('konten')

<style type="text/css">
	.gradient{
		background: rgb(117,79,255);
		background: radial-gradient(circle, rgba(117,79,255,1) 26%, rgba(0,202,255,1) 100%);
	}
	.modal {
	  text-align: center;
	}

	@media screen and (min-width: 768px) { 
	  .modal:before {
	    display: inline-block;
	    vertical-align: middle;
	    content: "";
	    height: 100%;
	  }
	}

	.modal-dialog {
	  display: inline-block;
	  text-align: left;
	  vertical-align: middle;
	  width: 100%;
	}
</style>

<script type="text/javascript">
	function update(id){
		//alert(id);
		//window.location.href = "{{url('admin/viewMasyarakat/json')}}/"+id;

		$.ajax({
			type: "GET",
			url: "{{url('admin/viewMasyarakat/json')}}/"+id,
			success: function(result){
				$('#updateId').val(id);
				$('#updateNIK').val(result.nik);
				$('#updateNama').val(result.nama);
				$('#updateUsername').val(result.username);
				$('#updatePassword').val(result.password);
				$('#updateTelp').val(result.telp);

				$('#modalUpdate').modal('show');
			}
		});
	}

	function deleteSwal(id){
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					).then((result)=>{
						if (result.value) {
						window.location.replace("{{url('admin/viewMasyarakat/delete/')}}/"+id);
					}
				})
			}
		})
	}
</script>

	<div class="container-fluid" style="margin-top: 15px;">
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
        	</div>
        @endif
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table mr-1"></i>
				Data Pengaduan
			</div>
			<div class="card-body">
				<input class="float-right" id="myInput" type="text" onkeyup="myFunction()">
				<p class="float-right" style="font-size: 18px;">Search: &nbsp;</p>
				<div class="table-responsive-md">
					<table class="table table-bordered" id="myTable">
					  <thead class="bg-info text-white">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">NIK</th>
					      <th scope="col">Isi Pengaduan</th>
					      <th scope="col">Tanggal</th>
					      <th scope="col">Foto</th>
					      <th scope="col">Status</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $no = 1; ?>
					  	@foreach($data as $p)
					    <tr>
					      <th scope="row"><?php echo $no; $no++; ?></th>
					      <td>{{$p->nik}}</td>
					      <td>{{$p->isi_laporan}}</td>
					      <td>
					      	<?php echo date('d F Y', strtotime($p->tgl_pengaduan)); ?>
					      </td>
					      <td><img width="200px" src="../data_gambar/{{$p->foto}}"></td>
					      <td>{{$p->status}}</td>
					      <th>
							<a href="{{url('admin/verifikasi')}}/{{$p->id_pengaduan}}" class="btn btn-outline-primary">
								Verifikasi
							</a>
					      </th>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection