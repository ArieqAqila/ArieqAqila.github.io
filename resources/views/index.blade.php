@if(Session::get('login'))
    <script type="text/javascript">
      window.location.href = "{{url('/home')}}";
    </script>
@endif
<!DOCTYPE HTML>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="images/cb0712c61bd739682a030be9af576a40.png">
	<title>MY CV - AQILA</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="{{ asset('bootstrap/bootstrap.css') }}" rel="stylesheet">
	
	<link href="{{ asset('myCss/ionicons.css') }}" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/selectize.bootstrap3.css') }}">
	
	<link href="{{ asset('myCss/myStyles.css') }}" rel="stylesheet">
	
	<link href="{{ asset('myCss/myResponsive.css') }}" rel="stylesheet">

	<script src="{{ asset('dist/js/standalone/selectize.js') }}"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top shadow">
	  <a class="navbar-brand" href="#"><h4>POI</h4></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	    </ul>
	    <li class="nav-item float-right">
	      	<a class="btn btn-outline-light" href="{{url('/register')}}">Daftar</a>
	    </li>
	    <li class="nav-item float-right">
	      	<a class="btn btn-outline-light ml-3" href="{{url('/login')}}">Login</a>
	    </li>
	  </div>
	</nav>

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
					<div class="intro">
						<form>
							<div class="form-group">
								<textarea placeholder="Ketik laporan anda..." class="form-control" rows="11"></textarea>
							</div>
							<div class="form-group">
								<button id="customBtn" class="form-control bg-warning border-danger" type="button">
									<p id="text-file" class="text-white">LAMPIRKAN FILE (MAX 2MB)</p>
								</button>
								<input class="btn btn-warning" type="file" id="realFile" hidden>
								<script type="text/javascript">
									const customBTN = document.getElementById('customBtn');
									const customTXT = document.getElementById('text-file');
									const inputFile = document.getElementById('realFile');

									customBTN.addEventListener('click', function(){
										inputFile.click();
									});
									inputFile.addEventListener('change', function(){
										if (inputFile.value) {
											customTXT.innerHTML = inputFile.value.match( /[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
										}else{
											customTXT.innerHTML = "LAMPIRKAN FILE (MAX 2MB)";
										}
									});
								</script>
							</div>
								<a href="{{url('/login')}}" class="btn btn-warning text-white" style="margin-right: 580px;"><b>KIRIMKAN</b></a>
						</form>
						
						
					</div><!-- intro -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- intro-section -->
	
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
	
	<!-- SCIPTS -->
	<script src="{{ asset('Jquery/jquery-3.2.1.min.js') }}"></script>

	<script type="text/javascript">
(function ($) {

    // scroll functions
    $(window).scroll(function(e) {
	    
	        // add/remove class to navbar when scrolling to hide/show
	        var scroll = $(window).scrollTop();
	        if (scroll >= 200) {
	            $('.navbar').addClass("navbar-hide");
	        } else {
	            $('.navbar').removeClass("navbar-hide");
	        }
	    
	    });
	    
	})(jQuery);

	$('#my-button').click(function(){
    	$('#my-file').click();
	});
	</script>
	
	<script src="{{ asset('js/tether.min.js') }}"></script>

	<script src="{{ asset('bootstrap/bootstrap.js') }}"></script>

	<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
	
	<script src="{{ asset('js/myScripts.js') }}"></script>
	
</body>
</html>