@if(Session::get('login'))
    <script type="text/javascript">
      window.location.href = "{{url('/home')}}";
    </script>
@endif
@extends('Template.TemplateAuth')
@section('register')
    <li class="nav-item float-right">
        <a class="btn btn-outline-light ml-3" href="{{url('/login')}}">Login</a>
    </li>
@endsection
@section('konten')
		<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    	<h3 class="text-center font-weight-light my-4">Create Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{url('/register/auth')}}" method="POST">
                                        	{{ csrf_field() }}
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label class="small mb-1" for="NIK">NIK</label>
                                                    	<input name="inNIK" class="form-control py-4" type="text" placeholder="Masukan NIK" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label class="small mb-1" for="NamaLengkap">Nama Lengkap</label>
                                                    	<input name="inNama" class="form-control py-4" type="text" placeholder="Masukan Nama Lengkap" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            	<label class="small mb-1" for="inputEmailAddress">Username</label>
                                            	<input name="inUsername" class="form-control py-4" type="text" placeholder="Masukan Username" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label class="small mb-1" for="Password">Password</label>
                                                    	<input name="inPassword" class="form-control py-4" type="password" placeholder="Masukan Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label class="small mb-1" for="ConfirmPassword">No. HP/Telepon</label>
                                                    	<input name="inTelp" class="form-control py-4" type="text" placeholder="Masukan No. HP/Telepon" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                            	<button type="submit" class="btn btn-warning btn-block text-white" href="#">Daftar Akunmu!</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{url('/login')}}">Sudah punya akun? Ayo login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
			</div>
@endsection