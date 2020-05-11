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
	
	<!-- BOOTSTRAP -->
	<link href="{{ asset('bootstrap/bootstrap.css') }}" rel="stylesheet">
	<!-- CUSTOM CSS -->
	<link href="{{ asset('myCss/myStyles.css') }}" rel="stylesheet">
	<!-- RESPONSIVE CSS -->
	<link href="{{ asset('myCss/myResponsive.css') }}" rel="stylesheet">
	<!-- SWEETALERT ADDONN -->
	<script type="text/javascript" src="{{ asset('swal/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('swal/sweetalert2.min.css') }}">
    <!-- FONT AWESOME ADDONN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<!-- JQUERY -->
	<script src="{{ asset('Jquery/jquery-3.2.1.min.js') }}"></script>

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
	        <a class="nav-link" href="#">Home POI<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Laporan POI</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">TENTANG POI</a>
	      </li>
	    </ul>
	    @yield('login')
	    @yield('register')
	    
	  </div>
	</nav>

	@yield('konten')

	<!-- SCIPTS -->

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