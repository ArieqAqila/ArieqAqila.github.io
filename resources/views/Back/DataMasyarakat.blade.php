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
				Data Masyarakat
				<button type="button" class="btn btn-primary float-right" onclick="$('#modalTambah').modal('show')">
    				Tambah Data
    				<i class="fas fa-plus-circle"></i>
    			</button>
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
					      <th scope="col">Nama Lengkap</th>
					      <th scope="col">Username</th>
					      <th scope="col">Password</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $no = 1; ?>
					  	@foreach($masyarakat as $p)
					    <tr>
					      <th scope="row"><?php echo $no; $no++; ?></th>
					      <td>{{$p->nik}}</td>
					      <td>{{$p->nama}}</td>
					      <td>{{$p->username}}</td>
					      <td>{{$p->password}}</td>
					      <th>
							<button type="button" class="btn btn-success" onclick="update({{$p->id}})">
								<i class="fas fa-cog"></i>
							</button>
							<button type="button" class="btn btn-danger" onclick="deleteSwal({{$p->id}})">
								<i class="fas fa-trash"></i>
							</button>
					      </th>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Create Data Public Identity -->
	<div id="modalTambah" class="modal fade">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header gradient text-white"><h4>FORM CREATE DATA</h4></div>
	        <div class="modal-body">
	          <form action="{{ url('admin/viewMasyarakat/store') }}" method="POST">
	            {{ csrf_field() }}
	            <div class="form-group">
	              <label for="inNama">NIK</label>
	              <input type="text" name="inNIK" class="form-control" placeholder="Input NIK">
	            </div>

	            <div class="form-group">
	              <label for="inNama">Full Name</label>
	              <input type="text" name="inNama" class="form-control" placeholder="Input Nama">
	            </div>

	            <div class="form-group">
	              <label for="inAlamat">Username</label>
	              <input type="text" name="inUsername" class="form-control" placeholder="Input Username">
	            </div>

	            <div class="form-group">
	              <label for="inAlamat">Password</label>
	              <input type="Password" name="inPassword" class="form-control" placeholder="Input Password">
	            </div>

	            <div class="form-group">
	              <label for="inTelp">Phone Number</label>
	              <input type="text" name="inTelp" class="form-control" placeholder="Input No.Telp">
	            </div>

	            <div class="modal-footer">
	              <div class="btn-group float-right">
	                <button class="btn btn-success">Simpan</button>
	                <button class="btn btn-warning">Reset</button>
	              </div>
	            </div>
	          </form>
	        </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Update Data Public Identity -->
	<div id="modalUpdate" class="modal fade">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header gradient text-white"><h4>FORM UPDATE DATA</h4></div>
	        <div class="modal-body">
	          <form action="{{ url('admin/viewMasyarakat/update') }}" method="POST">
	            {{ csrf_field() }}
	            <input type="hidden" name="inId" id="updateId" class="form-control" placeholder="Input NIK">
	            <div class="form-group">
	              <label for="inNIK">NIK</label>
	              <input type="text" name="inNIK" id="updateNIK" class="form-control" placeholder="Input NIK">
	            </div>

	            <div class="form-group">
	              <label for="inNama">Full Name</label>
	              <input type="text" name="inNama" id="updateNama" class="form-control" placeholder="Input Nama">
	            </div>

	            <div class="form-group">
	              <label for="inUsername">Username</label>
	              <input type="text" name="inUsername" id="updateUsername" class="form-control" placeholder="Input Username">
	            </div>

	            <div class="form-group">
	              <label for="inPassword">Password</label>
	              <input type="Password" name="inPassword" id="updatePassword" class="form-control" placeholder="Input Password">
	            </div>

	            <div class="form-group">
	              <label for="inTelp">Phone Number</label>
	              <input type="text" name="inTelp" id="updateTelp" class="form-control" placeholder="Input No.Telp">
	            </div>

	            <div class="modal-footer">
	              <div class="btn-group float-right">
	                <button class="btn btn-success">Simpan</button>
	              </div>
	            </div>
	          </form>
	        </div>
	    </div>
	  </div>
	</div>

@endsection