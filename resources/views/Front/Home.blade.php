@extends('Template.TemplateFrontEnd')
@section('nama', Session::get('nama'))
@section('konten')

	<header>
		<div class="container">
			<div class="heading-wrapper">
				<div class="row">
					<h1>SELAMAT DATANG DI <p>POI</p></h1>
					<h3><p>P</p>ENGADUAN <p>O</p>NLINE <p>I</p>NDONESIA</h3>
				</div><!-- row -->
			</div><!-- heading-wrapper -->	
		</div><!-- container -->
	</header>
	
	<section class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-1 col-lg-2"></div>
				<div class="col-md-10 col-lg-8">
					<div class="intro" id="buatLaporan">
						<form action="{{url('/home/store')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" name="inNIK" value="{{Session::get('nik')}}">
							<input type="hidden" name="inTgl" value="<?php echo date('Y-m-d'); ?>">
							<input type="hidden" name="inStatus" value="Pending">
							<div class="form-group">
								<textarea name="inIsi" placeholder="Ketik laporan anda..." class="form-control" rows="11"></textarea>
							</div>
							<div class="form-group">
								<button id="customBtn" class="form-control bg-warning border-danger" type="button">
									<p id="text-file" class="text-white">LAMPIRKAN FILE (MAX 2MB)</p>
								</button>
								<input name="inFoto" class="btn btn-warning" type="file" id="realFile" hidden>
							</div>
							<div class="form-group">
								<button class="btn btn-warning text-white" style="margin-right: 580px;"><b>KIRIMKAN</b></button>
							</div>
						</form>
						
						
					</div><!-- intro -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- intro-section -->


	<section class="portfolio-section section" id="BerkasSaya">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>BERKAS <p>SAYA</p></b></h3>
						<h6 class="font-lite-black">
							<a href="#buatLaporan"><b>AYO BUAT LAPORAN SEKARANG!</b></a>
						</h6>
					</div>
				</div><!-- col-sm-4 -->
			</div><!-- row -->
		</div><!-- container -->
		
		<div class="container filter">
			@foreach($pengaduan as $p)
			@if($p->nik == Session::get('nik'))
			<div class="card-deck mt-3">
					<div class="card" style="width: 1140px;">
					  <div class="card-body">
					    <h5 class="card-title">By. Me</h5>
					    <h6 class="card-subtitle mb-2 text-muted"><?php echo date('d F Y', strtotime($p->tgl_pengaduan)); ?></h6>
					    <p class="card-text">
					    	{{str_limit($p->isi_laporan,200,'...')}}
					    </p>
					  </div>
					  <div class="card-footer">
					  	<a href="{{url('/catch')}}/{{$p->id_pengaduan}}" class="card-link">Cek Selengkapnya</a>
					  </div>
					</div>
			</div>
			
			<div class="container mt-3">
				<a style="width: 100%;" class="btn btn-outline-warning" href="#">
					<h4>Lihat Selengkapnya</h4>
				</a>
			</div><!-- row -->
			@else
				<div>dhjfg</div>
			@endif
			@endforeach
		</div><!-- CONTAINER -->
	</section><!-- BERKAS SUKSES SECTION -->
	
	<section class="portfolio-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>BERKAS <p>SUKSES</p></b></h3>
						<h6 class="font-lite-black"><b>POI</b></h6>
					</div>
				</div><!-- col-sm-4 -->
				
			</div><!-- row -->
		</div><!-- container -->
		
		<div class="container filter">
			<div class="card-deck terbaru">
				@foreach($data as $d)
					<div class="card">
					  <div class="card-body">
					    <h5 class="card-title">{{$d->nama}}</h5>
					    <h6 class="card-subtitle mb-2 text-muted">{{$d->tgl_pengaduan}}</h6>
					    <p class="card-text">{{str_limit($d->isi_laporan,50,'...')}}</p>
					  </div>
					  <div class="card-footer">
					    <a href="#" class="card-link">Lihat Laporan</a>
					  </div>
					</div>
				@endforeach	
			</div>
			<a class="btn btn-outline-warning" style="margin: 0 auto; width: 99%; margin-top: 20px;" href="#">
				<h4>Lihat Selengkapnya</h4>
			</a>
		</div><!-- CONTAINER -->
	</section><!-- BERKAS SUKSES SECTION -->
	
	<section class="about-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>APA ITU <p>POI</p> ?</b></h3>
						<h6 class="font-lite-black"><b>Pengaduan Online Indonesia</b></h6>
					</div>
				</div><!-- col-sm-4 -->
				<div class="col-sm-8">
					<p class="margin-b-50">Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional.</p>
					
					<div class="row">
						<a class="btn btn-outline-warning" style="margin: 0 auto; width: 90%;" href="#">
							<h4>Lihat Selengkapnya</h4>
						</a>
					</div><!-- row -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- about-section -->
	
	<section class="POI-counterSection" id="counter">
		<div class="container">
			<h1 class="title"><b>JUMLAH LAPORAN</b></h1>
			<h1 class="counting"><b><span class="counter-value" data-duration="3000" data-count="571664">0</span></b></h1>
		</div><!-- counter -->
    </section><!-- counter-section-->
	
	<footer>
		<p class="copyright">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> POI by <a href="https://colorlib.com" target="_blank">Arieq Aqila</a> <i class="ion-heart" aria-hidden="true"></i>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</p>
	</footer>
	
	<script type="text/javascript">
		$('#mySelect').selectize();
	</script>

@endsection