<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Aplikasi Pengarsipan Surat | BPS</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Spin Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="{{ asset('log/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('log/css/style.css') }}" rel='stylesheet' type='text/css' />


	<!--// Stylesheets -->
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!--//fonts-->
</head>
	
<body>
	<h1>Aplikasi Pengarsipan Surat Masuk dan Surat Keluar </h1>
	<div class="clear">
		<span><img width="80px" src="{{ asset('../assets/img/BPS.png') }}"> </span>
	</div>
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="{{ route('login') }}" method="post">
			@csrf
			<div class="agile-field-txt">
				<label><i class="fa fa-user" aria-hidden="true"></i> Alamat Email </label>
				<input type="text" name="email" placeholder="Enter Email" required="" />
			</div>
			<div class="agile-field-txt">
				<label><i class="fa fa-unlock-alt" aria-hidden="true"></i> Kata Sandi </label>
				<input type="password" name="password" placeholder="Enter Kata Sandi" required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Tampilkan Kata Sandi</label>
				</div>
				<div class="agile-right">
					<a href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
				</div>
			</div>
			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //end script -->
				<input type="submit" value="LOGIN">
		</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<!-- <div class="copy-wthree">
		<p>© 2018 Spin Login Form . All Rights Reserved | Design by
			<a href="http://w3layouts.com/" target="_blank">W3layouts</a>
		</p>
	</div> -->
	<!--//copyright-->
</body>
</html>