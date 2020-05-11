@if(Session::get('login'))
    <script type="text/javascript">
      window.location.href = "{{url('/home')}}";
    </script>
@endif
@extends('Template.TemplateAuth')
@section('login')
    <li class="nav-item float-right">
        <a class="btn btn-outline-light" href="{{url('/register')}}">Daftar</a>
    </li>
@endsection
@section('konten')
    <div class="mt-5">
        <div>
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{url('/login/auth')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="small mb-1" for="Username" style="font-size: 15px;">Username</label>
                                            <input name="username" class="form-control py-4" type="text" placeholder="Masukan Username Anda" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="Password" style="font-size: 15px;">Password</label>
                                            <input name="password" class="form-control py-4" type="password" placeholder="Masukan Password Anda" />
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <button class="btn btn-warning text-white" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="#">Belum punya akun? Daftar Sekarang!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection